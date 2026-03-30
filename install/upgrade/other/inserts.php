<?php
	$sql = array();	
	
	// 0.6.8
	if (version_compare($settings['version'], '0.6.7', '<')) {		
		$sql[] = "INSERT INTO ".$db['prefix']."smilies (
						`path` ,
						`replacement` ,
						`height` ,
						`width`
					) VALUES
						('smiley_smile.gif', ':smile:, :), :-)', '15', '15' ),
						('smiley_wink.gif', ':wink:, ;), ;-)', '15', '15' ),
						('smiley_lol.gif', ':lol:', '15', '15' ),
						('smiley_biggrin.gif', ':biggrin:, :D, :-D', '15', '15' ),
						('smiley_cool.gif', ':cool:, B), B-)', '15', '15' ),					
						('smiley_surprised.gif', ':surprised:, :O, :-O', '15', '15' ),
						('smiley_tongue.gif', ':tongue:, :P, :-P', '15', '15' ),
						('smiley_confused.gif', ':confused:, :-/', '15', '15' ),
						('smiley_eek.gif', ':eek:, 8O, 8-O', '15', '15' ),					
						('smiley_sad.gif', ':sad:, :(, :-(', '15', '15' ),					
						('smiley_angry.gif', ':angry:', '15', '15' ),
						('smiley_evil.gif', ':evil:', '15', '15' );";
		$sqldescription[] = "Adding emoticons...";
	}
	
	// 0.6.9
	
	if (version_compare($settings['version'], '0.6.8', '<')) {
		$sql[] = "INSERT INTO ".$db['prefix']."smilies (				
						`path` ,
						`replacement` ,
						`height` ,
						`width`
					) VALUES 
						('smiley_fun.gif', ':fun:, ^^', '15', '15' ),
						('smiley_doubt.gif', ':doubt:', '15', '15' ),
						('smiley_neutral.gif', ':neutral:, :|, :-|', '15', '15' ),
						('smiley_redface.gif', ':redface:', '15', '15' ),
						('smiley_rolleyes.gif', ':rolleyes:', '15', '15' ),
						('smiley_silenced.gif', ':silenced:', '15', '15' ),
						('smiley_cry.gif', ':cry:, :\'(, :\'-(', '15', '15' ),
						('smiley_doh.gif', ':doh:', '15', '15' ),
						('icon_arrow.gif', ':arrow:', '15', '15' ),
						('icon_exclaim.gif', ':exclaim:', '15', '15' ),
						('icon_question.gif', ':question:', '15', '15' );";
		$sqldescription[] = "Adding new emoticons...";
	}
	
	// 0.6.9.5
	if (version_compare($settings['version'], '0.6.9.4', '<')) {
		// include language
		include("../language/".$settings['language_path']."/lang_admin.php");
		
		$sql[] = "UPDATE `".$db['prefix']."settings` SET
			`sendmail_user_text` = '".$lang['sendmail_user_text']."',
			`sendmail_user_text_moderated` = '".$lang['sendmail_user_text_moderated']."',
			`sendmail_contactmail_text_copy` = '".$lang['sendmail_contactmail_text_copy']."';";
		$sqldescription[] = "Adding new e-mail fields...";
	}
	
	// 0.7.1
	if (version_compare($settings['version'], '0.7.0.4', '<')) {
		// generate unique install id for the ping
		define('MGB_TELEMETRY_SALT', 'mgb-telemetry-v1-2026');
		$install_id = mgb_generate_install_id(MGB_TELEMETRY_SALT);

		$sql[] = "UPDATE `".$db['prefix']."settings` SET `telemetry_install_id` = '".$install_id."'";
		$sqldescription[] = "Adding unique install id...";
	}
	
	// 0.7.2
	if (version_compare($settings['version'], '0.7.1.1', '<')) {
		if (isset($settings['language_path']) && str_contains($settings['language_path'], '../language/')) {
			$language_path = str_replace('../language/', '', $settings['language_path']);
			
			$sql[] = "UPDATE `".$db['prefix']."settings` SET `language_path` = '".$language_path."'";
			$sqldescription[] = "Updating language path...";
		}
	}
		
	
	foreach ($sql as $i => $query) {
		echo "<span style='
			font-family: verdana, arial, helvetica, sans-serif;
			font-size: 12px;
			font-weight: bold;'>
			{$sqldescription[$i]}
		</span>\n";

		$result = $mysqli->query($query);

		if ($result) {
			echo "<span style='
				font-family: verdana, arial, helvetica, sans-serif;
				font-size: 12px;
				font-weight: bold;
				color: green;'>OK!</span><br><br>\n";
			$success++;
		} else {
			echo "<span style='
				font-family: verdana, arial, helvetica, sans-serif;
				font-size: 12px;
				font-weight: bold;
				color: red;'>ERROR: {$mysqli->error}</span><br><br>\n";
		}
    $count++;
	}
?>