<?php
	error_reporting(0);

	include_once('../funciones/admi_con.php');
	include_once('../funciones/admi_fun.php');

	$zet = '../';
	

	
	/**
	 * code of the captcha by KLEBXY
	 */
	$data_hc = [
		"secret" => "0x28899D6c004BBBB2489d955c4F2514cc94940a73",
		"response" => $_POST['h-captcha-response']
	];

	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data_hc));
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($verify);
	$responseData = json_decode($response);
	
	// var_dump($responseData);
	/** fin code captcha */


	if (!isset($_POST["txtDni"]))
		{
			header ("location: pre__inscripcion_cepre.php");
		}
		
	#$define('GL_DIR_FS_APPS', 'd:/xampp/htdocs');
	#echo 'hola';
	$dni = $_POST["txtDni"];
	$apellidopaterno = $_POST["txtApellidoPaterno"];
	$apellidomaterno = $_POST["txtApellidoMaterno"];
	$nombres = $_POST["txtNombres"];
	$modalidad = $_POST["cboModalidad"];
	$estructura = $_POST["cboEstructura"];
	$sexo = $_POST["cboSexo"];
	$fechanacimiento = $_POST["txtFechaNacimiento"]; 
	#echo $fechanacimiento;
	#$fechanacimiento = substr($fechanacimiento,6,4)."/".substr($fechanacimiento,3,2)."/".substr($fechanacimiento,0,2);
	$email = $_POST["txtEmail"];
	$celular = $_POST["txtCelular"];
	$departamento = $_POST["cboDepartamento"];
	$provincia = $_POST["cboProvincia"];
	$distrito = $_POST["cboDistrito"];
	$direccion = $_POST["txtDireccion"];
	$apoderado = $_POST["txtApoderado"];
	$tipocolegio = $_POST["cboTipoColegio"];
	$departamentocolegio = $_POST["cboDepartamentoColegio"];
	$provinciacolegio = $_POST["cboProvinciaColegio"];
	$distritocolegio = $_POST["cboDistritoColegio"];
	$colegio = $_POST["txtColegio"];
	$anioegreso = $_POST["txtAnioEgreso"];
	$departamentoprocedencia = $_POST["cboDepartamentoProcedencia"];
	$provinciaprocedencia = $_POST["cboProvinciaProcedencia"];
	$distritoprocedencia = $_POST["cboDistritoProcedencia"];

	#echo $vsql;
	#exit;

	
	$cn_foto = conectar();
	mysqli_query($cn_foto,"SET CHARACTER SET utf8");
	mysqli_query($cn_foto,"SET NAMES utf8");
	
	$max_size = 12000000;
	#################################################
	#################################################
	#define('GL_DIR_FS_APPS', 'd:/xampp/htdocs');
	#################################################
	#################################################

	//Division de postulantes en grupos en funcion de las carreras. MODALIDAD CEPRE
	//PROCESO ORDINARIO GRUPO 1 // admi(01), ambiental(05) y agro(04)
	//PROCESO ORDINARIO GRUPO 2 // sistemas(06), contabilidad(02) y educacion(03)

	$proc="0029"; // its one group in the new proccess 2021-2

	// $status_voucher = ""; 
	// $destino_voucher = '../foto_voucher/'.$proc.$dni.'.jpg';
	// $archivo_voucher = $_FILES['imgInp'];
	#################################################
	#################################################
	$status_postulante = "";
	$destino_postulante = '../foto_postulante/'.$dni.'.jpg';
	$archivo_postulante = $_FILES['imgEst'];
	#define('GL_DIR_FS_APPS', 'd:/xampp/htdocs');
	#################################################
	#################################################
	

	#################################################
	#################################################
	$status_dni = "";
	$destino_dni = '../foto_dni/'.$dni.'.jpg';
	$archivo_dni = $_FILES['imgDni'];
	#define('GL_DIR_FS_APPS', 'd:/xampp/htdocs');
	#################################################
	#################################################	
	

	#echo 'oiga';
	if ($archivo_postulante['size'] <= $max_size && $archivo_postulante['size'] > 0)
		{
			#include_once('pre_fotovoucher.php');
			//include_once('pre_fotovoucher_1.php');
			include('pre_fotopostulante.php');
			include('pre_fotodni.php');
			#echo 'hola 1';
			if ($copied) 
				{
				####
					#echo 'hola 2';
						$vsql = "call zyz_Admi_GrabarPre (";
						$vsql = $vsql . " '".$proc."',";	
						$vsql = $vsql . " '". $dni ."',";
						$vsql = $vsql . " '". strtoupper(trim($apellidopaterno)) ."',";
						$vsql = $vsql . " '". strtoupper(trim($apellidomaterno)) ."',";
						$vsql = $vsql . " '". strtoupper(trim($nombres)) ."',";
						$vsql = $vsql . " '". $modalidad ."',";
						$vsql = $vsql . " '". $estructura ."',";
						$vsql = $vsql . " '". $sexo ."',";
						$vsql = $vsql . " '". $fechanacimiento ."',";
						$vsql = $vsql . " '". $email ."',";
						$vsql = $vsql . " '". $celular ."',";
						$vsql = $vsql . " '". $departamento ."',";
						$vsql = $vsql . " '". $provincia ."',";
						$vsql = $vsql . " '". $distrito ."',";
						$vsql = $vsql . " '". $direccion ."',";
						$vsql = $vsql . " '". $apoderado ."',";
						$vsql = $vsql . " '". $tipocolegio ."',";
						$vsql = $vsql . " '". $departamentocolegio ."',";
						$vsql = $vsql . " '". $provinciacolegio ."',";
						$vsql = $vsql . " '". $distritocolegio ."',";
						$vsql = $vsql . " '". $colegio ."',";
						$vsql = $vsql . " '". $anioegreso ."',";
						$vsql = $vsql . " '". $departamentoprocedencia ."',";
						$vsql = $vsql . " '". $provinciaprocedencia ."',";
						$vsql = $vsql . " '". $distritoprocedencia ."',";
						$vsql = $vsql . " '','',0,0,";
						$vsql = $vsql . " 'N')";
	
					#echo 'hola 3';
					#echo $vsql;
					#echo $vsql;
					
					#exit;
					mysqli_query($cn_foto, $vsql) or die (mysql_error());
					#########
					$msg = 'Se subio el archivo correctamente.';
					json_encode(array('error'=>0,'mensaje'=>'Se grabo la informacion ingresada'));
					$pasa = 1;
					#echo 
				} 
			else 
				{
					$msg = 'Error en el formato de las imagenes.';
					json_encode(array('error'=>1,'titulo'=>'Ocurrio un error #','mensaje'=>$msg));
					#echo 'holaz'; 
					$pasa = 0;
				}
		}
		else 
			{
				$msg = 'Tamano maximo es 2mb!';
				json_encode(array('error'=>1,'titulo'=>'Ocurrio un error #','mensaje'=>$msg));
				#echo 'hola error';
				$pasa = 0;
			}
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS</title>
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous">
    </script>
