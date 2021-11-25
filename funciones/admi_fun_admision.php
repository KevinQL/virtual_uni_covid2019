<?php
function mostrarfoto_pregunta($pregunta)
	{
		#$ruta = '/home2/gaguilar/sisacad.unat.edu.pe/';
		$ruta = GL_DIR_FS_APP;
		#echo $ruta;
		#GL_DIR_FS_APP = 'http://sisacad.unat.edu.pe/';
		
	#$file = trim(GL_DIR_FS_APP).'/imagesalumno/'.$numerodocumento.".jpg";
	#$filezet = trim(GL_DIR_FS_APP).'/imagesalumno/'.$numerodocumento.".JPG";
	#$file1 = trim(GL_DIR_WS_HTTP_APP).'/imagesalumno/'.$numerodocumento.".jpg";
	#$filezet1 = trim(GL_DIR_WS_HTTP_APP).'/imagesalumno/'.$numerodocumento.".JPG";	
	#$file2 = trim(GL_DIR_WS_HTTP_APP).'/imagesalumno/nodisponible.jpg';
	$file = trim($ruta).'foto_pregunta/'.$pregunta.".jpg";
	$filezet = trim($ruta).'foto_pregunta/'.$pregunta.".JPG";

	$file1 = trim($ruta).'foto_pregunta/'.$pregunta.".jpg";
	$filezet1 = trim($ruta).'foto_pregunta/'.$pregunta.".JPG";	

	#echo GL_DIR_FS_APP;	
	if (file_exists($file))
		{
			#echo 'hola';
			$ruta1 = '../';
			$filezet1 = $ruta1.'foto_pregunta/'.$pregunta.".jpg";
			echo '<img src="'.$filezet1.'" border="0">';
			#echo 'hola 1';
			#echo 'si 1';
		}
	elseif (file_exists($filezet))
		{
			#echo 'hola1';
			$ruta1 = '../';
			$filezet2 = $ruta1.'foto_pregunta/'.$pregunta.".JPG";
			echo '<img src="'.$filezet.'" border="0">';
		}		
	}

function mostrarfoto_postulante($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_postulante/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_postulante/'.$numerodocumento.".JPG";
		
		#echo GL_DIR_FS_APP;
		#echo $ruta;
		#echo $file;
		#echo '<br>';
		#echo $file1;
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".jpg";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}
		elseif (file_exists($file1))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".JPG";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}		
		else
			{
				echo 'SIN FOTO';	
			}
	}
	
function mostrarfoto_postulante_mini($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_postulante/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_postulante/'.$numerodocumento.".JPG";
		
		#echo GL_DIR_FS_APP;
		#echo $ruta;
		#echo $file;
		#echo '<br>';
		#echo $file1;
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".jpg";
				echo '<img src="'.$filezet.'" border="0" width="120">';
			}
		elseif (file_exists($filezet))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".JPG";
				echo '<img src="'.$filezet.'" border="0" width="120">';
			}		
		else
			{
				echo 'SIN FOTO';	
			}
	}	
	
function mostrarfoto_dni($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_dni/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_dni/'.$numerodocumento.".JPG";
		
		#echo GL_DIR_FS_APP;
		#echo $ruta;
		#echo $file;
		#echo '<br>';
		#echo $file1;
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_dni/'.$numerodocumento.".jpg";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}
		elseif (file_exists($file1))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_dni/'.$numerodocumento.".JPG";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}		
		else
			{
				echo 'SIN FOTO';	
			}
	}	

function mostrarfoto_postulante_carne($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_postulante/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_postulante/'.$numerodocumento.".JPG";
		
		#echo GL_DIR_FS_APP;
		#echo $ruta;
		#echo $file;
		#echo '<br>';
		#echo $file1;
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".jpg";
				echo '<img src="'.$filezet.'" border="0" height="120">';
			}
		elseif (file_exists($file1))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".JPG";
				echo '<img src="'.$filezet.'" border="0" height="120">';
			}		
		else
			{
				echo 'SIN FOTO';	
			}
	}

function mostrarfoto_postulante_pfd($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_postulante/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_postulante/'.$numerodocumento.".JPG";
		
		#echo GL_DIR_FS_APP;
		#echo $ruta;
		#echo $file;
		#echo '<br>';
		#echo $file1;
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".jpg";
				$fotex = '<img src="'.$filezet.'" border="0" height="140">';
			}
		elseif (file_exists($file1))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_postulante/'.$numerodocumento.".JPG";
				$fotex =  '<img src="'.$filezet.'" border="0" height="140">';
			}		
		else
			{
				#$fotex =  'SIN FOTO';
				$fotex =  '';	
			}
		return $fotex;
	}

	//Para OCA
	function mostrarfoto_firma_existe($codigo){

		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_ing_firma/'.$codigo.".jpg";
		$file1 = trim($ruta).'foto_ing_firma/'.$codigo.".JPG";
	
		if (file_exists($file))
			{
				$mostrarfoto_firma_existe=1;
			}
		elseif (file_exists($file1))
			{
				$mostrarfoto_firma_existe=1;
			}		
		else
			{
				$mostrarfoto_firma_existe=0;	
			}
		return $mostrarfoto_firma_existe;
	}

