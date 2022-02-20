<?php
	/**
	 * ****************************************************************
	 * ****************************************************************
	 * ******************* ULTIMA ACTUALIZACIÓN ***********************
	 *              => PROCESO 2022-1 / 09-02-2022 <=
	 * ****************************************************************
	 * ****************************************************************
	 */


	/**
     * /**************************************\
     * |*************** ERORR REPORTING PHP
     * ****************************************
     */
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
	

	/**
     * /**************************************\
     * |*************** DATA TEST THIS FILE PHP
     * ****************************************
     */

		// $email = "unajmakev@gmail.com";
		// $nombre = "kevin quispe lima";
		// $numerodocumento = "70598957";
		// $escuela = "ING. DE SISTEMAS";
		// $celular = "916 331 904";

		//echo "code for preinscription mail";


	/**
     * /**************************************\
     * |*************** DATA RECIVED 
     * ****************************************
	 * 
	 * ♦ Las variables que se inicializan aquí reciben los datos 
	 * de un archivo externo que utilizando el metodo include,
	 * incluye este archivo. 
	 * ♦ Tener en cuenta que las variables del archivo externo tiene
	 * que tener el mismo nombre, que las variables que se recepcionan 
	 * en este archivo.
	 * 
     */
		$email = $email;
		$nombre = $nombres;
		$numerodocumento = $dni;
		#$escuela = "ING. DE SISTEMAS";
		$celular = $celular;


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

	
	/**
     * /**************************************\
     * |*************** BODY OF THE MESSAGE
     * ****************************************
     */
	$fcha_ordi = "2022-1";
	$asunto = "ADMISIÓN UNAJMA - PROCESO DE PREINSCRIPCIÓN VIRTUAL PARA EL EXAMEN DE LA UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS ".$fcha_ordi . " (Primera Etata de Inscripción)";	
	$title_correo = "EXAMEN DE ADMISIÓN ".$fcha_ordi;

	$cuerpo = '
		<html>
			<head>
				<title>ADMISION UNAJMA</title>
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

							Correo electrónico: <strong>'.$email.'</strong>, <br>
							Celular: <strong>'.$celular.'</strong>
							<br>
							<br>
							<strong>USTED REALIZÓ SU PREINSCRIPCIÓN PARA EL EXAMEN DE ADMISIÓN DE LA UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS</strong>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li>
									En primer lugar queremos agredecerle a usted, <strong>' .$nombre .'</strong>,  por tomar la decición de seguir creciendo con nosotros. Tenemos muy en claro de todo el esfuerzo que hacen los postulantes para desear ingresar a nuestra querida casa de estudios, a raiz de ello nosotros nos comprometemos para darle el mejor servicio posible, siempre mejorando. Esperamos entonces, su poyo en el sentido de que cumpla con todos los requerimientos que exigimos para con el proceso de admisión: leer detenidamente los requerimientos, y estar atento siempre a su correo, celular y WhatsApp. 
									<br>
									Muchas gracias nuevamente, y le deseamos bastante suerte en este nuevo proceso 2022-1. 
									<br>
								</li>
								<li>
									Recuerde que todo el proceso de inscripción es <strong>completamente virtual</strong>. <strong>No es neceario que usted se acerque a la dirección de admisión</strong>. El sistema de admisión está disponible las 24/7 (todo el día, toda la semana). En el caso de que existan inconvenientes con su inscripción, <strong>nosotros nos estaremos contactando con usted</strong>, por lo que le pedimos encarecidamente estar atento a su correo y telefono celular.
								</li>
								<li>
									Recuerde que tenemos para usted una página de admisión exclusiva, donde puede encontrar los cronogramas, reglamentos, tutoriales, vacantes, temarios, escuelas profesionales, y todo lo que usted necesita para estar muy bien informado para el proceso de admisión.
									<br>
									<strong>página de admisión aquí:</strong> <a href="https://examen.admisionunajma.pe/index.php">https://examen.admisionunajma.pe/index.php</a> 
								</li>

								<li>
									Recuerde también que estaremos en contacto con usted a traves de este medio (como un canal oficial de comunicación); por lo que pronto recibirá las <strong>indicaciones</strong> correspondientes para <strong>completar su inscripción</strong>, y estar completamente dispuesto para el examen de admisión de la universidad. 
									<br>
								</li>
								<li>							
									<strong>
									*** (IMPORTANTE) RECUERDE QUE PARA EL DÍA DEL EXAMEN PRESENCIAL, DEBE PORTAR EL CARNE DE VACUNACIÓN COVID 19.
									</strong>
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

	
	/**
     * /**************************************\
     * |*************** MAIL SEND PHP
     * ****************************************
     */
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($email, utf8_decode($asunto), utf8_decode($cuerpo), $cabeceras);
	

?>