<?php
	function mgb_set_version(mysqli $mysqli, string $version, string $dbprefix): bool {

		$sql = "UPDATE ".$dbprefix."settings SET version = ?";
		$stmt = $mysqli->prepare($sql);

		if (!$stmt) {
			return false;
		}

		$stmt->bind_param('s', $version);
		$ok = $stmt->execute();
		$stmt->close();

		return $ok;
	}

	function mgb_run_updates(mysqli $mysqli, array $db, string $current_version, string $target_version, string $dbprefix) {

		$update_dir = __DIR__ . '/upgrade/';
		$files = glob($update_dir . '*.php');

		// Versionen sauber sortieren
		usort($files, function ($a, $b) {
			return version_compare(
				basename($a, '.php'),
				basename($b, '.php')
			);
		});

		foreach ($files as $file) {

			$update_version = basename($file, '.php');
			
			/* echo "update: ".$update_version."<br>";
			echo "current: ".$current_version."<br>";
			echo "target: ".$target_version."<br>"; */

			if (
				version_compare($update_version, $current_version, '>') &&
				version_compare($update_version, $target_version, '<=')
			) {

				$update = require $file;
				// echo $file."<br>";

				foreach ($update['sql'] as $step) {

					if (is_callable($step)) {
						$sql = $step($mysqli, $db);
					} else {
						$sql = $step;
					}

					if (!$sql) {
						continue;
					}

					try {
						$mysqli->query($sql);

					} catch (mysqli_sql_exception $e) {

						// Duplicate column / index ignorieren
						if (
							str_contains($e->getMessage(), 'Duplicate column') ||
							str_contains($e->getMessage(), 'Duplicate key')
						) {
							echo "<span style='
								font-family: verdana, arial, helvetica, sans-serif;
								font-size: 12px;
								font-weight: bold;'>NOTE: {$e->getMessage()} already exists – skipped</span><br><br>\n";							
							continue;
						}

						// Alles andere melden, aber NICHT abbrechen
						echo "<span style='
							font-family: verdana, arial, helvetica, sans-serif;
							font-size: 12px;
							font-weight: bold;
							color: red;'>ERROR: {$e->getMessage()}</span><br><br>\n";
						continue;
					}
				}
				
				// Version nach JEDEM erfolgreichen Schritt setzen
				mgb_set_version($mysqli, $update_version, $dbprefix);
			}
		}
	}
	
	$current_version = $settings['version'] ?? '0.0.0';
	$target_version  = MGB_VERSION; // aus config/constants

	mgb_run_updates($mysqli, $db, $current_version, $target_version, $db['prefix']);
?>