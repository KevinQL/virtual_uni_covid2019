<?php	
   ########################
	#######################
	$titulo3 = 'DECLARACI&Oacute;N JURADA';		
	$vd30 = '	
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
					$titulo3.
					'</span>
				</td>
			</tr>
		</table>';		

	$vd31 = "
	<div style='text-align: left; font-size:9px;'>
	<table width='750' border='0'>
		<tr>
			<td width='2%'>&nbsp;
				
			</td>
			<td align='center' style='line-height:20pt;'>
				<strong>
					DECLARACION JURADA	
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
                Declaro bajo juramento, que cumplo con los requisitos establecidos en el reglamento de admisión para el proceso remoto {$DJreglamento}, aprobado con resolucion {$DJresolucion}, por lo que me comprometo a regularizar los documentos requeridos. 
                <br>
                Deseo mencionar también, que por motivo del Estado de Emergencia Nacional frente a la infección por Coronavirus (COVID-19), no fue posible obtener los documentos originales requeridos y proceder a la inscripción correcta del proceso de admisión, por la modalidad <strong>$nombremodalidad</strong>, por lo que recurro a esta declaración jurada en honor a la verdad.
                <br>
                Dejo constancia que lo declarado es un compromiso y puede ser objeto de comprobación en cualquier circunstancia, teniendo conocimiento de las sanciones administrativas y penales a las que me viera sujeto de constatarse alguna falsedad, por lo cual firmo y estampo mi impresión dactilar, en señal de conformidad de todos los datos de la presente declaración.
			</td>
		</tr>
	</table>
	";
?>