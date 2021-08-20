<?php	
    ########################
	#######################
	$titulo = 'FICHA DE INSCRIPCION DEL POSTULANTE';
	$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','','','','','','1900-01-01','','','','','',0,0,'','','','','','','',0,0,0,0,0,'00','00','00','','',0,0,'','1','2','3','4','5','6','7','L')";
	#echo $vsql;
	$rs = mysqli_query($cnzet,	$vsql);	
	$numeroregistros = mysqli_num_rows($rs); 
	if ($numeroregistros > 0)
		{
			$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			$dj = $row["dj"];
			$dni = $row["numerodocumento"];
			$domicilio = $row["direccion"];
			$nombredepartamento = $row["nombredepartamento"];
			$nombreprovincia = $row["nombreprovincia"];
			$nombredistrito = $row["nombredistrito"];
			$estructura = $row["estructura"];	
			$modalidadadmision = $row["modalidadadmision"];
			$anioegreso = $row["anioegreso"];
			$tipocolegio = $row["tipocolegio"];
			$colegio = $row["colegio"];
			$apellidopaterno = $row["apellidopaterno"];
			$apellidomaterno = $row["apellidomaterno"];
			$nombre = $row["nombre"];
			$email = $row["email"];
			$celular = $row["celular"];	
			$colegio = $row["colegio"];
			$tipocolegio = $row["descripciontipocolegio"];
			$sexo = $row["descripcionsexo"];
			$fechanacimiento = $row["fechanacimiento"];
			$fecharegistro = $row["fecharegistro"];		
			mysqli_data_seek($rs,0);
		}
		
		$apoderado='';
		$conex=conectar();
		mysqli_query($conex,"SET CHARACTER SET utf8");
		mysqli_query($conex,"SET NAMES utf8");	
		$query = "SELECT apoderado FROM adm_proceso_postulante WHERE numerodocumento = '$dni'";
		$res = mysqli_query($conex, $query);	
		$registros = mysqli_num_rows($res); 
		if ($registros > 0) {
			# code...
			$row2 = mysqli_fetch_array($res, MYSQLI_ASSOC);
			$apoderado = $row2['apoderado'];
			mysqli_data_seek($res,0);
		}

	if ($email=='')
		{
			$email='(x)';	
		}	
	$altura = 40;	
	$dia = substr($fecharegistro,0,2);
	$mes = substr($fecharegistro,3,2);
	$anio = substr($fecharegistro,6,4);
	$nombrealumno = $apellidopaterno . ' ' . $apellidomaterno . ' ' . $nombre;
	$nombreescuela = nombreescuela($estructura);
	$nombremodalidad = nombremodalidadadmision($modalidadadmision);
	$numerodocumento = $dni;
	#echo $dni;
	$fotex = mostrarfoto_postulante_pfd($dni);	
	$fotito = mostrarfoto_ing_firma_pfd($dni);
	$foto_firma_apoderado = mostrarfoto_ing_firma_pfd($dni.'AP');
	#echo $fotex;
	
	$nombremes = nombremes($mes);
	$fecha = 'Andahuaylas, '.$dia.' de '.$nombremes.' del '.$anio;
		
	//ENCABEZADO DE LAS DECLARACIONES Y/O CONSTANCIAS
	$vc = '	
		<table width="750">
			<tr>
				<td width="85%" align="right">
					<span style="font-size:12px;">CÓDIGO DEL POSTULANTE: &nbsp;&nbsp;</span>
				</td>
				<td>
					<table border="1" width="100%">
						<tr>
							<td align="center" style="border-left:thin; border-right:thin; border-top:thin; border-bottom:thin;">'.                    
								$dni.
							'</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>	
		<table width="750">
			<tr>
				<td align="center">
					<span style="font-size:17px; font-weight:bold">'.
					$nombreproceso.
					'</span>
				</td>
			</tr>
			<tr>
				<td align="center">
					<span style="font-size:17px; font-weight:bold">'.
					$titulo.
					'</span>
				</td>
			</tr>
		</table>';		

	// DATOS DEL POSTULANTE DE LA PRIMERA PAGINA DE LAS DJs
	$v2 = '
		<table width="750" border="0" cellpadding="3" cellspacing="3">
			<tr height="'.$altura.'">
			    <td align="left" width="35%">
        			<strong>CARRERA PROFESIONAL A LA QUE POSTULA:</strong>
        		</td>
        		<td>'.
        			$nombreescuela.
        		'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>MODALIDAD:</sstrong>
				</td>
				<td>'.
					$nombremodalidad.		
				'</td>
    		</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>APELLIDO PATERNO:</strong>
				</td>
				<td>'.
        			$apellidopaterno.
        		'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>APELLIDO MATERNO:</strong>
				</td>
				<td>'.
					$apellidomaterno.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>NOMBRE:</strong>
				</td>
				<td>'.
					$nombre.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>FECHA NACIMIENTO:</strong>
				</td>
				<td>'.
					$fechanacimiento.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>NRO. DNI:</strong>
				</td>
				<td>'.
					$dni.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>SEXO:</strong>
				</td>
				<td>'.
					$sexo.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>DOMICILIO:</strong>
				</td>
				<td>'.
					$domicilio.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>REGION:</strong>
				</td>
				<td>'.
					$nombredepartamento.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>PROVINCIA:</strong>
				</td>
				<td>'.
					$nombreprovincia.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>DISTRITO:</strong>
				</td>
				<td>'.
					$nombredistrito.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>CELULAR:</strong>
				</td>
				<td>'.
					$celular.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>EMAIL:</strong>
				</td>
				<td>'.
					$email.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>TIPO COLEGIO:</strong>
				</td>
				<td>'.
					$tipocolegio.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>COLEGIO:</strong>
				</td>
				<td>'.
					$colegio.
				'</td>
			</tr>
			<tr height="'.$altura.'">
				<td align="left">
					<strong>A&Ntilde;O DE EGRESO:</strong>
				</td>
				<td>'.
					$anioegreso.
				'</td>
			</tr>
		</table>';
		
	//PIE DE PAGINA DE LAS DECLARACIONES JURADAS. MUESTRA LA FECHA Y LA FIRMA CON LOS DATOS DEL POSTULANTE
	$v3 = '
		<br>
		<table width="750">
			<tr>
				<td align="right">'.
					$fecha.
				'</td>
			</tr>	
		</table>
		<br>
		<br>
		<table width="750" border="0">
			<tr>
				<td width="10%">
					.
				</td>
				<td valign="bottom" align="center">'.
					$fotito.
				'</td>
				<td width="10%">
					.
				</td>				
			</tr>
			<tr>
				<td>
					.
				</td>
				<td style="border-top-style:dotted" align="center">'.                 
                        $nombrealumno.'
                        <br>Dni Nro:'.
						$dni.
                '</td>
                <td>
					.                   	
                </td>
           </tr>
		</table>
	';




	

	//ESTRUCTURA Y DATOS DE LA CONSTANCIA DE INSCRIPCION DE DOBLE SECCION
	// $nombreConstancia = "Dr. JOHN PETER AGUIRRE LANDA";
	// $dniConstancia = '10002395';
	$nombreConstancia = "Mgtr. EDWIN DANIEL FELIX BENITES";
	$dniConstancia = '06673433';
	$fotitoConstancia = mostrarfoto_ing_firma_pfd($dniConstancia);

	$v4 = '
		<br>
		<table width="750">
			<tr>
				<td align="right">'.
					$fecha.
				'</td>
			</tr>	
		</table>
		<br>
		<table width="750" border="0">
			<tr>
				<td width="10%">
					.
				</td>
				<td valign="bottom" align="center">'.
					$fotitoConstancia.
				'</td>
				<td valign="bottom" align="center">'.
					$fotito.
				'</td>
				<td width="10%">
					.
				</td>				
			</tr>
			<tr>
				<td>
					.
				</td>
				<td style="border-top-style:dotted" align="center">
					-------------------------------------------------------------
						<br>'.                 
						$nombreConstancia.'
						<br>DNI Nro:'.
						$dniConstancia.
				'</td>
				<td style="border-top-style:dotted" align="center">
					-------------------------------------------------------------
						<br>'.                 
						$nombrealumno.'
						<br>DNI Nro:'.
						$numerodocumento.
				'</td>
				<td>
					.                   	
				</td>
			</tr>
		</table>
		<br>
		<p style="text-align:center;">
		..............................................................................................................................................................................................................................................................
		</p>
		<div style="text-align: center; font-weight: bold;">
			<table width="750" border="0">
				<tr>
					<td width="15%" align="center">
						<img src="../images/logo_ingreso.jpg" width="90" />
					</td>
					<td align="center">
						<span style="font-size:18px; font-weight:bold">
							UNIVERSIDAD NACIONAL 
							<br>
							JOSÉ MARÍA ARGUEDAS</span>
						<br>
						<br>
						<span style="font-size:18px; font-weight:bold">
							OFICINA CENTRAL DE ADMISIÓN</span>
						<br>
					</td>
					<td width="20%" align="center">'.
						$fotex.
					'</td>
				</tr>
			</table>
		</div>
		<table width="750">
			<tr>
				<td align="center">
					<span style="font-size:17px; font-weight:bold">'.
						$nombreproceso.
					'</span>
				</td>
			</tr>
			<tr>
				<td align="center">
					<span style="font-size:17px; font-weight:bold">
						CONSTANCIA DE INSCRIPCIÓN
					</span>
				</td>
			</tr>
		</table>
		<br>	
		<br>
		<table width="750">
			<tr height="40">
			    <td align="left" width="35%">
        			<strong>NOMBRE POSTULANTE:</strong>
        		</td>
        		<td style="text-transform: uppercase;">'.
        			$nombrealumno.
        		'</td>
			</tr>
			<tr height="40">
			    <td align="left" width="35%">
        			<strong>DNI:</strong>
        		</td>
        		<td style="text-transform: uppercase;">'.
        			$numerodocumento.
        		'</td>
			</tr>
			<tr height="40">
			    <td align="left" width="35%">
        			<strong>CARRERA PROFESIONAL</strong>
        		</td>
        		<td style="text-transform: uppercase;">'.
        			$nombreescuela.
        		'</td>
			</tr>
			<tr height="40">
				<td align="left">
					<strong>MODALIDAD:</sstrong>
				</td>
				<td style="text-transform: uppercase;">'.
				$nombremodalidad.
				'</td>
			</tr>
			<tr height="40">
				<td align="left">
					<strong>CÓDIGO:</sstrong>
				</td>
				<td style="text-transform: uppercase;">'.
				generar_codigo_u($_SESSION["persona"])
				.
				'</td>
			</tr>
		</table>
		<br>
		<table width="750">
			<tr>
				<td align="right">'.
					$fecha.
				'</td>
			</tr>	
		</table>
		
		
	';

	//HTML decopia --------------------------- PORSIACASO
	$html_copy='
	<table width="750" border="0">
	<tr>
		<td width="10%">
			.
		</td>
		<td valign="bottom" align="center">'.
			$fotitoConstancia.
		'</td>
		<td width="10%">
			.
		</td>				
	</tr>
	<tr>
		<td>
			.
		</td>
		<td style="border-top-style:dotted" align="center">'.                 
				$nombreConstancia.'
				<br>Dni Nro:'.
				$dniConstancia.
		'</td>
		<td>
			.                   	
		</td>
   </tr>
</table>
	';

	//html firmapostulante
	$html_firma ='
		<table width="750" border="0">
			<tr>
				<td width="10%">
					.
				</td>
				<td valign="bottom" align="center">
				-------------------------------------------------------------
				</td>
				<td width="10%">
					.
				</td>				
			</tr>
			<tr>
				<td>
					.
				</td>
				<td style="border-top-style:dotted" align="center">'.                 
						$nombrealumno.'
						<br>DNI Nro:'.
						$numerodocumento.
				'</td>
				<td>
					.                   	
				</td>
			</tr>
		</table>
	';
	######################
	#######################
?>