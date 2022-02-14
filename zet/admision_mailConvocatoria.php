<?php
    /**
     * /**************************************\ 
     * |*************** SEND MAIL EVERYBODY THE DATABASE ***
     * *****************************************
     * date create file: 10-02-2021
     * date last changes: 10-02-2022 
     * 
     */



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
    * |*************** 
    * ****************************************
    */

        // datos de configuración para el envío de correos masivos.
        /**
         * Existen caso donde se desea enviar correos electrónicos a los postulantes de un 
         * proceso en particular. 
         * O también se desea eviar el correo a todos los postulantes registrados.
         * 
         */


        //realizar la consulta a la base de datos de los correos. los correos no deben repetirse. 
        /**
         * Se tiene 3854 registros disponibles. Aunque se ha intentado filtrar correos incorrectos,
         * es muy posible que existan muchos correos invalidos. Mas adelante se puede trabajar en una 
         * función con registro de patrones para mejorar el filtro de los correos validos. 
         */

		include('../config.php');
		include(GL_DIR_FS_APP.'funciones/admi_con.php');
		include(GL_DIR_FS_APP.'funciones/funciones_admision.php');

		$cn_email = conectar();
		mysqli_query($cn_email,"SET CHARACTER SET utf8");
		mysqli_query($cn_email,"SET NAMES utf8");
		
		error_reporting(E_ALL);
		ini_set('display_errors', '1');

		$consultSQL = '';    
		$vsql = "SELECT DISTINCT email, numerodocumento, nombre
        FROM adm_proceso_postulante 
        WHERE email like '%.%' and email like '%@%' and numerodocumento <> ''
        ORDER BY email ASC";

		$rs = mysqli_query($cn_email, $vsql);	
		
		while($row = mysqli_fetch_array($rs)){
			//code

			$email = trim($row['email']);
			$nombre = trim($row['nombre']);

			//codificar el cuerpo del correo electrónico, invitando al nuevo proceso de admisión. 
			/**
			 * INVITACIÓN
			 */

			/**
			 * /**************************************\
			 * |*************** BODY OF THE MESSAGE
			 * ****************************************
			 */
			// $email = "unajmakev@gmail.com";
			// $nombre = "kevin";

			$fcha_ordi = "2022-1";
			$asunto = "ADMISIÓN UNAJMA - INVITACIÓN PROCESO ".$fcha_ordi." UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS ";	
			$title_correo = "PROCESO DE ADMISIÓN ".$fcha_ordi;

			$cuerpo = '
			<html>
				<head>
					<title>ADMISION UNAJMA</title>
					<style>
						.misection{
							background: #34495e;
							padding: 2% 10% 2%;
							text-align: center;
							font-family: sans-serif;
						}
					</style>
				</head>
				<body>
					<table>
						<tr>
							<td align="center">
								<strong>
								INVITACIÓN UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS
								</strong>
								<br>
							</td>
						</tr>
						<tr>
							<td>
								<br>
								<br>
								Con el saludo correspondiente para Usted Sr.(Srta.) <strong style="text-transform: uppercase">' .$nombre .'</strong>.					
								<br>
							</td>
						</tr>
						<tr align="justify">
							<td>
								<ul>
									<li>
										La Universidad Nacional José María Arguedas (<span style="color:#f69955">UNA</span><span style="color:#173050">JMA</span>) tiene el agrado de invitar a los estudiantes, padres de familia, y público en general al nuevo <strong>proceso de admisión 2022-1</strong>, programadas para las fechas en sus distintas modalidades. 
										<br>
										Examen <strong>EXTRAORDINARIO</strong>: <strong style="color:darkorange">26 de Marzo.</strong>
										<br>
										Examen <strong>ORDINARIO</strong>: <strong style="color:midnightblue">08 y 09 de Abril.</strong>
										<br>
										El proceso de selección tiene el objetivo de buscar a los <strong>mejores</strong> estudiantes del Perú, para desarrollar los programas académicos legibles en nuestra casa superior de estudios, con grados altamente calificados por la <strong>SUNEDU</strong>.
										<br>
										<u><strong>ESTUDIA LAS SIGUIENTES CARRERAS:</strong></u>
										<br>
										<small>(Click en las carreras para más detalles)</small>
										<br>
										<strong>
										<a href="https://examen.admisionunajma.pe/pagina_epiam.php">INGENIERÍA AMBIENTAL</a>, 
										<a href="https://examen.admisionunajma.pe/pagina_epis.php" style="color:#871f2c">INGENIERÍA DE SISTEMAS</a>, e 
										<a href="https://examen.admisionunajma.pe/pagina_epia.php" style="color:#f6bf00">INGENIERÍA AGROINDUSTRIAL</a>
										<br>
										<a href="https://examen.admisionunajma.pe/pagina_epae.php" style="color:#ef7a2d">ADMINISTRACIÓN DE EMPRESAS</a>, 
										<a href="https://examen.admisionunajma.pe/pagina_epc.php" style="color:#872e37">CONTABILIDAD</a>, y 
										<a href="https://examen.admisionunajma.pe/pagina_epepi.php" style="color:#00a859">EDUCACIÓN PRIMARIA INTERCULTURAL</a>
										</strong>
										<br>
										Cabe mencionar que las <strong>inscripciones</strong> ya <strong>ESTÁN DISPONIBLES</strong> a través de la <strong>PÁGINA WEB DE ADMISIÓN</strong>. La inscripción es completamente <strong>virtual</strong>, por lo que no hay necesidad de acercarse físicamente a las instalaciones de la oficina de admisión de la universidad. Inscríbete desde cualquier parte del país.  
									</li>
								</ul>
							</td>
						</tr>	
						<tr align="left">
							<td>
								<u><strong>MAS DETALLES AQUÍ</u></strong>
								<br>
								<strong>página de admisión aquí:</strong> 
								<a href="https://examen.admisionunajma.pe/index.php">https://examen.admisionunajma.pe/</a> 
								<br>
								<strong>Página de facebook de admisión:</strong> 
								<a href="https://www.facebook.com/admision.unajma">https://www.facebook.com/admision.unajma</a>  
								<br>
								<strong>Requisitos para el examen ORDINARIO:</strong> 
								<a href="https://examen.admisionunajma.pe/pagina_ordinario.php">https://examen.admisionunajma.pe/pagina_ordinario.php</a>
								<br>
								<strong>Requisitos para el examen EXTRAORDINARIO:</strong> 
								<a href="https://examen.admisionunajma.pe/pagina_extraordinario.php">https://examen.admisionunajma.pe/pagina_extraordinario.php</a>
								<br>
								<strong>Página de inscripción virtual:</strong> 
								<a href="https://examen.admisionunajma.pe/index.php#admision2">https://examen.admisionunajma.pe/index.php#admision2</a>
								<br>  
							</td>		
						</tr>		
					</table>
					<div class="misection">
						<img style="padding: 0; display: block; text-align: center; margin: auto" src="https://scontent.faqp2-1.fna.fbcdn.net/v/t39.30808-6/s720x720/272443164_1370739656695792_7894889668999678376_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=730e14&_nc_eui2=AeGXnTrtKrg87CrWpBgVws5CpXTiyGm9yPOldOLIab3I89krfpNHBVPQb2q7geP-OB7c_4E4FAaMHW9O3146i018&_nc_ohc=zA0Rx6DDwusAX-6ChM5&_nc_ht=scontent.faqp2-1.fna&oh=00_AT8gVMaTQA9Q6U90cwYJbO2pZSkkmMWar1bQr8qNemLjwg&oe=620BE104" width="80%">
					</div>
					<table>
						<tr>	
							<td>
								Cualquier consulta, a los numeros de whatsapp disponibles: 
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
			$respmail = mail($email, utf8_decode($asunto), utf8_decode($cuerpo), $cabeceras);

			echo "<br>--> ";
			var_dump($respmail);
			echo " <--<br>";
			if($respmail){
				echo ":) mensaje enviado a " . $nombre . ", correo: " . $email;
			}else{
				echo ":( el mensaje NO se envió a " . $nombre . ", correo: " . $email;
			}

		}

        // enviar con un temporizador los correos electrónicos. 

        // almacenar en una tabla todos los correos a los que se les envió el correo. 


  