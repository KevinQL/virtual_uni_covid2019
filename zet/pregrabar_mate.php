<?php
	error_reporting(0);

	include_once('../funciones/admi_con.php');
	include_once('../funciones/admi_fun.php');

	$zet = '../';

	/*
	array(26) { 
		["txtDni"]=> string(8) "12312312" 
		["txtApellidoPaterno"]=> string(3) "oeo" 
		["txtApellidoMaterno"]=> string(7) "daksdak" 
		["txtNombres"]=> string(7) "dksafka" 
		["cboModalidad"]=> string(2) "14" 
		["cboEstructura"]=> string(2) "11" 
		["cboSexo"]=> string(1) "M" 
		["txtFechaNacimiento"]=> string(10) "2021-10-15" 
		["txtEmail"]=> string(19) "unajmakev@gmail.com" 
		["txtCelular"]=> string(8) "94566821" 
		["cboDepartamento"]=> string(2) "03" 
		["cboProvincia"]=> string(2) "02" 
		["cboDistrito"]=> string(2) "01" 
		["txtDireccion"]=> string(23) "av. los libertadores sn" 
		["txtApoderado"]=> string(5) "kevin" 
		["cboTipoColegio"]=> string(2) "01" 
		["cboDepartamentoColegio"]=> string(2) "03" 
		["cboProvinciaColegio"]=> string(2) "02" 
		["cboDistritoColegio"]=> string(2) "01" 
		["txtColegio"]=> string(4) "jeme" 
		["txtAnioEgreso"]=> string(4) "2020" 
		["cboDepartamentoProcedencia"]=> string(2) "03" 
		["cboProvinciaProcedencia"]=> string(2) "02" 
		["cboDistritoProcedencia"]=> string(2) "01" 
		["g-recaptcha-response"]=> string(0) "" 
		["h-captcha-response"]=> string(0) "" }
	*/
	
	if (!isset($_POST["txtDni"]))
		{
			header ("location: pre__inscripcion_mate2021.php");
		}
		
	$dni = $_POST["txtDni"];
	$apellidopaterno = $_POST["txtApellidoPaterno"];
	$apellidomaterno = $_POST["txtApellidoMaterno"];
	$nombres = $_POST["txtNombres"];
	$modalidad = "14"; #$_POST["cboModalidad"];
	$estructura = $_POST["cboEstructura"];
	$sexo = "M"; #$_POST["cboSexo"];
	$fechanacimiento = "2021-10-15"; #$_POST["txtFechaNacimiento"]; 
	$email = $_POST["txtEmail"];
	$celular = $_POST["txtCelular"];
	$departamento = "03"; #$_POST["cboDepartamento"];
	$provincia = "02"; #$_POST["cboProvincia"];
	$distrito = "01"; #$_POST["cboDistrito"];
	$direccion = ""; #$_POST["txtDireccion"];
	$apoderado = $_POST["txtApoderado"];
	$tipocolegio = $_POST["cboTipoColegio"];
	$departamentocolegio = $_POST["cboDepartamentoColegio"];
	$provinciacolegio = $_POST["cboProvinciaColegio"];
	$distritocolegio = $_POST["cboDistritoColegio"];
	$colegio = $_POST["txtColegio"];
	$anioegreso = "2021"; #$_POST["txtAnioEgreso"];
	$departamentoprocedencia = "03"; #$_POST["cboDepartamentoProcedencia"];
	$provinciaprocedencia = "02"; #$_POST["cboProvinciaProcedencia"];
	$distritoprocedencia = "01"; #$_POST["cboDistritoProcedencia"];
	
	$cn_foto = conectar();
	mysqli_query($cn_foto,"SET CHARACTER SET utf8");
	mysqli_query($cn_foto,"SET NAMES utf8");

	$proc="0027"; //PROCESO matematica (to change)


	$max_size = 12000000;

	$status_postulante = "";
	$destino_postulante = '../foto_postulante/'.$dni.'.jpg';
	$archivo_postulante = $_FILES['imgEst'];
	#################################################
	#################################################
	$status_dni = "";
	$destino_dni = '../foto_dni/'.$dni.'.jpg';
	$archivo_dni = $_FILES['imgDni'];
	#################################################
	#################################################	

	if ($archivo_postulante['size'] <= $max_size && $archivo_postulante['size'] > 0)
		{

			include('pre_fotopostulante.php');
			include('pre_fotodni.php');
			//$copied = true;
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
			echo 'Estimado concursante, en el transcurso de 72 horas como máximo se le enviará a su correo electrónico, las instrucciones correspondientes para completar su inscripción: ';
			echo '</span>';
			echo "<strong><h2>{$email}</h2></strong> (Tu correo personal es correcto?)";
			echo '<br> ';
			echo "<strong><h2>{$celular}</h2></strong> (Tu numero de celular es correcto?)";
			echo '<br> ';
			echo "<span>Si tus datos no están correctos, comunicate con la oficina de admisión.</span>";
			echo '<br> ';
			echo '<br>';
			echo '<span style="font-size:22px;">';
			echo 'En caso de no recibir las instrucciones dentro de las 72 horas, <br>';
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