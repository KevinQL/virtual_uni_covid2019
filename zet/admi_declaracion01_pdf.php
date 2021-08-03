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
					DECLARACION JURADA
DE NO POSEER ANTECEDENTES PENALES POR LA COMISI&Oacute;N DE LOS DELITOS DE TERRORISMO O APOLOG&Iacute;A AL TERRORISMO, DE VIOLACI&Oacute;N A LA LIBERTAD SEXUAL O DE TR&Aacute;FICO IL&Iacute;CITO DE DROGAS  
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
					Yo, <strong>{$nombrealumno}</strong>, de nacionalidad peruana, identificado con documento de identidad Nro <strong>$dni</strong> con domicilio en $domicilio del distrito $nombredistrito, provincia $nombreprovincia de la regi&oacute;n $nombredepartamento postulante a la carrera profesional de <strong>$nombreescuela</strong>, en la modalidad <strong>$nombremodalidad</strong> en el Proceso de admisi&oacute;n <strong>{$DJproceso}</strong> de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas de Andahuaylas; en pleno uso de mis facultades f&iacute;sico mentales.
					<br>
					<br>                
					DECLARO BAJO JURAMENTO, no haber sido condenado por el delito de terrorismo o apolog&iacute;a al terrorismo en cualquiera de sus modalidades, que impida mi postulaci&oacute;n a la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas, seg&uacute;n el Art. 98° de la Ley Universitaria N° 30220, ni tampoco por los delitos de violaci&oacute;n a la libertad sexual o de tr&aacute;fico il&iacute;cito de drogas, seg&uacute;n Ley N° 29988.
                <br>
Doy fe que esta declaraci&oacute;n corresponde a la verdad, por lo que me someto a las responsabilidades a que hubiere lugar en caso de consignar informaci&oacute;n falsa.
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