<?php
	include_once "../config.php";
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	$cnzet = conectar();
	mysqli_query($cnzet,"SET CHARACTER SET utf8");
	mysqli_query($cnzet,"SET NAMES utf8");
	$codigo = $_POST["codigo"];
	$tipo = $_POST['txtTipo'];
	$tipo = 'H';

	$fechainicio = '1900-01-01';
	$fechafin = '1900-01-01';
	$mensaje = '';

	$vsql = "call zyz_MantenedorProceso_Calendario (";	
	$vsql = $vsql . " '". $codigo ."',";
	$vsql = $vsql . " '". $fechainicio ."',";
	$vsql = $vsql . " '". $fechafin ."',";
	$vsql = $vsql . " '". $mensaje ."',";
	$vsql = $vsql . " '". $tipo ."')";
	echo $vsql;
	exit;
	$rs=mysqli_query($cnzet, $vsql);
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
?>