</head>
<body background="../images/fondo.jpg">
<?php
	echo '<table width="100%">';
			echo '<tr>';
			echo '<td align="center">';
			echo '<img src="../images/logo.png" alt="Logo" width="100"/>';
			echo '<strong>UNIVERSIDAD NACIONAL JOS&Eacute; MAR&Iacute;A ARGUEDAS</strong>';
			echo '</td>';
			echo '</tr>';
	echo '</table>';
	echo '<br>';
	if ($pasa==1)
		{
			 echo '<table width="100%">';
                    echo '<tr>';
                    	echo '<td align="center">';
                        	echo '<strong>REGISTRO CORRECTO.</strong>';
                        echo '</td>';
                    echo '</tr>';
             echo '</table>';
			#echo '</div>';
			echo '<br>';
			echo '<br>';
			echo '<table width="100%" border="0">';
			echo '<tr>';
				echo '<td width="30%">&nbsp;';       	        
				echo '</td>';
				echo '<td align="center">';
					echo '<span style="font-size:22px;">';
					echo 'Estimado postulante, en el transcurso de 72 horas como máximo se le enviará a su correo electrónico que registró en el formulario, las instrucciones correspondientes para completar su inscripción: ';
					echo '</span>';
					echo "<strong><h2>{$email}</h2></strong> (Tu correo personal es correcto?)";
					echo '<br> ';
					echo "<strong><h2>{$celular}</h2></strong> (Tu numero de celular es correcto?)";
					echo '<br> ';
					echo "<span>Si tus datos no están correctos, comunicate con la oficina de admisión.</span>";
					echo '<br> ';
					echo '<br>';
					echo '<span style="font-size:22px;">';
					echo 'En caso de no recibir las instrucciones, <br>';
					echo 'comuníquese con los siguientes números: ';
					echo '<br>';
					echo '<strong>991828881, 916331094, 985951660</strong>';
					echo '<p></br>';
					echo '<p><a href="https://youtu.be/N7yxUvfPAL4?t=403" target="_blank">Cómo completar mi inscripcion? (video instructivo)<i class="fa fa-forward"></i></a> </p>';
					echo '<p><a href="https://examen.admisionunajma.pe/pagina_temario.php" target="_blank">Ver temario ejemplo.<i class="fa fa-forward"></i></a> </p>';
					echo '<p><a href="https://examen.admisionunajma.pe/">Regresar a la página de admisión.<i class="fa fa-forward"></i></a> </p>';
					echo '</span>';
				echo '</td>';
				echo '<td width="30%">&nbsp; ';       	
				echo '</td>';
			echo '</tr>';
			echo '</table>';
		}
	else
		{
			echo '<table width="100%">';
                    echo '<tr>';
                    	echo '<td align="center" align="center">';
                        	echo '<strong>REGISTRO INCORRECTO</strong>';
                        echo '</td>';
                    echo '</tr>';
					 echo '<tr>';
                    	echo '<td align="center" align="center">';
                        	echo $msg;
                        echo '</td>';
                    echo '</tr>';
             echo '</table>';
		}
?>                   
</body>
</html>