<?php
	include_once "../config.php";
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	$cnzet = conectar();
	mysqli_query($cnzet,"SET CHARACTER SET utf8");
	mysqli_query($cnzet,"SET NAMES utf8");

	$codigo = $_GET["codigo"];
	$val = $_GET["val"];
	$email = $_GET["email"];
	$nombre = $_GET["nombre"];
	$numerodocumento = $_GET["numdni"];
	$proceso = substr($codigo,0,4);
	$postulante = substr($codigo,4,7);
	$tipo = 'V';

	$vsql = "call zyz_CAMantenedorPostulante (";	
	$vsql = $vsql . " '". $proceso ."',";
	$vsql = $vsql . " '". $postulante ."',";
	$vsql = $vsql . " '',";
	$vsql = $vsql . " '',";
	$vsql = $vsql . " '',";
	$vsql = $vsql . " '',";
	$vsql = $vsql . " '',";
	$vsql = $vsql . " '1900-01-01',";
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
	$vsql = $vsql . " ". $val .",";
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
	#$rs=mysqli_query($cnzet, strtoupper($vsql));
	$rs=mysqli_query($cnzet, $vsql);
	$nroerror=mysqli_errno($cnzet);
	$msg=messageError(mysqli_errno($cnzet));
	mysqli_close($cnzet);

	// if($rs)
	// {
	// 	echo json_encode(array('error'=>0,'mensaje'=>'Se grabaron la informacion ingresada'));
	// }
	// else
	// {
	// 	echo json_encode(array('error'=>1,'titulo'=>'Ocurrio un error #'.$nroerror,'mensaje'=>$msg));
	// }

	if($rs)
	{
		// Solo cuando se está validando el registro del postulante. Osea $val=1
		if($val == 1){

			$link_DJ = "https://drive.google.com/file/d/1M27E0UAXf44-6ZSERaIGd2YUGeiQ-LD6/view?usp=sharing";
			$link_tutorial_dconstancia = "https://youtu.be/6gkC9VvA1yY?t=852"; // update 2021-3
	
			$asunto = "ADMISIÓN UNAJMA - INSCRIPCIÓN EXAMEN 2022-1";	
			$cuerpo = '
			<html>
				<head>
					<title>EXAMEN DE ADMISION</title>
				</head>
				<body>
					<table>
						<tr>
							<td align="center">
								<strong>
								UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS
								</strong>
								<br>
							</td>
						</tr>
						<tr>
							<td>
								Estimado(a) postulante: <strong>' .$nombre .'</strong>, <br>
								DNI:<strong> ' .$numerodocumento . '</strong>, <br>
								correo electrónico:<strong> '.$email.'</strong>
								<br>
								<br>
								<strong>¡EN BUENA HORA, SE VALIDÓ SU INSCRIPCIÓN COMO SATISFACTORIO :D!!</strong> <br>
								<strong>¡EN BUENA HORA, SE VALIDÓ SU INSCRIPCIÓN COMO SATISFACTORIO :D!!</strong> <br>
								<strong>¡EN BUENA HORA, SE VALIDÓ SU INSCRIPCIÓN COMO SATISFACTORIO :D!!</strong>
							</td>
						</tr>
						<tr>
							<td>
								<ul>
									<li> 
										<strong>1).</strong> 
										Recuerde llevar para el día del examen los siguientes documentos: 
										<br>
										1.1) su CONSTANCIA DE INSCRIPCIÓN (Solo es una hoja, a colores y presentar dentro de una Mica). <br>
										1.2) Su DECLARACIÓN JURADA DE NO TENER COVID (solo es una hoja, tiene su huella dactilar y también dentro de la Mica). <br> 
										1.3) Su DNI. <br>  
										1.4) Su CARNET DE VACUNACIÓN COVID. <br>  
										<br>
										**** LA CONSTANCIA DE INSCCRIPCIÓN LO PUEDES DESCARGAR CON TUS CREDENCIALES EN EL SISTEMA VIRTUAL DE ADMISIÓN. <br>
										**** LA DECLARACIÓN JURADA ESTÁ EN TU CORREO ELECTRÓNICO JUNTO CON TUS CREDENCIALES.
	
										<br> 
									</li>
	
									<li> 
										<strong>2).</strong> 
										Espera atentamente las indicaciones adicionales para el día del examen. Estás indicaciones se enviarán a sus correos electrónicos y grupos de whatsapp.
										<br> 
									</li>
	
									<li> 
										<strong>3).</strong> 
										VIDEO DESCARGAR CONSTANCIA DE INSCRIPCIÓN: 
										(<a href="'.$link_tutorial_dconstancia.'">video instructivo</a>) 
										<br> 
										LINK DE LA DECLARACIÓN JURADA DE NO TENER COVID (*dj covid):
										(<a href="'.$link_DJ.'">descargar formato DJ</a>) 
						
									</li>
								</ul>
							</td>
						</tr>			
					</table>				
					<table>
						<tr>
						<td>
								Cualquier consulta, comunicarse con nosotros a los n&uacute;mero: 
								<strong> 991828881, 916331094, 985951660 </strong>						
						</td>
						</tr>
						<tr>
						<td>
								Atentamente					
						</td>
						</tr>
						<tr>
						<td>
								<strong>Oficina Central de Admisi&oacute;n</strong>
						</td>
						</tr>
					</table>
				</body>
			</html>
			';
	
			// enviar correo de inscrcipción satisfactoria!
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($email, utf8_decode($asunto), utf8_decode($cuerpo), $cabeceras);
		}

		$msjresult = array('error'=>0, 'mensaje'=>'Se grabaron la informacion ingresada');
	}
	else
	{
		$msjresult = array('error'=>1, 'mensaje'=>'Ocurrio un error #'.$nroerror,'mensaje'=>$msg);
	}
?>


<style>

	body{
		margin:0px;
		padding:0px;
		background:black;
		color:white;
	}

	.text-center{
		text-align: center;
	}

	.container{
		padding: 10% 30%;
	}

	.mt-default{
		margin-top: 30px;
	}

	.img-gif{
		border: none;
		border-radius: 100%;
	}


	.text-close{
		font-size: 2.3rem;
	}

</style>

<div class="centrar-contenido">
	
	<div class="container text-center"> 
		<h3>VALIDANDO POSTULANTE!! :D</h3>
		<h1 class="text-close">NO CERRAR ESTA VENTANA!</h1>
		<p>
			Esta página se cerrará automáticamente.
		</p>
		<strong class="msj_close">
			<?=$msjresult['mensaje'];?>
			... 
		</strong>

		<br>
		
		<img src="./public/dance-dog.gif" 
			alt="dance-dog :V" 
			class="img-gif mt-default" 
		>

	</div>
</div>


<script>

	/**
	* Funcition to close the page of the sended message 
	 */
	window.onload = function () {

		let txt_close = "Esta ventana se cerrará en un momento :DD";
		let msj_close = document.querySelector(".msj_close");

		msj_close.innerText = txt_close; 

		setTimeout(() => {
			window.close();
		}, 2000);
	}

</script>