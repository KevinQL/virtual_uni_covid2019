<?php
	#es como si ya estuviera abierto... esta es la rura del archivo si
	include_once "/home/admisionunajma/public_html/zetadmision/config.php";
	if (!function_exists('messageError')) {
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	}
	#include(GL_DIR_FS_APP.'funciones/admi_con.php');
	$cn_zetzet = conectar();
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
		{
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
	else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	$maquina = gethostname();

	if (isset($_POST['oiga'])) 
		{
			$oiga = $_POST["oiga"];
		}
	else
		{
			$oiga = '';	
		}

	$tipo = 'U';
	$cod = base64_decode(base64_decode($_POST['cod']));
	$per = base64_decode(base64_decode($_POST['per']));
	$usu = base64_decode(base64_decode($_POST['usu']));
	$ale = base64_decode(base64_decode($_POST['ale']));



	$vsql = "call zyz_Admi_Respuesta (";	
	$vsql = $vsql . " '',";
	$vsql = $vsql . " '". $per ."',";
	$vsql = $vsql . " '". $cod ."',";
	$vsql = $vsql . " '". $oiga ."',";
	$vsql = $vsql . " '". $usu ."',";
	$vsql = $vsql . " ". $ale .",";	
	$vsql = $vsql . " '". $ip ."',";
	$vsql = $vsql . " '". $maquina ."',";
	$vsql = $vsql . " '". $tipo ."')";
	
	#echo $vsql;
	#exit;
	$rs=mysqli_query($cn_zetzet, strtoupper($vsql));
	$nroerror=mysqli_errno($cn_zetzet);

	$msg=messageError(mysqli_errno($cn_zetzet));
	mysqli_close($cn_zetzet);
	if($rs)
		{
			echo json_encode(array('error'=>0,'mensaje'=>'Se registro la informacion ingresada'));
		}
	else
		{
			echo json_encode(array('error'=>1,'titulo'=>'Ocurrio un error #'.$nroerror,'mensaje'=>$msg));
		}
?>