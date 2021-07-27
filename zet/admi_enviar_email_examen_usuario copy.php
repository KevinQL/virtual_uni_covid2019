<?php
	include('../config.php');
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	include(GL_DIR_FS_APP.'funciones/funciones_admision.php');
	#echo 'hola';
	$cn_email = conectar();
	$cn_email_zet = conectar();
	$codigo = base64_decode(base64_decode($_GET['clave']));

	$tipo = substr($codigo,0,1);
	$proceso = substr($codigo,1,4);
	$postulante = substr($codigo,5,7);

	#echo '<br>';
	#echo $codigo;
	#exit;
	#$z = enviar_email_examen_usuario($proceso, $postulante, $tipo);
	$cn_email = conectar();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
		
	$asunto = "UNAJMA - EXAMEN VIRTUAL 2021";	
		
	$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','1','2','3','4','5','1900-01-01','1','2','3','4','5',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','1','2','3','4','5','6','7','K')";
	$rs = mysqli_query($cn_email, $vsql);	
	$rsjk = mysqli_fetch_row($rs);	
	
	#echo $vsql;
	#exit;
	$nombre = $rsjk[1];
	$escuela = $rsjk[2];
	$numerodocumento = $rsjk[3];
	$clave = $rsjk[4];
	$email = $rsjk[5];
	$celular = $rsjk[6]; 
	#$email = 'juliozet@hotmail.com';
	
	#echo $nombre;
	#echo '<br>';
	#echo $escuela;
	#echo '<br>';
	#echo $numerodocumento;
	#echo '<br>';
	#echo $clave;
	#echo '<br>';
	#echo $email;
	#echo '<br>';
	#echo $celular;
	#echo '<br>';
	if($proceso === "0022"){

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
						Estimado(a) postulante: <strong>' .$nombre .'</strong>, 
						<br>DNI:<strong> ' .$numerodocumento . '</strong>, <br>
						correo electr&oacute;nico:<strong> '.$email.'</strong>:
						</strong> <br>
						<strong>SE RECOMIENDA USAR SU COMPUTADORA PARA LAS SIGUIENTES INDICACIONES.</strong>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li> 
							<strong>1).</strong> 
							Asegúrese de contar con su <strong>Certificado de estudios o ficha de logros de aprendizaje </strong> Así mismo sus documentos solicitados según su modalidad de postulación.
							</li>
							<li>
							<strong>2).</strong>
							Escanee los documentos como un solo archivo en formato PDF.
							Debe obtener un solo archivo PDF(*el documento pdf*).
							<br>
							<a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
							<br>
							<a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
							</li>
							<li>
							<strong>3).</strong> 
							Debe tener las siguientes fotografías:
							Una fotografía de su firma (firma del postulante) en una hoja de fondo blanco;
							Una fotografía de la firma del apoderado en el caso de ser menor de edad en una hoja de fondo blanco.
							Por favor recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo WhatsApp para realizar el recorte (<a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">Click Aquí video para realizar recorte con paint</a>.)

							</li>

							<li>
							<strong>4).</strong> Debe mirar obligatoriamente el siguiente <strong>video instructivo</strong> de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="https://www.youtube.com/watch?v=N7yxUvfPAL4&feature=youtu.be&ab_channel=Lenynflores">Click Aquí Video Inscripción evaluación virtual</a>)
							</li>
							<li>
							<strong>5).</strong> <br>
							<strong>******************************IMPORTANTE**************************************************</strong>
							<br>
							INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y certificado de estudios).
							<br>
							USUARIO:<strong>'.$numerodocumento.'</strong><br>
							CONTRASEÑA:<strong>'.$clave.'</strong>
							<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
							CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
							</a> <-- 
							<br>
							<strong>******************************************************************************************</strong>
							</li>
						</ul>
					</td>
				</tr>			
			</table>
			<br>				
			<table>
				<tr>
				  <td>
						Cualquier consulta, comunicarse con nosotros a los n&uacute;mero: 
						<strong> 991828881, 916331094, 985951660 </strong>						
				  </td>
				</tr>
				<tr>
				  <td>
						<br>
						Atentamente					
				  </td>
				</tr>
				<tr>
				  <td>
						<br>
						<strong>Oficina Central de Admisi&oacute;n</strong>
				  </td>
				</tr>
			</table>
			</body>
			</html>
			';


	// CASO CONTRARIO. EN EL CASO DE QUE EL PROCESO NO SEA TRASLADOS
	}else {

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
						Estimado(a) postulante: <strong>' .$nombre .'</strong>, 
						<br>DNI:<strong> ' .$numerodocumento . '</strong>, <br>
						correo electr&oacute;nico:<strong> '.$email.'</strong>:
						</strong> <br>
						<strong>SE RECOMIENDA USAR SU COMPUTADORA PARA LAS SIGUIENTES INDICACIONES.</strong>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li> 
							<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="https://drive.google.com/file/d/1M27E0UAXf44-6ZSERaIGd2YUGeiQ-LD6/view?usp=sharing">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
							Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azul.<br>
							No se olvide de <strong>firmar</strong> el documento, así también de ser menor de edad debe ir la firma de su apoderado.<br> 
							<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
							</li>
							<li>
							<strong>2).</strong> Asegurese de contar con su <strong>Certificado de estudios o ficha de logros de aprendizaje</strong> Así mismo sus documentos solicitados según su modalidad de postulación.
							</li>
							<li>
							<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos solicitados ( Declaración Jurada COVID y otros si existieran).<br>
							<strong>Escanee</strong> los documentos como un solo <strong>archivo en formato PDF</strong>.
							<br>
							Debe obtener <strong>un solo</strong> archivo PDF(*el documento pdf*).
							<br>
							<a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
							<br>
							<a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
							</li>
							<li>
							<strong>4).</strong> Debe tener las siguientes fotografías:<br>
							<strong>Una fotografía de su <strong>rostro actual</strong> tipo carnet de identificación;</strong><br> 
							Una fotografía de <strong>su firma<strong> (firma del <strong>postulante</strong>) en una hoja de fondo blanco;<br> 
							Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco.<br>
							Por favor recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte (<a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">Click Auí video para realizar recorte con paint</a>.)
							</li>
							<li>
							<strong>5).</strong> Debe mirar obligatoriamente el siguiente <strong>video instructivo</strong> de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="https://www.youtube.com/watch?v=N7yxUvfPAL4&feature=youtu.be&ab_channel=Lenynflores">Click Aquí Video Inscripción evaluación virtual</a>)
							</li>
							<li>
							<strong>6).</strong> <br>
							<strong>******************************IMPORTANTE**************************************************</strong>
							<br>
							INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y certificado de estudios o constancia de logro de aprendizaje).
							<br>
							USUARIO:<strong>'.$numerodocumento.'</strong><br>
							CONTRASEÑA:<strong>'.$clave.'</strong>
							<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
							CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
							</a> <-- 
							<br>
							<strong>******************************************************************************************</strong>
							</li>
							<li>
							<strong>7).</strong> Debe descargar e instalar obligatoriamente este programa en el ordenador donde va a rendir su evaluación virtual <br>
							-> LINK OPCION 1: <a href="https://drive.google.com/file/d/1Klr3MDKGTloh5-2o-JkG00V96XniGaul/view?usp=sharing">
							DESCARGAR PROGRAMA UNAJMA CONTROL V5
							</a> <br>
							-> LINK OPCION 2: https://drive.google.com/file/d/1Klr3MDKGTloh5-2o-JkG00V96XniGaul/view?usp=sharing
							</li>
							<li>
							<strong>8).</strong> Revisar los siguientes videos instructivos para la instalación del programa de control. <br>
							* Instalación programa Unajma Control (<a href="https://www.youtube.com/watch?v=9EulNdm-xYs">Link video</a>) <br>
							* Desactivar antivirus Windows Defender (<a href="https://www.youtube.com/watch?v=ykURvs0ZQrs">Link video</a>)
							</li>
							<li>							
							<strong>9).</strong> Después de culminar todas las indicaciones hasta terminar de realizar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de que usted terminó de realizar su inscripción satisfactoriamente. Por lo que deberá esperar pendiente a su correo electrónico, las indicaciones para el día del examen de la UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS. <br>
							Así mismo, también puede unirse al grupo de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones que la oficina de admisión de la universidad puede estar ofreciendoles. <br>
							<a href="https://chat.whatsapp.com/DS6oL399iXV3hkh9PkfX9I">CLICK AQUÍ Grupo 1 Whatsapp Examen unjam - admision</a> 
							<br> 
							<a href="https://chat.whatsapp.com/KaIeRaO1Dxi3FJHoiwcqYS">CLICK AQUÍ Grupo 2 Whatsapp Examen unjam - admision</a>
							<br>
							
							</li>
						</ul>
					</td>
				</tr>			
			</table>
			<br>				
			<table>
				<tr>
				  <td>
						Cualquier consulta, comunicarse con nosotros a los n&uacute;mero: 
						<strong> 991828881, 916331094, 985951660 </strong>						
				  </td>
				</tr>
				<tr>
				  <td>
						<br>
						Atentamente					
				  </td>
				</tr>
				<tr>
				  <td>
						<br>
						<strong>Oficina Central de Admisi&oacute;n</strong>
				  </td>
				</tr>
			</table>
			</body>
			</html>
			';
		
	}
	
	
	
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		#echo $cuerpo;
		#exit;
		#echo $cuerpo;
		#echo '<br>';
		mail($email, $asunto, $cuerpo, $cabeceras);
		#echo 'hola';
		#exit;
		mysqli_close($cn_email);
		
		$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','1','2','3','4','5','1900-01-01','1','2','3','4','5',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','1','2','3','4','5','6','7','U')";
		$rs_zet = mysqli_query($cn_email_zet, $vsql);	
		
		echo 'Envio Correcto';
	
	#if ($z=='1')
	#	{
	#		echo json_encode(array('error'=>0,'mensaje'=>'Se envi&oacute; la informaci&oacute;n al email del postulante'));
	#	}
	#else
	#	{
	#		echo json_encode(array('error'=>1,'mensaje'=>'Se produjo un error...'));
	#	}
?>