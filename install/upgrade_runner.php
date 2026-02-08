<?php
/*
	MGB 0.7.x - OpenSource PHP and MySql Guestbook
	Copyright (C) 2004 - 2026 Juergen Grueneisl - https://www.m-gb.org/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

	==================
	upgrade_runner.php
	==================
	*/
	
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