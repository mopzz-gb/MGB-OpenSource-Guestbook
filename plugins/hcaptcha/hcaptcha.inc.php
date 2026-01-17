<?php
	$data = array(
		'secret' 	=> "my-secret (should start with 0x..)",
		'response' 	=> $_POST['h-captcha-response']
	);
	
	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($verify);
	
	// var_dump($response);
	$responseData = json_decode($response);
	if($responseData->success) {
		// your success code goes here
	} else {
   // return error to user; they did not pass
	}
?>