function mostrarfoto_voucher_existe($codigo)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_voucher/'.$codigo.".jpg";
		$file1 = trim($ruta).'foto_voucher/'.$codigo.".JPG";
	
		if (file_exists($file))
			{
				$mostrarfoto_voucher_existe=1;
			}
		elseif (file_exists($file1))
			{
				$mostrarfoto_voucher_existe=1;
			}		
		else
			{
				$mostrarfoto_voucher_existe=0;	
			}
		return $mostrarfoto_voucher_existe;
	}
	
function mostrarfoto_voucher($numerodocumento)
	{
		#echo 'hola';
		#echo $numerodocumento;
		$proce = substr($numerodocumento,0,4);
		$dni_zet = substr($numerodocumento,4,8);

		/*
		if ($proce=='0006' or $proce=='0007')
			{
				$busca1 = $proce.$dni_zet;
				$busca2 = '0005'.$dni_zet;
				$ruta = GL_DIR_FS_APP;
				$file = trim($ruta).'foto_voucher/'.$busca1.".jpg";
				$file1 = trim($ruta).'foto_voucher/'.$busca2.".jpg";
				
				#echo 'hola';
	
				if (file_exists($file))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$busca1.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}
				elseif (file_exists($file1))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$busca2.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}		
				else
					{
						echo 'SIN FOTO';
						#echo '';	
					}
			}
			
		if ($proce=='0009' or $proce=='0008')
			{
				$busca1 = $proce.$dni_zet;
				$busca2 = '0004'.$dni_zet;
				$ruta = GL_DIR_FS_APP;
				$file = trim($ruta).'foto_voucher/'.$busca1.".jpg";
				$file1 = trim($ruta).'foto_voucher/'.$busca2.".jpg";
	
				if (file_exists($file))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$busca1.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}
				elseif (file_exists($file1))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$busca2.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}	
				else
					{
						echo 'SIN FOTO';	
					}
			}
			
		if ($proce=='0010' or $proce=='0011')
			{
				$busca1 = $proce.$dni_zet;
				$busca2 = '0002'.$dni_zet;
				$ruta = GL_DIR_FS_APP;
				$file = trim($ruta).'foto_voucher/'.$busca1.".jpg";
				$file1 = trim($ruta).'foto_voucher/'.$busca2.".jpg";
	
				if (file_exists($file))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$busca1.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}
				elseif (file_exists($file1))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$busca2.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}	
				else
					{
						echo 'SIN FOTO';	
					}
			}
		/*
		else
			{
		*/
				$busca1 = $proce.$dni_zet;
				$ruta = GL_DIR_FS_APP;
				$file = trim($ruta).'foto_voucher/'.$busca1.".jpg";
				$file1 = trim($ruta).'foto_voucher/'.$busca1.".JPG";
				#echo $busca1;
			
				if (file_exists($file))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$numerodocumento.".jpg";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}
				elseif (file_exists($file1))
					{
						$ruta1='../';
						$filezet = $ruta1.'foto_voucher/'.$numerodocumento.".JPG";
						echo '<img src="'.$filezet.'" border="0" width="300">';
					}		
				else
					{
						echo '';	
					}
			#}
			
		
		
	
		#echo $file;
		#echo $file1;
		#echo $file2;
		
		
	}
	
function mostrarfoto_certificado($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_certificado/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_certificado/'.$numerodocumento.".JPG";
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_certificado/'.$numerodocumento.".jpg";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}
		elseif (file_exists($file1))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_certificado/'.$numerodocumento.".JPG";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}		
		else
			{
				echo 'SIN FOTO';	
			}
	}	
	
function mostrarfoto_ing_firma($dni)
	{
		$ruta = GL_DIR_FS_APP;

		$file = trim($ruta).'foto_ing_firma/'.$dni.".jpg";
		$filezet = trim($ruta).'foto_ing_firma/'.$dni.".JPG";
	
		$file1 = trim($ruta).'foto_ing_firma/'.$dni.".jpg";
		$filezet1 = trim($ruta).'foto_ing_firma/'.$dni.".JPG";	
	
		#echo GL_DIR_FS_APP;	
		if (file_exists($file))
			{
				#echo 'hola';
				$ruta1 = '../';
				$filezet1 = $ruta1.'foto_ing_firma/'.$dni.".jpg";
				echo '<img src="'.$filezet1.'" border="0" width="300">';
				#echo 'hola 1';
				#echo 'si 1';
			}
		elseif (file_exists($filezet))
			{
				#echo 'hola1';
				$ruta1 = '../';
				$filezet2 = $ruta1.'foto_ing_firma/'.$dni.".JPG";
				echo '<img src="'.$filezet.'" border="0" width="300">';
			}	
		else
			{
				echo 'SIN FOTO';	
			}	
	}
	
