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

	// FICHA DE INSCRIPCION Y TAMBIEN TIENE LA ESTRUCTURA PARA LAS DJ DE LA PRIMERA HOJA
	require('admi_solicitud_pdf.php');

	//----------------- NO SE USA INICIO
	#require('admi_declaracion01_pdf.php'); // DECLARACIÓN JURADA DE ACEPTACIÓN DE CONDICIONES EXAMEN ADMISION VIRTUAL
	#require('admi_declaracion02_pdf.php'); // DECLARACION JURADA ACEPTACION DE RIESGOS EN EL EXAMEN DE ADMISIÓN VIRTUAL
	#require('admi_declaracion03_pdf.php'); // DECLARACION JURADA REQUISITOS MÍNIMOS
	//----------------- NO SE USA FIN

	require('admi_declaracion04_pdf.php'); // DECLARACION JURADA DE NO POSEER ANTECEDENTES PENALES POR LA COMISIÓN DE LOS DELITOS DE TERRORISMO O APOLOGÍA AL TERRORISMO, DE VIOLACIÓN A LA LIBERTAD SEXUAL O DE TRÁFICO ILÍCITO DE DROGAS

	require('admi_declaracion05_pdf.php'); // ULTIMA DJ AGREGADO PARA 5TO DE SECUNDARÍA

	require('admi_declaracion05_1_pdf.php'); // ULTIMA DJ AGREGADO PARA CEPRE
	
	#exit;
	#require_once('adm_post_total1.php');
	#require_once('adm_post_total2.php');
	#require_once('adm_post_total3.php');
	#require_once('adm_post_total4.php');
	#require_once('adm_post_total5.php');
	
	$mpdf->SetHTMLHeader('
	<div style="text-align: center; font-weight: bold;">
		<table width="750" border="0">
			<tr>
				<td width="15%" align="center">
					<img src="../images/logo_ingreso.jpg" width="90" />
				</td>
				<td align="center">
					<span style="font-size:18px; font-weight:bold">
						UNIVERSIDAD NACIONAL 
						<br>
						JOSÉ MARÍA ARGUEDAS
					</span>
					<br>
					<br>
					<span style="font-size:18px; font-weight:bold">
						OFICINA CENTRAL DE ADMISIÓN
					</span>
					<br>
				</td>
				<td width="20%" align="center">'.
					$fotex.
				'</td>
			</tr>
		</table>
	</div>'
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

	// pdf 1
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vc.
		'<br>'.
		$v2.
		$v3.
		''
		);
		
	// // pdf 2 declaracion de apologia
	include_once('admi_declaracion01_pdf.php');
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd20.
		'<br>'.
		$vd21.
		$v3.
		''
	);

	// // pdf 3 declaracion
	include_once('admi_declaracion02_pdf.php');
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd30.
		'<br>'.
		$vd31.
		$v3.
		''
	);

	// // pdf 4 declaracion
	include_once('admi_declaracion03_pdf.php');
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd40.
		'<br>'.
		$vd41.
		$v3.
		''
	);

	// // pdf 5 declaracion
	include_once('admi_declaracion04_pdf.php');
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd50.
		'<br>'.
		$vd51.
		$v3.
		''
	);

	// // pdf 6 declaracion
	include_once('admi_declaracion05_pdf.php');
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd60.
		'<br>'.
		$vd61.
		''
	);


	//0015: Proceso CEPRE
	//0014: Proceso Primera selección
	if($proceso == '0014'){
		// pdf 5 - DECLARACIÓN DE 5TO AÑO DE SECUNDARIA PARA REGULARIZAR DOCUMENTOS
		$mpdf->AddPage();
		$mpdf->WriteHTML('
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>'.
			$vd60.
			'<br>'.
			$vd61.
			''
			);
	}
	
	elseif($proceso == '0015'){
		// pdf 5 - DECLARACIÓN CEPRE PARA REGULARIZAR DOCUMENTOS
		$mpdf->AddPage();
		$mpdf->WriteHTML('
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>'.
			$vd80.
			'<br>'.
			$vd81.
			''
			);
	}


	/*		
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd40.
		'<br>'.
		$vd41.
		$v3.
		''
		);
		
	$mpdf->AddPage();
	$mpdf->WriteHTML('
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>'.
		$vd50.
		'<br>'.
		$vd51.
		$v3.
		''
		);					
	*/	
	$mpdf->Output();
?>
