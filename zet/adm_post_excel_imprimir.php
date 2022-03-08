<?php
	session_start();
	if (!isset($_SESSION["usuario"]))
	{
		header("location:noautorizado.php");
	}			
	require_once('sessiones.php');
	include('../funciones/admi_con.php');
	include('../funciones/unajma_admision.php');
	
	set_time_limit(0);
	error_reporting(1);

	$cn = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");

	$proceso = $_GET['codigo'];

	header('Content-type: application/vnd.ms-excel;');
	header("Content-Disposition: attachment; filename=postulantes-".$proceso.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	$vsql = "call zyz_CAAdmisionReporte ('". $proceso . "', '','', '10')";
	// $vsql = "SELECT * FROM adm_proceso_postulante ap WHERE ap.proceso LIKE '0030'";

	$rs = mysqli_query($cn, $vsql);
	
	// echo "pruebaa...";
	$carrarr_carrearer = ["00"=>'ERROR EN LA CARRERA!!',
                        "01"=>'ADMINISTRACION DE EMPRESAS',
                        "02"=>'CONTABILIDAD',
                        "03"=>'EDUCACION PRIMARIA INTERCULTURAL',
                        "04"=>'INGENIERIA AGROINDUSTRIAL',
                        "05"=>'INGENIERIA AMBIENTAL',
                        "06"=>'INGENIERIA DE SISTEMAS'
					];
	
	#mysqli_close($cn);

	/**
	 * En el procedimiento, en la parte principal del bloque consulta mysql, 
	 * se limitó la cantidad de espacio a la cantidad original que tenía la columna anioegreso, osea (4). 
	 * Desde este punto, se cambió la longitud del espació a 10 por el motivo del cambio de la segunda carrera.
	 * 
	 */
	if (!$rs) {
		printf("Error message: %s\n", mysqli_error($cn));
		die();
	}	

	/***
	 * Evalua que la segunda carrera existe, y por lo tanto se deben imprimir las columnas correspondientes 
	 * en el reporte excell
	 * - Se asume que por defecto no existe la segunda carrera
	 */
	$eval_second_carrear = false;

	/**
	 * Si el proceso es el que admite la segunda carrera como opción
	 */
	if($proceso == "0030"){
		/**
		 * Evalua que la carrera opcional está habilitado para el proceso correspondiente
		 */
		$eval_second_carrear = true;
	}
	
	// while ($rsjk= mysqli_fetch_row($rs)){
	// 	var_dump($rsjk);
	// 	break;
	// }
	// echo "fin bucle";
	// die();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $vcolacion?>" />
<title>POSTULANTES</title>
</head>
<body leftmargin=0 topmargin=0 bgcolor="#ffffff" marginheight=0 marginwidth=0>
<?php
	include('../funciones/admi_fun.php');
	$nombreproceso = nombreproceso($proceso);
	#echo $vsql;
?>
<table>
	<tr>
		<td align="center" colspan="21">
			<strong><?php echo $nombreproceso;?></strong>
        </td>
	</tr>
</table>
<table border="1">
  <tr>
    <td><strong>Nro.</strong></td>
    <td align="center"><strong>C&oacute;digo</strong></td>
    <td align="center"><strong>Apellido Paterno</strong></td>
    <td align="center"><strong>Apellido Materno</strong></td>    
    <td align="center"> <strong>Nombre</strong></td>
    <td align="center"><strong>Escuela</strong></td>

	<?php
		/**
		 * La segunda carrera existe, por lo tanto pintar la 
		 * columna titulo correspondiente para la carrera.
		 */
		if($eval_second_carrear){
	?>
		<td align="center"><strong>Escuela option 2</strong></td>
	<?php
		}
	?>

    <td align="center"><strong>Modalidad</strong></td>
    <td align="center"><strong>Fecha Nacimiento</strong></td>
	<td align="center"><strong>Tipo Documento</strong></td>
    <td align="center"><strong>Numero Documento</strong></td>
    <td align="center"><strong>Sexo</strong></td>
    <td align="center"><strong>Direcci&oacute;n</strong></td>
    <td align="center"><strong>Tel&eacute;fono</strong></td>
    <td align="center"><strong>Email</strong></td>
    <td align="center"><strong>Veces UNAJMA</strong></td>
    <td align="center"><strong>Veces Otra</strong></td>
    <td align="center"><strong>Procedencia</strong></td>
    <td align="center"><strong>Tipo Colegio</strong></td>
    <td align="center"><strong>Tipo Pago</strong></td>
    <td align="center"><strong>Recibo Pago</strong></td>
    <td align="center"><strong>A&ntilde;o egreso</strong></td>
    <td align="center"><strong>Colegio</strong></td>
    <td align="center"><strong>Ubigeo</strong></td>
  </tr>
	<?php
	$contador = 0;
	while ($rsjk= mysqli_fetch_row($rs))
	{ 
		/**
		 * Evaluamos que la carrera no existe. Esta vez dependiendo del resultado de la consulta 
		 * a la base de datos del sistema
		 */
		$eval_second_carrear = false;

		/**
		 * Obtenemos el dato que corresponde a anioegreso de la base de datos. 
		 * Esta colomna podría contener el anioegreso más el código de la segunda carrea opcional
		 */
		$anioegreso = $rsjk[19];

		/**
		 * - Evaluamos que el dato contenga los dos valores necesarios, para comvertirlos en 
		 * un array de dos dimensiones
		 */
		if(count(explode("||", $anioegreso)) == 2){

			/**
			 * - Asignamos los valores del anio egreso y codigo carrera opt 2, para su 
			 * asignación en la vista
			 */
			list($anio_egreso, $code_carrer2) = explode("||", $anioegreso);

			/**
			 * Establecemos que la segunda carrera existe, por ende se imprimen los datos
			 * de la segunda carrera en los registros correspondientes para cada ciclo. 
			 */
			$eval_second_carrear = true;

		}else{

			/**
			 * Como no existe segunda carrera, entonces tomamos el dato como el anio egreso
			 * del postulante. Tal como se hacía normalmente.
			 */
			$anio_egreso = $anioegreso;
		}
		
		$contador = $contador + 1;
		echo '<tr>';
			echo '<td align="right">';
				echo $contador;
			echo '</td>';
			echo '<td align="left">';
				echo '&nbsp;'.generar_codigo_u($rsjk[0]);
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[1];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[2];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[3];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[4];
			echo '</td>';
			
			/**
			 * Si el proceso admite la segunda carrera como opción, entonces imprimir carrera
			 * Codigo segunda carrera se le pasa al array para que traiga la cadena
			 */
			if($eval_second_carrear){
				echo '<td align="left">';
					echo $carrarr_carrearer[$code_carrer2];
				echo '</td>';
			}
			
			echo '<td align="left">';
				echo $rsjk[5];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[6];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[7];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[8];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[9];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[10];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[11];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[12];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[13];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[14];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[15];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[16];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[17];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[18];
			echo '</td>';
			echo '<td align="left">';
				echo $anio_egreso;
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[24];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[25];
			echo '</td>';
		echo '</tr>';		 
  	}
	?>  	
</table>
</body>
</html>