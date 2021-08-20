<?php 
	session_start();
	include('../funciones/admi_con.php');
	$cn = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");

	$usuario = trim($_POST['txtUsuario']);
	$password = trim($_POST['txtPassword']);
	$nivel = $_POST['cboNivel'];
	if (trim($usuario)=='' or trim($password)==''){
		header ("Location:index.php?nivel=".$nivel."&mensaje=El usuario o password son incorrectos.");
		exit;
	}

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
		{
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
	else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	$maquina = gethostname();


	$vsql = "call zoz_Val ('". $usuario ."', '". $password ."', '". $nivel ."', '". $ip ."', '". $maquina ."')";
	#echo $vsql;
	#exit;
	$rs = mysqli_query($cn,	$vsql);
	$num= mysqli_num_rows($rs); 

	if ($nivel == 'S')
	{
		if($num < 1)
		{
			//echo 'no paso';
			//exit;
			header ("Location:index.php?nivel=S&mensaje=El usuario o password son incorrectos.");
		}
		else
		{
			$rsjk = mysqli_fetch_row($rs);

			//print_r($rsjk);
			$_SESSION["persona"] = $rsjk[0];
			$_SESSION["usuario"] = $rsjk[1];
			$_SESSION["nombrecompleto"] = $rsjk[2];
			$_SESSION["sede"] = $rsjk[3];
			$_SESSION["estructura"] = $rsjk[4];
			$_SESSION["vescuela"] = $rsjk[4];
			$_SESSION["curricula"] = "00";
			$_SESSION["semestre"] = $rsjk[5];
			$_SESSION["vtipo"] = "S";
			$_SESSION["vnivel"] = $rsjk[6];
			$_SESSION["vcolacion"] = $rsjk[8];
			$_SESSION["vperfil"] = $rsjk[10];
			$_SESSION["moodle"] = $rsjk[11];
			$_SESSION["vserie"] = '';
			$_SESSION["vcaja"] = '';
			$_SESSION["vturno"] = 'M';
			$_SESSION["proceso"] = $rsjk[12];
			header ("Location:../menu.php/admi_principal.php?mensaje=Bienvenido al SIGA-Web.&nav=".base64_encode('Principal'));
		}
	}
	elseif ($nivel =='P') //postulante	
		{
			if($num < 1)
			{
				header ("Location:index.php?nivel=A&mensaje=El usuario o password son incorrectos.");
			} 
			else
			{	
				$rsjk = mysqli_fetch_row($rs);
				$_SESSION["persona"] = $rsjk[0];
				$_SESSION["usuario"] = $rsjk[1];
				$_SESSION["nombrecompleto"] = $rsjk[2];	
				$_SESSION["sede"] = $rsjk[3];
				$_SESSION["estructura"] = $rsjk[4];
				$_SESSION["vescuela"] = $rsjk[4];
				$_SESSION["curricula"] = $rsjk[7];	
				$_SESSION["semestre"] = $rsjk[5];
				$_SESSION["vtipo"] = "P";
				$_SESSION["vnivel"] = $rsjk[6];
				$_SESSION["vcolacion"] = $rsjk[8];
				$_SESSION["vperfil"] = $rsjk[10];
				$_SESSION["moodle"] = $rsjk[11];
				$_SESSION["vserie"] = '';	
				$_SESSION["vcaja"] = '';
				$_SESSION["vturno"] = 'M';
				$_SESSION["proceso"] = $rsjk[12];
				#echo 'hola';
				#exit;
				header ("Location:../menu.php/admi_inicio.php?nav=".base64_encode('Principal'));
			}			
		}
	elseif ($nivel =='D') //supervisor	
		{
			if($num < 1)
			{
				header ("Location:index.php?nivel=A&mensaje=El usuario o password son incorrectos.");
			} 
			else
			{	
				$rsjk = mysqli_fetch_row($rs);
				$_SESSION["persona"] = $rsjk[0];
				$_SESSION["usuario"] = $rsjk[1];
				$_SESSION["nombrecompleto"] = $rsjk[2];	
				$_SESSION["sede"] = $rsjk[3];
				$_SESSION["estructura"] = $rsjk[4];
				$_SESSION["vescuela"] = $rsjk[4];
				$_SESSION["curricula"] = $rsjk[7];	
				$_SESSION["semestre"] = $rsjk[5];
				$_SESSION["vtipo"] = "D";
				$_SESSION["vnivel"] = $rsjk[6];
				$_SESSION["vcolacion"] = $rsjk[8];
				$_SESSION["vperfil"] = $rsjk[10];
				$_SESSION["moodle"] = $rsjk[11];
				$_SESSION["vserie"] = '';	
				$_SESSION["vcaja"] = '';
				$_SESSION["vturno"] = 'M';
				$_SESSION["proceso"] = $rsjk[12];
				#echo 'hola';
				#exit;
				header ("Location:../menu.php/admi_inicio.php?nav=".base64_encode('Principal'));
			}			
		}					
?>