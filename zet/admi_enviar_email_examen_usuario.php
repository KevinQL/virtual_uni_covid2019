<?php
	include('../config.php');
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	include(GL_DIR_FS_APP.'funciones/funciones_admision.php');
	
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
		
	$asunto = "UNAJMA - EXAMEN PRESENCIAL 2022";	
		
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

	$phones = ["991828881","916331094","985951660"];
	$numeros_admision = phoneRandAdmision($phones);

	//LAST DATA PROCESS
	$link_videos = [];
	$link_videos["2021-1"] = "https://www.youtube.com/watch?v=N7yxUvfPAL4&feature=youtu.be&ab_channel=Lenynflores";

	//DATA PROCESS CURRENTS
	$link_consulta = '<a href="https://examen.admisionunajma.pe/admision2000/?pg=consult">ADMISIÓN CONSULTA PROCESO 2022-1 (CLICK)</a>';
	$link_tutorial = "https://youtu.be/EczYN5WxVTU";
	$link_tutorial_ordinario = "https://youtu.be/EczYN5WxVTU";
	$link_tutorial_extraordinario = "https://youtu.be/EczYN5WxVTU";
	$link_tutorial_cepre = "https://youtu.be/EczYN5WxVTU"; // update 2021-3
	$link_tutorial_ps = "https://youtu.be/7xfoN10bywg"; // update 2021-3
	$link_tutorial_quinto = "https://youtu.be/6gkC9VvA1yY"; // modificar este link
	$link_DJ = "https://drive.google.com/file/d/1M27E0UAXf44-6ZSERaIGd2YUGeiQ-LD6/view?usp=sharing";
	$link_wsp = [];
	$link_wsp["ordi1"] = "https://chat.whatsapp.com/JV9vpX2W0hoFvmWNpRjjUe";
	$link_wsp["ordi2"] = "https://chat.whatsapp.com/FKSXQQS4driIex3mOTVUVDS";
	$link_wsp["extra1"] = "https://chat.whatsapp.com/G9GEZn6xJao0rmAnUH9Vcj";
	$link_wsp["extra2"] = "https://chat.whatsapp.com/G9GEZn6xJao0rmAnUH9Vcj";
	$link_wsp["cepre1"] = "https://chat.whatsapp.com/G9GEZn6xJao0rmAnUH9Vcj";
	$link_wsp["cepre2"] = "https://chat.whatsapp.com/G9GEZn6xJao0rmAnUH9Vcj";
	$link_wsp["mate1"] = "https://chat.whatsapp.com/FfckVttmoZeKeWGZDHhNsR";

	/**
	 * ****************************************************************
	 * ****************************************************************
	 * ******************* ULTIMA ACTUALIZACIÓN ***********************
	 *              => PROCESO 2021-3 / 02-12-2021 <=
	 * ****************************************************************
	 * ****************************************************************
	 */

	$txtsugest['rocomendation'] = "PARA LAS SIGUIENTES INDICACIONES SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO, PC O LAPTOP.";



	// PROCESO EXAMEN ORDIANRIO
	if($proceso === "0030"){

		$fcha_ordi = "2022-1 ABRIL";
		$title_correo = "ORDINARIO ".$fcha_ordi;
		$asunto = "ADMISIÓN UNAJMA - EXAMEN " . $title_correo;	

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
							DNI: <strong>' .$numerodocumento . '</strong>, <br>
							Escuela profesional: <strong>'.$escuela.'</strong> <br>
							Correo electrónico: <strong>'.$email.'</strong>, <br>
							Celular: <strong>'.$celular.'</strong>
							<br>
							<strong>PARA LAS SIGUIENTES INDICACIONES SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO, PC O LAPTOP.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								
								<li>
									<strong>1).</strong> Asegurese de contar con tu <strong>Certificado de estudios, o ficha de logros de aprendizaje</strong>.
								</li>

								<li>
									<strong>2).</strong> 
									<strong>Escanear</strong> los documentos (Certificado de estudios) como <strong>UN SOLO</strong> archivo en formato PDF.
									<br>
									<strong>** Debe obtener UN SOLO archivo PDF(documentos en formato PDF)</strong>. 
									<br>
									Los documentos escaneados tienen que ser <strong>completamente legibles, leíbles y claros</strong>, caso contrario serán rechazados. 
									<br>
									<strong>** Comprima su documento para que pese menos de 2MB.</strong>
										<br>
										2.1) Página para comprimir archivo <a href="https://www.ilovepdf.com/es/comprimir_pdf">https://www.ilovepdf.com/es/comprimir_pdf</a>
										<br>
										2.2) Tutorial para comprimir archivo <a href="https://youtu.be/qzeHv4wXrQc">https://youtu.be/qzeHv4wXrQc</a>
									<br>
									<strong>** Recuerde SUBIR este archivo PDF al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">sistema virtual de admisión</a>.</strong>
									<br>
									** PARA ESCANEAR TUS DOCUMENTOS TAMBIÉN O <strong>MEJOR</strong> TE PUEDES ACERCAR A UNA FOTOCOPIADORA-INTERNET PÚBLICO.
									<br>
									** <a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
									<br>
									** <a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
								</li>

								<li>
								<strong>3).</strong>
									Preparar las siguientes <strong>fotografías</strong>: 
									<br>
									3.1) Una fotografía de <strong>su firma </strong>(firma del <strong>postulante</strong>) en una hoja de fondo blanco.
									<br> 
									3.2) Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco. <br>
									<strong>Importante recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte.</strong>
									<br>
									<strong>** Recuerde SUBIR estas fotografías al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">sistema virtual de admisión</a>.</strong>
									<br>
									** Recortar con wsp <a href="https://www.youtube.com/watch?v=sp53kbZLtZg">https://www.youtube.com/watch?v=sp53kbZLtZg</a>
									<br>
									** Recortar con paint <a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt</a>
								</li>
								<li>
									<strong>4).</strong> 
									Mirar obligatoriamente el siguiente <strong><a href="'.$link_tutorial_ordinario.'">Video instructivo</a></strong> para completar tu <strong>inscripción virtual</strong>. En este instructivo te indicamos como <strong>subir</strong> tu <strong>archivo PDF</strong> y tus <strong>fotografias recortadas</strong>, para finalmente conseguir tu <strong>constancia de inscripción</strong>.
									<br> 
									** <a href="'.$link_tutorial_ordinario.'">Video instructivo</a>: <a href="'.$link_tutorial_ordinario.'">'.$link_tutorial_ordinario.'</a>
								</li>
								<li>
								<strong>5).</strong> 
									<br>
									<strong>************************ ********** ************************</strong> <br>
									<strong>*********************** IMPORTANTE *********************</strong> <br>
									<strong>************************ ********** ************************</strong> <br>
									DETALLES PARA EL ACCESO AL <strong><a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">SISTEMA VIRTUAL DE ADMISIÓN</a></strong>
									<br>
									<u>CREDENCIALES DE ACCESO PERSONAL</u>
									<br>
									¤¤¤[☻] USUARIO:<strong>'.$numerodocumento.'</strong> <br>
									¤¤¤[Ð] CONTRASEÑA:<strong>'.$clave.'</strong>
									<br> 
									<strong>** Estos credenciales son únicos y personales</strong>, por lo que no debes compartirlo con nadie. 
									<br>
									** INGRESE POR AQUÍ <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">AL SISTEMA VIRTUAL DE ADMISIÓN</a>: -> 
									<a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">https://examen.admisionunajma.pe/zetadmision/zet/index.php</a>
									<br>
									** Para tener acceso al sistema debes ingresar estos credenciales. Seguidamente podrás completar tu inscripción, hasta obtener tu Constancia de Inscripción.
									<br>
									<strong>************************************************************</strong> <br>
									<strong>************************ ********** *************************</strong> <br>
									<strong>************************ ********** *************************</strong> <br>
									<strong>************************************************************</strong> <br>

								</li>
								
								<li>							
								<strong>7).</strong> 
									Después de cumplir todas las indicaciones, y contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores, estará dispuesto para el examen de admisión. Tener a la mano La Constancia de Inscripción es prueba de una <strong>inscripción satisfactoria</strong>; aunque deberá estar atento a su correo y telefono celular en el caso de que nos queramos comunicar con usted para tratar algún percanse en particular. Finalmente recomendamos muy encarecidamente esperar pendiente a su correo electrónico las indicaciones para el día del examen.
									<br>
									** Puede unirse a los <strong>grupos de Whatsapp</strong> para estar al tanto de las indicaciones coyunturales que pudieran estar surguiendo; en la misma medida usted puede realizar su consulta manteniendo el orden y respeto mutuo. Ingrese SOLO a UN grupo. Cualquiera de los dos grupos son para todas las carreras.
									<br>
									<a href="https://chat.whatsapp.com/GfaulPIhKngFMX3c5KzLaS">GRUPO ADMISIÓN ORDINARIO 2022-1 (OPT 1)</a> 
									<br> 
									<a href="https://chat.whatsapp.com/BLzAvC3mPSFEL69aA757es">GRUPO ADMISIÓN ORDINARIO 2022-1 (OPT 2)</a>
									<br>
									<strong>
										*** (IMPORTANTE) RECUERDE QUE PARA EL DÍA DEL EXAMEN PRESENCIAL, DEBE PORTAR EL CARNE DE VACUNACIÓN COVID 19, SU CONSTANCIA DE INSCRIPCIÓN, Y DNI.
										<br>
									</strong>
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
							<strong>Oficina Central de Admisión</strong>
					</td>
					</tr>
				</table>
			</body>
		</html>
		';

	}
	// PROCESO EXAMEN EXTRAORDINARIO
	else if($proceso === "0031") {
		// (PROCESS EXTRAORDINARIO), two process configureds for the proccess EXTRAORDINARIO 
		# code...

		$fcha_ordi = "2022-1 MARZO";
		$title_correo = "EXTRAORDINARIO ".$fcha_ordi;
		$asunto = "ADMISIÓN UNAJMA - EXAMEN " . $title_correo;	

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
							DNI: <strong>' .$numerodocumento . '</strong>, <br>
							Escuela profesional: <strong>'.$escuela.'</strong> <br>
							Correo electrónico: <strong>'.$email.'</strong>, <br>
							Celular: <strong>'.$celular.'</strong>
							<br>
							<strong>PARA LAS SIGUIENTES INDICACIONES SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO, PC O LAPTOP.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								
								<li>
									<strong>1).</strong> Asegurese de contar con tu <strong>Certificado de estudios, o ficha de logros de aprendizaje</strong> Así mismo los <strong>documentos requeridos según la modalidad extraordinario</strong>.
									<br>
									** En la página de admisión están los <strong>REQUISITOS y COSTOS de inscripción</strong> para cada tipo de modalidad extraordinario.
									<br>
									** página de Requistos y Costos por modalidad extraordianrio:
									<a href="https://examen.admisionunajma.pe/pagina_extraordinario.php">https://examen.admisionunajma.pe/pagina_extraordinario.php</a>
								</li>

								<li>
									<strong>2).</strong> 
									<strong>Escanear</strong> los documentos (Certificado de estudios, documentos requeridos según la modalidad extraordinario) como <strong>UN SOLO</strong> archivo en formato PDF.
									<br>
									<strong>** Debe obtener UN SOLO archivo PDF(documentos en formato PDF)</strong>. 
									<br>
									Los documentos escaneados tienen que ser <strong>completamente legibles, leíbles y claros</strong>, caso contrario serán rechazados. 
									<br>
									<strong>** Comprima su documento para que pese menos de 2MB.</strong>
										<br>
										2.1) Página para comprimir archivo <a href="https://www.ilovepdf.com/es/comprimir_pdf">https://www.ilovepdf.com/es/comprimir_pdf</a>
										<br>
										2.2) Tutorial para comprimir archivo <a href="https://youtu.be/qzeHv4wXrQc">https://youtu.be/qzeHv4wXrQc</a>
									<br>
									<strong>** Recuerde SUBIR este archivo PDF al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">sistema virtual de admisión</a>.</strong>
									<br>
									** PARA ESCANEAR TUS DOCUMENTOS TAMBIÉN O <strong>MEJOR</strong> TE PUEDES ACERCAR A UNA FOTOCOPIADORA-INTERNET PÚBLICO.
									<br>
									** <a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
									<br>
									** <a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
								</li>

								<li>
								<strong>3).</strong>
									Preparar las siguientes <strong>fotografías</strong>: 
									<br>
									3.1) Una fotografía de <strong>su firma </strong>(firma del <strong>postulante</strong>) en una hoja de fondo blanco.
									<br> 
									3.2) Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco. <br>
									<strong>Importante recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte.</strong>
									<br>
									<strong>** Recuerde SUBIR estas fotografías al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">sistema virtual de admisión</a>.</strong>
									<br>
									** Recortar con wsp <a href="https://www.youtube.com/watch?v=sp53kbZLtZg">https://www.youtube.com/watch?v=sp53kbZLtZg</a>
									<br>
									** Recortar con paint <a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt</a>
								</li>
								<li>
									<strong>4).</strong> 
									Mirar obligatoriamente el siguiente <strong><a href="'.$link_tutorial_extraordinario.'">Video instructivo</a></strong> para completar tu <strong>inscripción virtual</strong>. En este instructivo te indicamos como <strong>subir</strong> tu <strong>archivo PDF</strong> y tus <strong>fotografias recortadas</strong>, para finalmente conseguir tu <strong>constancia de inscripción</strong>.
									<br> 
									** <a href="'.$link_tutorial_extraordinario.'">Video instructivo</a>: <a href="'.$link_tutorial_extraordinario.'">'.$link_tutorial_extraordinario.'</a>
								</li>
								<li>
								<strong>5).</strong> 
									<br>
									<strong>************************ ********** ************************</strong> <br>
									<strong>*********************** IMPORTANTE *********************</strong> <br>
									<strong>************************ ********** ************************</strong> <br>
									DETALLES PARA EL ACCESO AL <strong><a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">SISTEMA VIRTUAL DE ADMISIÓN</a></strong>
									<br>
									<u>CREDENCIALES DE ACCESO PERSONAL</u>
									<br>
									¤¤¤[☻] USUARIO:<strong>'.$numerodocumento.'</strong> <br>
									¤¤¤[Ð] CONTRASEÑA:<strong>'.$clave.'</strong>
									<br> 
									<strong>** Estos credenciales son únicos y personales</strong>, por lo que no debes compartirlo con nadie. 
									<br>
									** INGRESE POR AQUÍ <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">AL SISTEMA VIRTUAL DE ADMISIÓN</a>: -> 
									<a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">https://examen.admisionunajma.pe/zetadmision/zet/index.php</a>
									<br>
									** Para tener acceso al sistema debes ingresar estos credenciales. Seguidamente podrás completar tu inscripción, hasta obtener tu Constancia de Inscripción.
									<br>
									<strong>************************************************************</strong> <br>
									<strong>************************ ********** *************************</strong> <br>
									<strong>************************ ********** *************************</strong> <br>
									<strong>************************************************************</strong> <br>

								</li>
								
								<li>							
								<strong>7).</strong> 
									Después de cumplir todas las indicaciones, y contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores, estará dispuesto para el examen de admisión. Tener a la mano La Constancia de Inscripción es prueba de una <strong>inscripción satisfactoria</strong>; aunque deberá estar atento a su correo y telefono celular en el caso de que nos queramos comunicar con usted para tratar algún percanse en particular. Finalmente recomendamos muy encarecidamente esperar pendiente a su correo electrónico las indicaciones para el día del examen.
									<br>
									** Puede unirse a los <strong>grupos de Whatsapp</strong> para estar al tanto de las indicaciones coyunturales que pudieran estar surguiendo; en la misma medida usted puede realizar su consulta manteniendo el orden y respeto mutuo. Ingrese SOLO a UN grupo. Cualquiera de los dos grupos son para todas las carreras.
									<br>
									<a href="https://chat.whatsapp.com/JynxJefXU9ILZdF2Db0Pa2">GRUPO ADMISIÓN EXTRAORDINARIO 2022-1 (OPT 1)</a> 
									<br> 
									<a href="https://chat.whatsapp.com/Ju0p8urOCbt6JtTFWbRxSB">GRUPO ADMISIÓN EXTRAORDINARIO 2022-1 (OPT 2)</a>
									<br>
									<strong>
										*** (IMPORTANTE) RECUERDE QUE PARA EL DÍA DEL EXAMEN PRESENCIAL, DEBE PORTAR EL CARNE DE VACUNACIÓN COVID 19, SU CONSTANCIA DE INSCRIPCIÓN, Y DNI.
										<br>
									</strong>
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
							<strong>Oficina Central de Admisión</strong>
					</td>
					</tr>
				</table>
			</body>
		</html>
		';

	}
	// PROCESO EXAMEN CEPRE
	else if($proceso === "0032") {
	
		$fcha_ordi = "2022-1 MARZO";
		$title_correo = "CEPRE " . $fcha_ordi;
		$asunto = "ADMISIÓN UNAJMA - EXAMEN " . $title_correo;	

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
							DNI: <strong>' .$numerodocumento . '</strong>, <br>
							Escuela profesional: <strong>'.$escuela.'</strong> <br>
							Correo electrónico: <strong>'.$email.'</strong>, <br>
							Celular: <strong>'.$celular.'</strong>
							<br>
							<strong>PARA LAS SIGUIENTES INDICACIONES SE RECOMIENDA USAR UN ORDENADOR DE ESCRITORIO, PC O LAPTOP.</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								
								<li>
									<strong>1).</strong> Asegurese de contar con tu <strong>Certificado de estudios, o ficha de logros de aprendizaje</strong>.
								</li>

								<li>
									<strong>2).</strong> 
									<strong>Escanear</strong> los documentos (<strong>Certificado de estudios</strong>) como <strong>UN SOLO</strong> archivo en formato PDF.
									<br>
									<strong>** Debe obtener UN SOLO archivo PDF(documentos en formato PDF)</strong>. 
									<br>
									Los documentos escaneados tienen que ser <strong>completamente legibles, leíbles y claros</strong>, caso contrario serán rechazados. 
									<br>
									<strong>** Comprima su documento para que pese menos de 2MB.</strong>
										<br>
										2.1) Página para comprimir archivo <a href="https://www.ilovepdf.com/es/comprimir_pdf">https://www.ilovepdf.com/es/comprimir_pdf</a>
										<br>
										2.2) Tutorial para comprimir archivo <a href="https://youtu.be/qzeHv4wXrQc">https://youtu.be/qzeHv4wXrQc</a>
									<br>
									<strong>** Recuerde SUBIR este archivo PDF al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">sistema virtual de admisión</a>.</strong>
									<br>
									** PARA ESCANEAR TUS DOCUMENTOS TAMBIÉN O <strong>MEJOR</strong> TE PUEDES ACERCAR A UNA FOTOCOPIADORA-INTERNET PÚBLICO.
									<br>
									** <a href="https://www.youtube.com/watch?v=myzSi6vEHr0&ab_channel=TooSmart">Click Aquí video para escanear con el CELULAR</a> 
									<br>
									** <a href="https://www.youtube.com/watch?v=tXJBEDfrcHI&ab_channel=FranquiciasTiendasAPP">¿Qué es escanear?</a>
								</li>

								<li>
								<strong>3).</strong>
									Preparar las siguientes <strong>fotografías</strong>: 
									<br>
									3.1) Una fotografía de <strong>su firma </strong>(firma del <strong>postulante</strong>) en una hoja de fondo blanco.
									<br> 
									3.2) Una fotografía de <strong>la firma</strong> del <strong>apoderado</strong> en una hoja de fondo blanco. <br>
									<strong>Importante recortar las firmas a los tamaños de las firmas, pueden usar Paint o el mismo Whatsaap para realizar el recorte.</strong>
									<br>
									<strong>** Recuerde SUBIR estas fotografías al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">sistema virtual de admisión</a>.</strong>
									<br>
									** Recortar con wsp <a href="https://www.youtube.com/watch?v=sp53kbZLtZg">https://www.youtube.com/watch?v=sp53kbZLtZg</a>
									<br>
									** Recortar con paint <a href="https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt">https://www.youtube.com/watch?v=fcaeUdxpZVI&ab_channel=webscomgt</a>
								</li>
								<li>
									<strong>4).</strong> 
									Mirar obligatoriamente el siguiente <strong><a href="'.$link_tutorial_ordinario.'">Video instructivo</a></strong> para completar tu <strong>inscripción virtual</strong>. En este instructivo te indicamos como <strong>subir</strong> tu <strong>archivo PDF</strong> y tus <strong>fotografias recortadas</strong>, para finalmente conseguir tu <strong>constancia de inscripción</strong>.
									<br> 
									** <a href="'.$link_tutorial_ordinario.'">Video instructivo</a>: <a href="'.$link_tutorial_ordinario.'">'.$link_tutorial_ordinario.'</a>
								</li>
								<li>
								<strong>5).</strong> 
									<br>
									<strong>************************ ********** ************************</strong> <br>
									<strong>*********************** IMPORTANTE *********************</strong> <br>
									<strong>************************ ********** ************************</strong> <br>
									DETALLES PARA EL ACCESO AL <strong><a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">SISTEMA VIRTUAL DE ADMISIÓN</a></strong>
									<br>
									<u>CREDENCIALES DE ACCESO PERSONAL</u>
									<br>
									¤¤¤[☻] USUARIO:<strong>'.$numerodocumento.'</strong> <br>
									¤¤¤[Ð] CONTRASEÑA:<strong>'.$clave.'</strong>
									<br> 
									<strong>** Estos credenciales son únicos y personales</strong>, por lo que no debes compartirlo con nadie. 
									<br>
									** INGRESE POR AQUÍ <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">AL SISTEMA VIRTUAL DE ADMISIÓN</a>: -> 
									<a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php">https://examen.admisionunajma.pe/zetadmision/zet/index.php</a>
									<br>
									** Para tener acceso al sistema debes ingresar estos credenciales. Seguidamente podrás completar tu inscripción, hasta obtener tu Constancia de Inscripción.
									<br>
									<strong>************************************************************</strong> <br>
									<strong>************************ ********** *************************</strong> <br>
									<strong>************************ ********** *************************</strong> <br>
									<strong>************************************************************</strong> <br>

								</li>
								
								<li>							
								<strong>7).</strong> 
									Después de cumplir todas las indicaciones, y contar a la mano con su <strong>CONSTANCIA DE INSCRIPCIÓN</strong> impreso a colores, estará dispuesto para el examen de admisión. Tener a la mano La Constancia de Inscripción es prueba de una <strong>inscripción satisfactoria</strong>; aunque deberá estar atento a su correo y telefono celular en el caso de que nos queramos comunicar con usted para tratar algún percanse en particular. Finalmente recomendamos muy encarecidamente esperar pendiente a su correo electrónico las indicaciones para el día del examen.
									<br>
									** Puede unirse a los <strong>grupos de Whatsapp</strong> para estar al tanto de las indicaciones coyunturales que pudieran estar surguiendo; en la misma medida usted puede realizar su consulta manteniendo el orden y respeto mutuo. Ingrese SOLO a UN grupo. Cualquiera de los dos grupos son para todas las carreras.
									<br>
									<a href="https://chat.whatsapp.com/Kv90A2SA8GXKm6U0qasoSc">GRUPO ADMISIÓN CEPRE 2022-1 (OPT 1)</a> 
									<br> 
									<a href="https://chat.whatsapp.com/K6t76DH91lW9csOR53g0hT">GRUPO ADMISIÓN CEPRE 2022-1 (OPT 2)</a>
									<br>
									<strong>
										*** (IMPORTANTE) RECUERDE QUE PARA EL DÍA DEL EXAMEN PRESENCIAL, DEBE PORTAR EL CARNE DE VACUNACIÓN COVID 19, SU CONSTANCIA DE INSCRIPCIÓN, Y DNI.
										<br>
									</strong>
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
							<strong>Oficina Central de Admisión</strong>
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
							Estimado(a) postulante: <strong>' .$nombre .'</strong>, <br> 
							DNI: <strong>' .$numerodocumento . '</strong>, <br>
							Escuela profesional: <strong>'.$escuela.'</strong> <br>
							Correo electrónico: <strong>'.$email.'</strong>, <br>
							Celular: <strong>'.$celular.'</strong>
							<br>
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
							Cualquier consulta, comunicarse con nosotros a los números: 
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
		mail($email, utf8_decode($asunto), utf8_decode($cuerpo), $cabeceras);
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


	.text-close{
		font-size: 2.3rem;
	}

</style>

<div class="centrar-contenido">
	
	<div class="container text-center"> 
		<h3>ENVIÓ CORRECTO!! :D</h3>
		
		<h1 class="text-close">NO CERRAR ESTA VENTANA!</h1>
		<p>
			Esta página se cerrará automáticamente.
		</p>
		<strong class="msj_close">
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