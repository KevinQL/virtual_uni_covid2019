<?php	
   ########################
	#######################
	#echo 'hola';
	$direccion = '';
	$titulo2 = 'DECLARACIÓN JURADA';		
	$vd20 = '	
		<table width="750">
			<tr>
				<td width="85%" align="right">
					<span style="font-size:12px;">CÓDIGO DEL POSTULANTE: &nbsp;&nbsp;</span>
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
					$titulo2.
					'</span>
				</td>
			</tr>
		</table>';		

	$vd21 = "
		<div style='text-align: left; font-size:9px;'>
		<table width='750' border='0'>
			<tr>
				<td width='2%'>&nbsp;
					
				</td>
				<td align='center' style='line-height:20pt;'>
					<strong>
					-
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
					Yo, 
					<strong>{$nombrealumno}</strong>, 
					de nacionalidad peruana, identificado con documento de identidad Nro 
					<strong>$dni</strong> 
					con domicilio en 
					$domicilio del distrito 
					$nombredistrito, provincia 
					$nombreprovincia de la regi&oacute;n 
					$nombredepartamento postulante a la carrera profesional de 
					<strong>$nombreescuela</strong>, en la modalidad 
					<strong>$nombremodalidad</strong> en el Proceso de admisi&oacute;n 
					<strong>{$DJproceso}</strong> de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas de Andahuaylas; en pleno uso de mis facultades f&iacute;sico mentales.
					<br>
					<br>                
				</td>
			</tr>
			<tr>
				<td width='3%'>
				</td>
				<td align='center' style='line-height:20pt;'>
					<strong>
					DECLARO BAJO JURAMENTO
					</strong>
				</td>
			</tr>
			<tr>
				<td width='3%'>
				</td>
				<td align='justify'>
					<br>
					<strong>1.</strong>	Que, no haber sido dado de baja por la Universidad Nacional José María Arguedas según Art. 102 de la Ley Universitaria. 
					<br>
					<strong>2.</strong>	Que, no haber sido sancionado por la Universidad Nacional José María Arguedas por ningún motivo. 
					<br>
					<strong>3.</strong>	No haber sido condenado por el delito de terrorismo o apología al terrorismo en cualquiera de sus modalidades, que impida mi postulación a la Universidad Nacional José María Arguedas, según el Art. 98° y 102 de la Ley Universitaria N° 30220; ni tampoco por los delitos de violación a la libertad sexual o de tráfico ilícito de drogas, según Ley N° 29988.  
					<br>
					<strong>4.</strong>	Que, cumplo con los requisitos establecidos en el reglamento de admisión para el proceso 2022-I, aprobado con resolución N° 0363-2021-CO-UNAJMA, por lo que me comprometo a presentar todos los documentos requeridos.
					<br>
					<strong>5.</strong>	Que, conozco y acepto el contenido del Reglamento del Proceso de Admisión 2022-I, Prospecto de Admisión y los lineamientos para el desarrollo del proceso de admisión, en el marco de emergencia sanitaria y medidas de prevención de contagio y propagación del COVID-19, según lo determine el MINSA; así como las faltas, sanciones, riesgos y requisitos mínimos para participar en el examen presencial. Asimismo, durante el desarrollo del Examen de Admisión, me comprometo a cumplir con las instrucciones del supervisor o fiscalizador
					<br>
					Doy fe que esta declaración corresponde a la verdad, por lo que me someto a las responsabilidades a que hubiere lugar en caso de consignar información falsa.
				</td>
			</tr>

		</table>
		";
	


// $nombrealumno
// $dni
// $direccion.
// $nombredistrito.
// $nombreprovincia.
// $nombredepartamento.
// $nombreescuela.
// $nombremodalidad.
// $nombreproceso.

?>