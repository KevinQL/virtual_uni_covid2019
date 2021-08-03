<?php	
   ########################
	#######################
	$titulo8 = 'DECLARACIÓN JURADA';		
	$vd80 = '	
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
					$titulo8.
					'</span>
				</td>
			</tr>
		</table>';		

	$vd81 = '
		<div style="text-align: left; font-size:9px;">
		<table width="750" border="0">
			<tr>
				<td width="2%">&nbsp;
					
				</td>
				<td align="center" style="line-height:20pt;">
					<strong> PARA REGULARIZAR DOCUMENTOS REQUERIDOS. </strong>
				</td>
				<td width="2%">&nbsp;
					
				</td>
			</tr>
		</table>
		<table width="750">
			<tr>
				<td width="3%">
				</td>
				<td align="justify">
					Yo, <strong>'.
					$nombrealumno.
					'</strong>, identificado con DNI Nro. <strong>'.
					$dni.
					'</strong>, con domicilio en  <strong>'.
					$domicilio.
					'</strong>, distrito <strong>'.
					$nombredistrito.
					'</strong>, y provincia <strong>'.
					$nombreprovincia.
					'</strong>, de la región <strong>'.
					$nombredepartamento.
					'</strong> postulante por la modalidad <strong>'.
					$nombremodalidad.
					'</strong> a la escuela Profesional de <strong>'.
					$nombreescuela.
					'</strong>, Proceso de admisión  <strong>'.
					$DJproceso
					.'</strong>.
					<br>
					<br>
					<br>
					Declaro bajo juramento, que cumplo con los requisitos establecidos en el reglamento de admisión para el proceso remoto '.$DJreglamento_remoto.', aprobado con resolución '.$DJresolucion_remoto.', por lo que me comprometo a regularizar los documentos requeridos. 
                	<br>
					Deseo mencionar también, que por motivo del Estado de Emergencia Nacional frente a la infección por Coronavirus (COVID-19), no fue posible obtener los documentos originales requeridos y proceder a la inscripción correcta al proceso de admisión, por la modalidad <strong>Centro Pre Universitario</strong>, por lo que recurro a esta declaración jurada en honor a la verdad.
					<br>
					Dejo constancia que lo declarado es un compromiso y puede ser objeto de comprobación en cualquier circunstancia, teniendo conocimiento de las sanciones administrativas y penales a las que me viera sujeto de constatarse alguna falsedad, por lo cual firmo y estampo mi impresión dactilar, en señal de conformidad de todos los datos de la presente declaración.
				</td>
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
		<br>
		<br>
		<table width="750" border="0">
			<tr>
				<td width="10%">
					.
				</td>
				<td valign="bottom" align="center">'.
					$fotito.
				' <br>
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
                        <br>Dni Nro:'.
						$dni.
                '</td>
                <td>
					.                   	
                </td>
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
					$foto_firma_apoderado.
				'	<br>
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
					$apoderado.
					'<br>
					APODERADO DEL POSTULANTE
				</td>
                <td>
					.                   	
                </td>
           </tr>
		</table>
			';
?>