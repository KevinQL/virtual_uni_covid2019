<?php	
   ########################
	#######################
	$titulo6 = 'DECLARACI&Oacute;N JURADA';		
	$vd60 = '	
		<table width="750">
			<tr>
				<td width="85%" align="right">
					<span style="font-size:12px;">C&Oacute;DIGO DEL POSTULANTE: &nbsp;&nbsp;</span>
				</td>
				<td>
					<table border="1" width="100%">
						<tr>
							<td align="center" style="border-left:thin; border-right:thin; border-top:thin; border-bottom:thin;">'.                    
								$numerodocumento.
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
					$titulo6.
					'</span>
				</td>
			</tr>
		</table>';		

	$vd61 = "
	<div style='text-align: left; font-size:9px;'>
	<table width='750' border='0'>
		<tr>
			<td width='2%'>&nbsp;
				
			</td>
			<td align='center' style='line-height:20pt;'>
				<strong>
					DECLARACIÓN JURADA DE ACEPTACION DE CONDICIONES
				</strong>
			</td>
			<td width='2%'>&nbsp;
				
			</td>
		</tr>
	</table>
	<table width='750'>
		<tr>
			<td width='3%'>
			</td>
			<td align='justify'>
				Yo, <strong>$nombrealumno</strong>, identificado con documento de identidad Nro <strong>$dni</strong> con domicilio en $domicilio del distrito $nombredistrito, provincia $nombreprovincia de la regi&oacute;n $nombredepartamento; postulante por la modalidad <strong>$nombremodalidad</strong> a la Escuela Profesional de <strong>$nombreescuela</strong> –  Proceso de Admisión {$DJproceso}.
                <br>
                <br>
                Declaro bajo juramento , que conozco y acepto el contenido del Reglamento del Proceso de Admisión {$DJreglamento}, Prospecto de Admisión y los lineamientos para el desarrollo del proceso de admisión, en el marco de emergencia sanitaria y medidas de prevención de contagio y propagación del COVID-19; así como las faltas, sanciones, riesgos y requisitos mínimos para participar en el examen virtual. Así mismo, durante el desarrollo del Examen de Admisión Virtual, me comprometo a cumplir con las instrucciones del supervisor o fiscalizador de la sesión virtual.
			</td>
		</tr>
	</table>
	";


	//FIRMAS EN DOS SECCIONES ALUMNO Y APODERADO

	$vd61 .= "

	<table width='750'>
	<tr>
		<td align='right'>
			$fecha
		</td>
	</tr>	
</table>
<br>
<table width='750' border='0'>
	<tr>
		<td width='10%'>
			.
		</td>
		<td valign='bottom' align='center'>
			$foto_firma_apoderado
		</td>
		<td valign='bottom' align='center'>
			$fotito
		</td>
		<td width='10%'>
			.
		</td>				
	</tr>
	<tr>
		<td>
			.
		</td>
		<td style='border-top-style:dotted' align='center'>
			-------------------------------------------------------------
				<br>                 
				$apoderado
				<br>
				APODERADO
		</td>
		<td style='border-top-style:dotted' align='center'>
			-------------------------------------------------------------
				<br>                
				$nombrealumno
				<br>DNI Nro:
				$numerodocumento
		</td>
		<td>
			.                   	
		</td>
	</tr>
</table>
	";
?>