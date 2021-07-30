<?php
	error_reporting(0);

	include_once('../funciones/admi_con.php');
	include_once('../funciones/admi_fun.php');

	$zet = '../';
	

	// code of the captcha by KLEBXY
	$data_hc = [
		"secret" => "0x28899D6c004BBBB2489d955c4F2514cc94940a73",
		"response" => $_POST['h-captcha-response']
	];

	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data_hc));
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($verify);
	$responseData = json_decode($response);
	
	var_dump($responseData);
	// fin code captcha

	die();

	echo "golaaaaa jejeje";