function mostrarfoto_ing_firma_pfd($numerodocumento)
	{
		$ruta = GL_DIR_FS_APP;
		$file = trim($ruta).'foto_ing_firma/'.$numerodocumento.".jpg";
		$file1 = trim($ruta).'foto_ing_firma/'.$numerodocumento.".JPG";
		
		#echo GL_DIR_FS_APP;
		#echo $ruta;
		#echo $file;
		#echo '<br>';
		#echo $file1;
	
		if (file_exists($file))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_ing_firma/'.$numerodocumento.".jpg";
				$firmazet = '<img src="'.$filezet.'" border="0" height="140">';
			}
		elseif (file_exists($file1))
			{
				$ruta1='../';
				$filezet = $ruta1.'foto_ing_firma/'.$numerodocumento.".JPG";
				$firmazet =  '<img src="'.$filezet.'" border="0" height="140">';
			}		
		else
			{
				#$fotex =  'SIN FOTO';
				$firmazet =  '';	
			}
		return $firmazet;
	}
	
function validarconforme($proceso,$postulante)
{
	$cnze= conectar();
	$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "','". $postulante . "','1','2','3','4','5','1900-01-01','7','8','9','10','1',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','Q')";	
	#echo $vsql;
	$rs = mysqli_query($cnze,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$validarconforme= $rsjk[0];
	return $validarconforme;
}



/*
function enviar_email_examen_usuario($proceso, $postulante, $tipo)
	{
		$cn_email = conectar();
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		
		$asunto = "UNAJMA -  EXAMEN VIRTUAL 2020-I";	
		
		$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','1','2','3','4','5','1900-01-01','1','2','3','4','5',0,0,'1','2','3','4','5','6','7',0,0,0,0,0,'1','2','3','4','5',0,0,'','K')";
		
		echo $vsql;
		#exit;
		$nombre = $rsjk[1];
		$escuela = $rsjk[2];
		$numerodocumento = $rsjk[3];
		$clave = $rsjk[4];
		$email = $rsjk[5];
		$celular = $rsjk[6]; 
		$email = 'juliozet@hotmail.com';
			
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
							UNIVERSIDAD NACIONAL AUT&Oacute;NOMA DE TAYACAJA
							</strong>
							<br>
						</td>
					</tr>
				  	<tr>
						<td>
							Estimado(a) postulante: <strong>' .$nombre .'</strong>, DNI:<strong> ' .$numerodocumento . '</strong>, correo electr&oacute;nico:<strong> '.$email.'</strong>:
							</strong>
						</td>
					</tr>
					<tr>
					  <td>
							Para ingresar al examen virtual, copie el link en el Navegador Mozilla Firefox:
							<br>
							<br>
							<a href="https://unatadmision.org/admision/zet/">https://unatadmision.org/admision/zet/</a>
							<br>
							<br>
							Usuario: <strong>: '.$numerodocumento.'</strong><br><br>
							Contrase&ntilde;a: <strong>'.$clave.'</strong>
							<br>
							<br>
					  </td>
					</tr>					
				</table>
				<br>				
				<table>
					<tr>
					  <td>
							<br>
							Cualquier consulta, comunicarse con nosotros al n&uacute;mero: <strong>979332963</strong>						
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
							<strong>Direcci&oacute;n de Admisi&oacute;n</strong>
					  </td>
					</tr>
				</table>
				</body>
				</html>
				';
	
				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
				#echo $cuerpo;
				#echo '<br>';
				mail($email, $asunto, $cuerpo, $cabeceras);
				#echo 'hola';
				#exit;
				$enviar_email_examen='1';
		return $enviar_email_examen;
		mysqli_close($cn_email);
	}	

*/
function generar_siga_zet($procesogeneral) {
	$cn = conectar();
	$zet='';
	$vsql = "call zyz_CAExportarSiga ('A')";
	$rs = mysqli_query($cn, $vsql);
	$contador = 0;
while ($rsjk= mysqli_fetch_row($rs))
{ 
	$contador = $contador + 1;
	if ($contador==1)
		{
			$zet=$rsjk[0];
		}
	else
		{
			#$zet=$zet.PHP_EOL;
			$zet=$zet."\r\n";
			$zet=$zet.$rsjk[0];
		}
}
$ar=fopen("../exportar/siga.txt","w") or die("Problemas en la creacion");
fputs($ar,$zet);
}
?>