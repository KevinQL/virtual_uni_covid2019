<?php
	include_once "../config.php";
	include(GL_DIR_FS_APP.'funciones/admi_con.php');
	$cnzet = conectar();
	mysqli_query($cnzet,"SET CHARACTER SET utf8");
	mysqli_query($cnzet,"SET NAMES utf8");
	$proceso = $_POST["proceso"];
	$postulante = $_POST["postulante"];
	$tipo = $_POST["txtTipo"];
	$escuelamodalidad = $_POST["cboEscuelaModalidad"];
	$escuela=substr($escuelamodalidad,0,2);
	$modalidadadmision=substr($escuelamodalidad,2,2);
	$apellidopaterno = $_POST['txtApellidoPaterno'];
	$apellidomaterno = $_POST['txtApellidoMaterno'];
	$nombre = $_POST['txtNombre'];	
	$fechanacimiento = $_POST['txtFechaNacimiento'];
	$fechanacimiento = substr($fechanacimiento,6,4)."/".substr($fechanacimiento,3,2)."/".substr($fechanacimiento,0,2);
	$anioegreso = $_POST['txtAnioEgreso'];
	$tipocolegio = $_POST['cboTipoColegio'];

	$tipodocumento = $_POST['cboTipoDocumento'];
	$numerodocumento = $_POST['txtNumeroDocumento'];
	$sexo = $_POST['cboSexo'];
	
	
	#$vecesunj = $_POST['txtVecesUnj'];
	#$vecesotra = $_POST['txtVecesOtra'];
	#$tipopago = $_POST['cboTipoPago'];
	#$recibopago = $_POST['txtReciboPago'];
	#$tipoprocedencia = $_POST['cboTipoProcedencia'];
	
	$vecesunj = '0';
	$vecesotra = '0';
	$tipopago = '01';
	$recibopago = '';
	$tipoprocedencia = '01';
	$certificado = 0;
	
	$direccion = $_POST['txtDireccion'];
	#$certificado = $_POST['txtCertificado'];
	$email = $_POST['txtEmail'];
	$telefono = $_POST['txtTelefono'];
	$celular = $_POST['txtTelefono'];
	$departamento = $_POST['cboDepartamento'];
	$provincia = $_POST['cboProvincia'];
	$distrito = $_POST['cboDistrito'];
	$departamentocolegio = $_POST['cboDepartamentoColegio'];
	$provinciacolegio = $_POST['cboProvinciaColegio'];
	$distritocolegio = $_POST['cboDistritoColegio'];
	$departamentoprocedencia = $_POST['cboDepartamentoProcedencia'];
	$provinciaprocedencia = $_POST['cboProvinciaProcedencia'];
	$distritoprocedencia = $_POST['cboDistritoProcedencia'];
	$apoderado = $_POST['txtApoderado'];

	/**
	 * Si el proceso admite 2 carreras
	 * - en este caso el proceso ORDINARIO admite 2 carreras.
	 * - En el 2022-1 el proceso codigo 0030 es el proceso ORDINARIO
	 * - MODIFICAR ESTE CODIGO MÁS ADELANTE
	 */
	if($proceso == "0030"){

		$colegio = $_POST['txtColegio'] ."||". $_POST['txtSecondOption'];

	/**
	 * El proceso admite solo una carrera. 
	 */
	}else{

		$colegio = $_POST['txtColegio'];
	}

	#$moda = $_POST['cboModa'];
	#$pago1 = $_POST['txtPago1'];
	#$pago2 = $_POST['txtPago2'];
	#$turno = $_POST['cboTurno'];
	$moda = '01';
	$pago1 = 0;
	$pago2 = 0;
	$turno = 'M';
	#$_POST['txtCelular']
	
	$vsql = "call zyz_CAMantenedorPostulante (";	
	$vsql = $vsql . " '". $proceso ."',";
	$vsql = $vsql . " '". $postulante ."',";
	$vsql = $vsql . " '". $modalidadadmision ."',";
	$vsql = $vsql . " '". $escuela ."',";
	$vsql = $vsql . " '". $apellidopaterno ."',";
	$vsql = $vsql . " '". $apellidomaterno ."',";
	$vsql = $vsql . " '". $nombre ."',";
	$vsql = $vsql . " '". $fechanacimiento ."',";
	$vsql = $vsql . " '". $anioegreso ."',";
	$vsql = $vsql . " '". $tipocolegio ."',";
	$vsql = $vsql . " '". $tipodocumento ."',";
	$vsql = $vsql . " '". $numerodocumento ."',";
	$vsql = $vsql . " '". $sexo ."',";
	$vsql = $vsql . " ". $vecesunj .",";
	$vsql = $vsql . " ". $vecesotra .",";	
	$vsql = $vsql . " '". $tipopago ."',";
	$vsql = $vsql . " '". $recibopago ."',";
	$vsql = $vsql . " '". $tipoprocedencia ."',";
	$vsql = $vsql . " '". $direccion ."',";
	$vsql = $vsql . " '". $email ."',";
	$vsql = $vsql . " '". $telefono ."',";
	$vsql = $vsql . " '". $celular ."',";
	$vsql = $vsql . " 0,";
	$vsql = $vsql . " 0,";
	$vsql = $vsql . " 0,";
	$vsql = $vsql . " 1,";
	$vsql = $vsql . " ". $certificado .",";
	$vsql = $vsql . " '". $departamento ."',";
	$vsql = $vsql . " '". $provincia ."',";
	$vsql = $vsql . " '". $distrito ."',";
	$vsql = $vsql . " '". $colegio ."',";
	$vsql = $vsql . " '". $moda ."',";
	$vsql = $vsql . " ". $pago1 .",";
	$vsql = $vsql . " ". $pago2 .",";
	$vsql = $vsql . " '". $turno ."',";	
	$vsql = $vsql . " '". $departamentocolegio ."',";
	$vsql = $vsql . " '". $provinciacolegio ."',";
	$vsql = $vsql . " '". $distritocolegio ."',";
	$vsql = $vsql . " '". $departamentoprocedencia ."',";
	$vsql = $vsql . " '". $provinciaprocedencia ."',";
	$vsql = $vsql . " '". $distritoprocedencia ."',";
	$vsql = $vsql . " '". $apoderado ."',";
	$vsql = $vsql . " '". $tipo ."')";
	#echo $vsql;
	#exit;
	#$rs=mysqli_query($cnzet, strtoupper($vsql));
	$rs=mysqli_query($cnzet, $vsql);
	$nroerror=mysqli_errno($cnzet);
	$msg=messageError(mysqli_errno($cnzet));
	mysqli_close($cnzet);
	if($rs)
		{
			echo json_encode(array('error'=>0,'mensaje'=>'Se grabaron la informacion ingresada'));
		}
	else
		{
			echo json_encode(array('error'=>1,'titulo'=>'Ocurrio un error #'.$nroerror,'mensaje'=>$msg));
		}
?>