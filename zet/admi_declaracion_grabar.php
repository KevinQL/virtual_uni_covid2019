<?php
	include_once "../config.php";
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	$cnzet = conectar();
	$codigo = $_POST['codigo'];
	$proceso = substr($codigo,0,4);
	$postulante = substr($codigo,4,7);
	
	$conforme = $_POST['chkConforme'];
	$tipo = 'W';
	
	if(!empty($_POST['hcaptcha']) && true){

		/**
		 * code of the captcha by KLEBXY
		 */
		$data_hc = [
			"secret" => "0x28899D6c004BBBB2489d955c4F2514cc94940a73",
			"response" => $_POST['hcaptcha']
		];

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data_hc));
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($verify);
		$responseData = json_decode($response);
		
		// var_dump($responseData);
		/** fin code captcha */


		$vsql = "call zyz_CAMantenedorPostulante (";	
		$vsql = $vsql . " '". $proceso ."',";
		$vsql = $vsql . " '". $postulante ."',";
		$vsql = $vsql . " '1',";
		$vsql = $vsql . " '2',";
		$vsql = $vsql . " '3',";
		$vsql = $vsql . " '4',";
		$vsql = $vsql . " '5',";
		$vsql = $vsql . " '1900-01-01',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " 0,";	
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " 1,";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " 0,";
		$vsql = $vsql . " '',";	
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '',";
		$vsql = $vsql . " '". $tipo ."')";
		
		#echo $vsql;
		#exit;
		$rs=mysqli_query($cnzet, strtoupper($vsql));
		$nroerror=mysqli_errno($cnzet);
		$msg=messageError(mysqli_errno($cnzet));
		mysqli_close($cnzet);
		if($rs)
			{
				echo json_encode(array('error'=>0,'mensaje'=>'Se grabaron la informacion ingresada'));
			}
		else
			{
				echo json_encode(array('error'=>1,'titulo'=>'Ocurrio un error #'.$nroerror,'mensaje'=>$msg));
			}
	
	}else{

		echo json_encode(array('error'=>1,'titulo'=>'Error en captcha','mensaje'=>"No se resolvio hcaptcha sa.".$_POST['hcaptcha']));
	}


?>