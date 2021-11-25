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
	mysqli_query($cn_email,"SET CHARACTER SET utf8");
	mysqli_query($cn_email,"SET NAMES utf8");
	mysqli_query($cn_email_zet,"SET CHARACTER SET utf8");
	mysqli_query($cn_email_zet,"SET NAMES utf8");
	
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

	/**
	 * function to rand phone number of the ofice admision
	 */
	function phoneRandAdmision($phones){
		shuffle($phones);
		$result = implode(", ", $phones);
		return $result;
	}

	$phones = ["913841534","974148417","991828881","916331094","985951660"];
	$numeros_admision = phoneRandAdmision($phones);

	//LAST DATA PROCESS
	$link_videos = [];
	$link_videos["2021-1"] = "https://www.youtube.com/watch?v=N7yxUvfPAL4&feature=youtu.be&ab_channel=Lenynflores";

	//DATA PROCESS CURRENTS
	$link_consulta = '<a href="https://examen.admisionunajma.pe/admision2000/?pg=consult">ADMISIÓN CONSULTA PROCESO 2021-2 (CLICK)</a>';
	$link_tutorial = "https://youtu.be/6gkC9VvA1yY";
	$link_tutorial_ps = "https://youtu.be/7xfoN10bywg"; // update 2021-3
	$link_tutorial_cepre = "https://youtu.be/7xfoN10bywg"; // update 2021-3
	$link_tutorial_quinto = "https://youtu.be/6gkC9VvA1yY"; // modificar este link
	$link_DJ = "https://drive.google.com/file/d/1M27E0UAXf44-6ZSERaIGd2YUGeiQ-LD6/view?usp=sharing";
	$link_wsp = [];
	$link_wsp["ordi1"] = "https://chat.whatsapp.com/JV9vpX2W0hoFvmWNpRjjUe";
	$link_wsp["ordi2"] = "https://chat.whatsapp.com/FKSXQQS4driIex3mOTVUVDS";
	$link_wsp["extra1"] = "https://chat.whatsapp.com/G9GEZn6xJao0rmAnUH9Vcj";
	$link_wsp["mate1"] = "https://chat.whatsapp.com/FfckVttmoZeKeWGZDHhNsR";
	// $link_wsp["extra2"] = "";


	if($proceso === "0022"){
		// CERRADO

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
								<strong>4).</strong> Debe mirar obligatoriamente el siguiente <strong>video instructivo</strong> de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="'.$link_tutorial.'">Click Aquí Video Inscripción evaluación virtual</a>)
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
							<strong>'.$numeros_admision.'</strong>						
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

	// PROCESO EXAMEN CEPRE 2021-3
	else if($proceso === "0029") {
	
		$asunto = "ADMISIÓN UNAJMA - EXAMEN CEPRE 2021-3 DIC.";	

		$title_correo = "EXTRAORDINARIO 2021-3 DIC.";

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
							<strong>SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO PARA LAS SIGUIENTES INDICACIONES.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li> 
								<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="'.$link_DJ.'">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
								Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azul.<br>
								No se olvide de <strong>firmar</strong> el documento, así también de ser menor de edad debe ir la firma de su apoderado.<br> 
								<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
								</li>
								<li>
								<strong>2).</strong> Asegurese de contar con su <strong>Certificado de estudios o ficha de logros de aprendizaje</strong> Así mismo sus documentos solicitados según su modalidad de postulación.
								</li>
								<li>
								<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos solicitados (*Declaración Jurada COVID, y su certificado de estudios). Debe <strong>escanear</strong> los documentos en <strong>UN SOLO</strong> archivo en formato PDF. <br>
								<strong>Recuerde que posteriormente debe subir este archivo PDF en el sistema virtual de admisión.</strong>
								<br>
								<a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
								<br>
								<a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
								</li>
								<li>
								<strong>4).</strong> Debe tener las siguientes fotografías:<br>
								Una fotografía de su <strong>rostro actual</strong> tipo carnet de identificación. <br> 
								Una fotografía de <strong>su firma</strong> (firma del <strong>postulante</strong>) en una hoja de fondo blanco;<br> 
								Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco. <br>
								Por favor recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte (<a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">Click Aquí video para realizar recorte con paint</a>.)
								</li>
								<li>
								<strong>5).</strong> Debe mirar obligatoriamente el siguiente <strong>video instructivo</strong> de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="'.$link_tutorial_cepre.'">Click Aquí Video Inscripción evaluación virtual</a>)
								</li>
								<li>
								<strong>6).</strong> <br>
								<strong>******************************IMPORTANTE**************************************************</strong>
								<br>
								INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y certificado de estudios o constancia de logro de aprendizaje).
								<br>
								<strong>Utilice estos credenciales para ingresar al sistema y COMPLETAR su inscripción.</strong> <br>
								USUARIO:<strong>'.$numerodocumento.'</strong><br>
								CONTRASEÑA:<strong>'.$clave.'</strong>
								<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
								CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
								</a> <-- 
								<br>
								<strong>******************************************************************************************</strong>
								</li>
								
								<li>							
								<strong>7).</strong> Después de cumplir todas las indicaciones hasta completar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de una inscripción satisfactoria. Por lo que después deberá esperar pendiente a su correo electrónico las indicaciones para el día del examen. <br>
								Puede unirse a los grupos de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones de la oficina de admisión.
								<br>
								<a href="https://chat.whatsapp.com/IvmWtn8GxzgBSrG6HqonFo">GRUPO ADMISIÓN CEPRE 2021-3 (OPT 1)</a> 
								<br> 
								<a href="https://chat.whatsapp.com/ICR1rKzlvaI6aE7jS2Ufpn">GRUPO ADMISIÓN CEPRE 2021-3 (OPT 2)</a>
								<br>
								<strong>RECUERDE QUE PARA EL DÍA DEL EXAMEN PRESENCIAL, DEBE PORTAR EL CARNE DE VACUNACIÓN COVID 19.</strong>
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

	// PROCESO EXAMEN PRIMERA SELECCIÓN
	else if($proceso === "0028") {
	
		$asunto = "ADMISIÓN UNAJMA - EXAMEN PRIMERA SELECCIÓN 2022-1";	

		$title_correo = "EXTRAORDINARIO 2022-1 DIC.";

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
							<strong>SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO PARA LAS SIGUIENTES INDICACIONES.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li> 
								<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="'.$link_DJ.'">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
								Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azul.<br>
								No se olvide de <strong>firmar</strong> el documento, así también de ser menor de edad debe ir la firma de su apoderado.<br> 
								<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
								</li>
								<li>
								<strong>2).</strong> Asegúrese de contar con su <strong>constancia de quinto grado</strong> otorgado por su Institución Educativa, así mismo sus documentos solicitados según su modalidad de postulación.
								</li>
								<li>
								<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos solicitados (*Declaración Jurada COVID, y constancia de estar cursando quinto de secundaria). Deberá <strong>Escanear</strong> estos documentos en <strong>UN SOLO</strong> archivo en formato PDF. <br>
								<strong>Recuerde que posteriormente bebe subir este documento PDF en el sistema de admisión virtual.</strong>
								<br>
								<a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
								<br>
								<a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
								</li>
								<li>
								<strong>4).</strong> Debe tener las siguientes fotografías:<br>
								Una fotografía de su <strong>rostro actual</strong> tipo carnet de identificación;<br> 
								Una fotografía de <strong>su firma</strong> (firma del <strong>postulante</strong>) en una hoja de fondo blanco;<br> 
								Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco.<br>
								Por favor recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte (<a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">Click Aquí video para realizar recorte con paint</a>.)
								</li>
								<li>
								<strong>5).</strong> Debe mirar obligatoriamente el siguiente video instructivo de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="'.$link_tutorial_ps.'">Click Aquí Video Inscripción evaluación virtual</a>)
								</li>
								<li>
								<strong>6).</strong> <br>
								<strong>******************************IMPORTANTE**************************************************</strong>
								<br>
								INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y constancia de quinto grado).
								<br>
								<strong>Utilice estos credenciales para ingresar al sistema y COMPLETAR su inscripción.</strong> <br>
								USUARIO:<strong>'.$numerodocumento.'</strong><br>
								CONTRASEÑA:<strong>'.$clave.'</strong>
								<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
								CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
								</a> <-- 
								<br>
								<strong>******************************************************************************************</strong>
								</li>
								
								<li>							
								<strong>7).</strong> Después de cumplir todas las indicaciones hasta completar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de una inscripción satisfactoria. Por lo que después deberá esperar pendiente a su correo electrónico las indicaciones para el día del examen. <br>
								Puede unirse a los grupos de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones de la oficina de admisión. 
								<br>
								<a href="https://chat.whatsapp.com/CD4a80iuuBk3mC0i4JDSAP">GRUPO ADMISIÓN PRIMERA SELECCIÓN 20221 (OPC 1)</a> 
								<br> 
								<a href="https://chat.whatsapp.com/CTOoGjQ0QrC7gksqBG4Y8h">GRUPO ADMISIÓN PRIMERA SELECCIÓN 20221 (OPC 2)</a>
								<br>
								<strong>RECUERDE QUE PARA EL DÍA DEL EXAMEN PRESENCIAL, DEBE PORTAR EL CARNE DE VACUNACIÓN COVID 19.</strong>
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

	// PROCESO CONCUROS DE MATEMÁTICAS
	else if($proceso === "0027") {
	
		$asunto = "ADMISIÓN UNAJMA - EXAMEN XV OLIMPIADAS 2021";	

		$title_correo = "ADMISIÓN UNAJMA - EXAMEN XV OLIMPIADAS";

		$cuerpo = '
		<html>
			<head>
				<title>EXAMEN XV OLIMPIADAS</title>
			</head>
			<body>
				<table>
					<tr>
						<td align="center">
							<strong>
							UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS
							</strong>
							<br>
							<strong>
							'.$title_correo.'
							</strong>
							<br>
							<br>
						</td>
					</tr>
					
					<tr>
						<td>
							Estimado(a) postulante: <strong>' .$nombre .'</strong>, 
							<br>DNI:<strong> ' .$numerodocumento . '</strong>, <br>
							correo electr&oacute;nico:<strong> '.$email.'</strong>:
							</strong> <br>
							<strong>Estimado participante tener en consideración las siguientes indicaciones para la participación en las olimpiadas.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li> 
								<strong>1).</strong> Asegurar el ancho de banda en su computadora con un mínimo estable de 4MB y 8MB recomendable.
								</li>
								<li>
								<strong>2).</strong> La computadora en la que rendirá su evaluación debe tener como mínimo instalado el navegador Chrome o Mozilla Firefox en sus actualizaciones más recientes.
								</li>
								<li>
								<strong>3).Revisar bien el video instructivo sobre los pasos para poder ingresar al sistema y rendir su evaluación que se les adjunta a continuación. <br>
								<a href="https://youtu.be/Z6EKfW69vBc">VIDEO CÓMO RENDIR EXAMEN VIRTUAL</a>
								</li>
								<li>
								<strong>4).</strong> <br>
								<strong>******************************IMPORTANTE**************************************************</strong>
								<br>
								INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong>
								<br>
								<strong>Utilice estos credenciales para ingresar al sistema y rendir su evaluación.</strong> <br>
								USUARIO:<strong>'.$numerodocumento.'</strong><br>
								CONTRASEÑA:<strong>'.$clave.'</strong>
								<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
								CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
								</a> <-- 
								<br>
								<strong>******************************************************************************************</strong>
								</li>
								<li>							
								<strong>6).</strong> Puedes unirte a los grupos de Whatsapp para resolver tus dudas, o para estar al tanto de las indicaciones que la oficina de admisión de la unajma puede ofrecerte. 
								<br>
								<a href="'.$link_wsp["mate1"].'">GRUPO ADMISIÓN EXAMEN XV OLIMPIADAS 2021</a> 
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
						Cualquier consulta, comunicarse con nosotros a los números: 
						<strong>916331094, 985951660</strong>					
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

	// CERRADO!!
	else if($proceso === "0024") {
		// (PROCESS EXTRAORDINARIO), two process configureds for the proccess EXTRAORDINARIO 
		# code...
	
		$asunto = "ADMISIÓN UNAJMA - EXAMEN EXTRAORDINARIO 2021-2 SEPT.";	

		$title_correo = "EXTRAORDINARIO 2021-2 SEPT.";

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
							<strong>
							'.$title_correo.'
							</strong>
							<br>
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
								<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="'.$link_DJ.'">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
								Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azul.<br>
								No se olvide de <strong>firmar</strong> el documento, así también de ser menor de edad debe ir la firma de su apoderado.<br> 
								<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
								</li>
								<li>
								<strong>2).</strong> Asegurese de contar con su <strong>Certificado de estudios o ficha de logros de aprendizaje</strong> Así mismo sus documentos solicitados según su modalidad de postulación.
								</li>
								<li>
								<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos solicitados (*Declaración Jurada COVID).<br>
								<strong>Escanee</strong> los documentos como UN SOLO <strong>archivo en formato PDF (*Su declaración jurada COVID, y su certificado de estudios)</strong>.
								<br>
								Debe obtener <strong>UN SOLO</strong> archivo PDF(documento en formato pdf).
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
								<strong>5).</strong> DEBE MIRAR OBLIGATORIAMENTE EL <strong>VIDEO INSTRUCTIVO</strong> PARA SEGUIR ADECUADAMENTE EL <strong>PROCESO DE INSCRIPCIÓN VIRTUAL</strong> (<a href="'.$link_tutorial.'">VIDEO TUTORIAL PARA LA INSCRIPCIÓN VIRTUAL</a>)
								</li>
								<li>
								<strong>6).</strong> <br>
								<strong>******************************IMPORTANTE**************************************************</strong>
								<br>
								INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y certificado de estudios o constancia de logro de aprendizaje).
								<br>
								<strong>Utilice estos credenciales para ingresar al sistema y COMPLETAR su inscripción.</strong> <br>
								USUARIO:<strong>'.$numerodocumento.'</strong><br>
								CONTRASEÑA:<strong>'.$clave.'</strong>
								<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
								CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
								</a> <-- 
								<br>
								<strong>******************************************************************************************</strong>
								</li>

								<li>
									<strong>7).</strong> Recuerde que puede consultar el estado de su inscripción en la siguiente página. 
									<br>
									'.$link_consulta.'
									<br> 
								</li>
								
								<li>							
								<strong>8).</strong> Después de cumplir todas las indicaciones hasta completar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de una inscripción satisfactoria. Por lo que después deberá esperar pendiente a su correo electrónico las indicaciones para el día del examen. <br>
								Puede unirse a los grupos de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones de la oficina de admisión. 
								<br>
								<a href="'.$link_wsp["extra1"].'">GRUPO ADMISIÓN EXTRAORDINARIO 20212</a> 
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
							<strong>'.$numeros_admision.'</strong>						
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

	//CERRADO!!
	elseif ($proceso === "0025" || $proceso === "0026") {
		// (PROCESS ORDINARIO), two process configureds for the proccess ORDINARIO 
		# code...
	
		$asunto = "ADMISIÓN UNAJMA - EXAMEN ORDINARIO 2021-2 SEPT.";	

		$title_correo = "ORDINARIO 2021-2 SEPT.";

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
							<strong>
							'.$title_correo.'
							</strong>
							<br>
							<br>
						</td>
					</tr>
					<tr>
						<td>
							Estimado(a) postulante: <strong>' .$nombre .'</strong>, 
							<br>DNI:<strong> ' .$numerodocumento . '</strong>, <br>
							correo electr&oacute;nico:<strong> '.$email.'</strong>:
							</strong> <br>
							<strong>SE RECOMIENDA USAR UN ORIDENADOR DE ESCRITORIO PARA LAS SIGUIENTES INDICACIONES.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li> 
								<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="'.$link_DJ.'">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
								Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azul.<br>
								No se olvide de <strong>firmar</strong> el documento, así también de ser menor de edad debe ir la firma de su apoderado.<br> 
								<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
								</li>
								<li>
								<strong>2).</strong> Asegurese de contar con su <strong>Certificado de estudios o ficha de logros de aprendizaje</strong> Así mismo sus documentos solicitados según su modalidad de postulación.
								</li>
								<li>
								<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos solicitados (*Declaración Jurada COVID).<br>
								<strong>Escanee</strong> los documentos como UN SOLO <strong>archivo en formato PDF (*Su declaración jurada COVID, y su certificado de estudios)</strong>.
								<br>
								Debe obtener <strong>UN SOLO</strong> archivo PDF(documento en formato pdf).
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
								<strong>5).</strong> DEBE MIRAR OBLIGATORIAMENTE EL <strong>VIDEO INSTRUCTIVO</strong> PARA SEGUIR ADECUADAMENTE EL <strong>PROCESO DE INSCRIPCIÓN VIRTUAL</strong> (<a href="'.$link_tutorial.'">VIDEO TUTORIAL PARA LA INSCRIPCIÓN VIRTUAL</a>)
								</li>
								<li>
								<strong>6).</strong> <br>
								<strong>******************************IMPORTANTE**************************************************</strong>
								<br>
								INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y certificado de estudios o constancia de logro de aprendizaje).
								<br>
								<strong>Utilice estos credenciales para ingresar al sistema y COMPLETAR su inscripción.</strong> <br>
								USUARIO:<strong>'.$numerodocumento.'</strong><br>
								CONTRASEÑA:<strong>'.$clave.'</strong>
								<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
								CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
								</a> <-- 
								<br>
								<strong>******************************************************************************************</strong>
								</li>

								<li>
									<strong>7).</strong> Recuerde que puede consultar el estado de su inscripción en la siguiente página: => 
									'.$link_consulta.'
									<br> 
								</li>
								
								
								<li>							
								<strong>8).</strong> Después de cumplir todas las indicaciones hasta completar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de una inscripción satisfactoria. Por lo que después deberá esperar pendiente a su correo electrónico las indicaciones para el día del examen. <br>
								Puede unirse a los grupos de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones de la oficina de admisión. <br>
								<a href="'.$link_wsp["ordi1"].'">GRUPO ADMISIÓN ORDINARIO 20212</a> 
								<br> 
								<a href="'.$link_wsp["ordi2"].'">GRUPO ADMISIÓN ORDINARIO 20212</a>
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
							<strong>'.$numeros_admision.'</strong>						
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

			
	// CASO DE QUE NO SE MODIFIQUE NINGÚN OTRO CORREO ELECTRONICO
	}
	
	else {
		// CASO CONTRARIO. EN EL CASO DE QUE EL PROCESO NO SEA TRASLADOS

		$asunto = "ADMISIÓN UNAJMA - EXAMEN CEPRE 2021-#";	
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
							<strong>SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO PARA LAS SIGUIENTES INDICACIONES.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li> 
								<strong>1).</strong> Descargue la <strong>declaración jurada COVID</strong> en formato word (<a href="'.$link_DJ.'">CLICK AQUÍ PARA DESCARGAR ARCHIVO</a>).<br> 
								Una vez descargado el archivo, <string>IMPRIMALO</string>; y luego rellene los datos requeridos con lapicero azul.<br>
								No se olvide de <strong>firmar</strong> el documento, así también de ser menor de edad debe ir la firma de su apoderado.<br> 
								<strong>ESTE REQUISITO ES IMPORTANTE Y POR LO TANTO NO PUEDE QUEDAR EXCLUIDO</strong>
								</li>
								<li>
								<strong>2).</strong> Asegurese de contar con su <strong>Certificado de estudios o ficha de logros de aprendizaje</strong> Así mismo sus documentos solicitados según su modalidad de postulación.
								</li>
								<li>
								<strong>3).</strong> Antes de proceder con esta indicación, debe tener impreso y llenado los documentos solicitados (*Declaración Jurada COVID).<br>
								<strong>Escanee</strong> los documentos como UN SOLO <strong>archivo en formato PDF (*Su declaración jurada COVID, y su certificado de estudios)</strong>.
								<br>
								Debe obtener <strong>UN SOLO</strong> archivo PDF(documento en formato pdf).
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
								<strong>5).</strong> Debe mirar obligatoriamente el siguiente <strong>video instructivo</strong> de la universidad para no tener dificultades en su <strong>inscripción</strong> (<a href="'.$link_tutorial.'">Click Aquí Video Inscripción evaluación virtual</a>)
								</li>
								<li>
								<strong>6).</strong> <br>
								<strong>******************************IMPORTANTE**************************************************</strong>
								<br>
								INGRESE AL <strong>SISTEMA VIRTUAL DE ADMISIÓN</strong> PARA TERMINAR SU INSCRIPCIÓN, Y ASÍ PODER SUBIR LAS FIRMAS (POSTULANTE Y APODERADO EN CASO SEA MENOR DE EDAD),Y SU DOCUMENTO PDF (declaración jurada COVID y certificado de estudios o constancia de logro de aprendizaje).
								<br>
								<strong>Utilice estos credenciales para ingresar al sistema y COMPLETAR su inscripción.</strong> <br>
								USUARIO:<strong>'.$numerodocumento.'</strong><br>
								CONTRASEÑA:<strong>'.$clave.'</strong>
								<br> --> <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">
								CLICK AQUÍ SISTEMA VIRTUAL DE ADMISIÓN UNAJMA
								</a> <-- 
								<br>
								<strong>******************************************************************************************</strong>
								</li>
								
								<li>							
								<strong>7).</strong> Después de cumplir todas las indicaciones hasta completar su inscripción, debe contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores. Está constancia de inscripción es prueba de una inscripción satisfactoria. Por lo que después deberá esperar pendiente a su correo electrónico las indicaciones para el día del examen. <br>
								Puede unirse a los grupos de Whatsapp para conocer a sus futuros compañeros, resolver dudas, o para estar al tanto de las indicaciones de la oficina de admisión. <br>
								<a href="https://chat.whatsapp.com/CUxw4ydJLMp2NGHVcpkN5E">GRUPO ADMISIÓN CEPRE 20212</a> 
								<br> 
								<a href="https://chat.whatsapp.com/JfG5pxaMP3j2GSmKR2UIWN">GRUPO ADMISIÓN CEPRE 20212</a>
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
		mail($email, utf8_decode($asunto), utf8_decode($cuerpo), $cabeceras);
		#echo 'hola';
		#exit;
		mysqli_close($cn_email);
		
		$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','1','2','3','4','5','1900-01-01','1','2','3','4','5',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','1','2','3','4','5','6','7','U')";
		$rs_zet = mysqli_query($cn_email_zet, $vsql);	
		
		// echo 'Envio Correcto :D';

		// echo "<br> ".$numeros_admision;

		// echo "<br>";

	
	#if ($z=='1')
	#	{
	#		echo json_encode(array('error'=>0,'mensaje'=>'Se envi&oacute; la informaci&oacute;n al email del postulante'));
	#	}
	#else
	#	{
	#		echo json_encode(array('error'=>1,'mensaje'=>'Se produjo un error...'));
	#	}
?>

<style>

	body{
		margin:0px;
		padding:0px;
		background:black;
		color:white;
	}

	.centrar-contenido{

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

</style>

<div class="centrar-contenido">
	
	<div class="container text-center"> 
		<h3>ENVIÓ CORRECTO!! :D</h3>
		<div>
			<?=$numeros_admision?>
		</div>
		<strong class="msj_close">
			... 
		</strong>

		<br>
		
		<img src="./public/dance-dog.gif" 
			alt="dance-dog :V" 
			class="img-gif mt-default" >

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