<?php
	session_start();
	if (!isset($_SESSION["usuario"]))
	{
		header("location:noautorizado.php");
	}			
	include_once "../config.php";
	include('../funciones/admi_con.php');
	include('../funciones/admi_fun.php');
	include('../funciones/admi_fun_admision.php');
	include('../funciones/unajma_admision.php');
	require_once GL_DIR_FS_APP.'vendor/autoload.php';
	ini_set('display_errors', '1');
	###################################################
	$cnzet = conectar();
	mysqli_query($cnzet,"SET CHARACTER SET utf8");
	mysqli_query($cnzet,"SET NAMES utf8");	
	###################################################
	$codigo = $_GET['codigo'];
	$proceso = substr($codigo,0,4);
	$postulante = substr($codigo,4,7);		
	$nombreproceso = nombreproceso($proceso);
	$macro = nombremacro($proceso);

	#exit;
	#####################################
	$mpdf = new \Mpdf\Mpdf();
	#####################################
	require('admi_solicitud_pdf.php');	// FICHA DE INSCRIPCION
	require('admi_declaracion06_pdf.php'); // CONSTANCIA DE INGRESO
	
	#exit;

	$mpdf->SetHTMLHeader('
	<div style="text-align: center; font-weight: bold;">
		<table width="750" border="0">
			<tr>
				<td width="15%" align="center">
					<img src="../images/logo_ingreso.jpg" width="90" />
				</td>
				<td align="center">
					<span style="font-size:18px; font-weight:bold">UNIVERSIDAD NACIONAL 
					<br>
					JOS&Eacute; MAR&Iacute;A ARGUEDAS</span>
					<br>
					<br>
					<span style="font-size:18px; font-weight:bold">OFICINA CENTRAL DE ADMISI&Oacute;N</span>
					<br>
				</td>
				<td width="20%" align="center">'.
					$fotex.
				'</td>
			</tr>
		</table>
	</div>
	'
	);
	
	$mpdf->SetHTMLFooter('
	<table width="100%" border="0">
		<tr>
			<td align="center">
        		.
        	</td>
    	</tr>
	</table>
	');

	// pdf 5
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>'.
		$vd70.
		'<br>'.
		$vd71.
		$v4.
		''
		);

	$mpdf->Output();
?>
