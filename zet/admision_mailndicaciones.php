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
		 * 
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
		$vsql = "SELECT DISTINCT email, numerodocumento, nombre, proceso
        FROM adm_proceso_postulante 
        WHERE email like '%.%' and email like '%@%' and numerodocumento <> '' AND proceso LIKE '0031'
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
			$asunto = "ADMISIÓN UNAJMA - INDICACIONES EXTRAORDINARIO PROCESO ".$fcha_ordi." UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS ";	
			$title_correo = "PROCESO DE ADMISIÓN ".$fcha_ordi;

			$cuerpo = '



			<html>
				<head>
					<title>ADMISION UNAJMA</title>
					<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


					<style>

						.misection-antiguo{
							background: #34495e;
							padding: 2% 10% 2%;
							text-align: center;
							font-family: sans-serif;
						}


						* {
							margin: 0;
							padding: 0;
							box-sizing: border-box;
						}
						body {
							font-family: "Roboto", sans-serif;
							font-size: 16px;
							font-weight: 300;
							color: #888;
							background-color:rgba(230, 225, 225, 0.5);
							line-height: 30px;
							text-align: center;
						}
						.contenedor{
							width: 80%;
							min-height:auto;
							text-align: center;
							margin: 0 auto;
							background: #ececec;
							border-top: 3px solid #E64A19;
						}
						.btnlink{
							padding:15px 30px;
							text-align:center;
							background-color:#cecece;
							color: crimson !important;
							font-weight: 600;
							text-decoration: blue;
						}
						.btnlink:hover{
							color: #fff !important;
						}
						.imgBanner{
							width:100%;
							margin-left: auto;
							margin-right: auto;
							display: block;
							padding:0px;
						}
						.misection{
							color: #34495e;
							margin: 4% 10% 2%;
							text-align: center;
							font-family: sans-serif;
						}
						.mt-5{
							margin-top:50px;
						}
						.mb-5{
							margin-bottom:50px;
						}


					</style>

					
				</head>
				<body>
					<div class="contenedor">
						<img class="imgBanner" src="https://scontent.faqp2-2.fna.fbcdn.net/v/t39.30808-6/274468145_1309180436231412_3164496279077827344_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=e3f864&_nc_eui2=AeEpeP4T57BfrhRexl68ONOlNhgJ4y6dFmY2GAnjLp0WZkknbNfC36jqd7FTh1KowF0qKhllwzHGZOmnU-vpwIrh&_nc_ohc=DfZI7i6cypIAX_f8psf&_nc_ht=scontent.faqp2-2.fna&oh=00_AT_XuzXDUw9J5Ee10idU_p8AH9Dmezsh-2mUCVNkE-4oEw&oe=6243D795">
							
						<p>&nbsp;</p>
						<p>&nbsp;</p>

						<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
						<tr>
							<td style="padding: 0">
								<img style="padding: 0; display: block" src="https://scontent.faqp2-3.fna.fbcdn.net/v/t39.30808-6/276306387_1330347877448001_1036829007006559167_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=730e14&_nc_eui2=AeHs37JzNOvC78Jg2PGujq0BDDS9qs1sxGkMNL2qzWzEaTYDgQZQOrtN6QL2V8t-kPEVkHIUBQzLtAtlrDbimeEU&_nc_ohc=RgK6lwmyAgkAX_TYaMs&_nc_ht=scontent.faqp2-3.fna&oh=00_AT8LHuif5_-og1zPC27W6EzGSFOP8DWPdL7VlP5JVDj7PQ&oe=6243769B" width="100%">
							</td>
						</tr>
						
						<tr>
							<td style="background-color: #ffffff;">
								<div class="misection">
									<h2 style="color: red; margin: 0 0 7px">Hola, '.$nombre.'</h2>

									<p style="margin: 2px; font-size: 18px">
										ESTIMADO POSTULANTE, SE LES COMUNICA QUE EL EXAMEN EXTRAORDINARIO SE DESARROLLARÁ EN LA SEDE CCOYAHUACHO (CIUDAD UNIVERSITARIA) EL DÍA SÁBADO 26 DE MARZO.
									</p>

									<div style="text-align: left">
										<br>
										Todas las escuelas profesionales brindarán su evaluación en el GRAS SINTÉTICO.

										<br>
										<br>

										<p style="font-size: 18px">
										El horario de ingreso será a partir de las 07:45 a.m. hasta las 09:00 a.m.
										</p>
									
										<br>
									
										PARA LO CUAL DEBEN DE PORTAR OBLIGATORIAMENTE LOS SIGUIENTES DOCUMENTOS:
									
										<br>
										<br>

										<b>* DNI. </b> <br>
										
										<b>* CONSTANCIA DE INSCRIPCIÓN.</b> <br>
										
										<b>* CARNET DE VACUNACIÓN DOSIS COMPLETA.</b> <br>

										<br>
									
										Y CUMPLIR ESTRICTAMENTE LAS INDICACIONES DEL DOCUMENTO INSTRUCTIVO QUE APARECE EN SU CORREO. 
									
										<br>
									
										ASIMISMO, LOS POSTULANTES DEBEN DE CONTAR CON SU EQUIPO DE PROTECCIÓN PERSONAL: 
										
										<br>
										<br>
									
										<b>* DOBLE MASCARILLA QUIRÚRGICA O UNA MASCARILLA KN95.</b> <br>
									
										<b>* PROTECTOR FACIAL (NO OBLIGATORIO).</b> <br>
									
										<b>* ATOMIZADOR CON ALCOHOL GEL O ALCOHOL LÍQUIDO.</b> <br>
									
										<br>
										<br>

										NOTA: Se les recomienda no ir con capuchas, poleras o bufandas, en caso de las señoritas asistir con el cabello recogido y caso de los varones con el cabello recortado.
									
										<br>
										<br>

										Evitar traer Lápiz, borrador y tajador dado que será otorgado por la universidad.

										<br>
										<br>
									
										UNA VEZ INGRESADO A LA CIUDAD UNIVERSITARIA UBICARSE EN LOS AMBIENTES ASIGNADOS DONDE SE DESARROLLARÁ EL EXAMEN.
									
										<br>
										<br>

										--- UBICACIÓN GPS SEDE CCOYAHUACHO ---
									
										<br>
										
										<a href="https://goo.gl/maps/MLPN5gVrzzNNhEcj6">Link ubicación google Maps</a>
										
									
										<br>
										<br>

										NO ACUDIR CON FAMILIARES, AMIGOS, ETC. ESTO CON EL FIN DE EVITAR AGLOMERACIONES Y CUALQUIER TIPO DE RIESGO DE CONTAGIO DE LA COVID-19.
									
										<br>
									
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td style="background-color: #ffffff;">
							<div class="misection">
								<h2 style="color: red; margin: 0 0 7px">TAMBIÉN SE LES ADJUNTA LO SIGUIENTE</h2>
							</div>


							
							<div class="mb-5 misection">  
								<p>&nbsp;</p>
								<a href="https://drive.google.com/file/d/1P2Tv2DlUA4_QBQ2pco_6YEr2XoCQLgqk/view?usp=sharing" class="btnlink">LISTA POSTULANTES</a>
							</div>

							<div class="mb-5 misection">  
								<p>&nbsp;</p>
								<a href="https://drive.google.com/file/d/1PouhDdQppbcaKxsdzFHeGzNctHyVz5zo/view?usp=sharing" class="btnlink">INSTRUCCIONES EXAMEN</a>
							</div>

							<div class="mb-5 misection">  
								<p>&nbsp;</p>
								<a href="https://drive.google.com/file/d/1tNIuiGDj0QcOp-b8G0Y_LTG45uMlbteG/view?usp=sharing" class="btnlink">CROQUIS EVALUACIÓN</a>
							</div>

							</td>
						</tr>
						<tr>
							<td style="padding: 0;">
								<img style="padding: 0; display: block" src="https://1.bp.blogspot.com/-fVJ83K-mxAU/XNHyX0l9UYI/AAAAAAABPOs/izz9nHvS0psyxkIHMF-F7EGi-kAePr30ACLcBGAs/s1600/universidad-nacional-jose-maria-arguedas-logo.jpg" width="100%">
							</td>
						</tr>
					</table>
				</div>
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


  