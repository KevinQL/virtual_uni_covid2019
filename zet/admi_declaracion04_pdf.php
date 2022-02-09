<?php	
   ########################
	#######################
	$titulo5 = 'DECLARACIÓN JURADA';		
	$vd50 = '	
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
					$titulo5.
					'</span>
				</td>
			</tr>
		</table>';		

	$vd51 = "
	<div style='text-align: left; font-size:9px;'>
	<table width='750' border='0'>
		<tr>
			<td width='2%'>&nbsp;
				
			</td>
			<td align='center' style='line-height:20pt;'>
				<strong>
					DECLARACIÓN JURADA DE ACEPTACION DE RIESGOS
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
				Yo, <strong>$nombrealumno</strong>, identificado con documento de identidad Nro <strong>$dni</strong> con domicilio en $domicilio del distrito $nombredistrito, provincia $nombreprovincia de la regi&oacute;n $nombredepartamento; postulante por la modalidad <strong>$nombremodalidad</strong> a la Escuela Profesional de <strong>$nombreescuela</strong> -  Proceso de Admisión {$DJproceso}.
                <br>
                <br>
                Declaro bajo juramento , conocer los riesgos de un examen no presencial on-line, los cuales me comprometo a prevenir y reducir BAJO MI RESPONSABILIDAD:
                <br>
                Limitado o nulo acceso al servicio de internet por tiempo de dos (02) horas como mínimo con la fluidez de datos y sin interferencia.
                <br>
                Ausencia de energía eléctrica para la computadora portátil (laptop). 
                <br>
                Baja o limitada carga de batería del celular.
                <br>
                Ambiente no apropiado para rendir el examen virtual, que tenga interrupción por ruidos, terceras personas o interrupción por necesidades biológicas.
                <br>
                Interrupción de la conectividad de internet, audio o video, por tener encendido algún aparato electrónico adicional a la laptop y celular con el que rendirá el examen de admisión.
                <br>
                Interrupción, fraude, robo de información o acceso no autorizado en el examen de admisión virtual, por hacking, phishing u otros aplicativos maliciosos; cuando ejecute una pagina web, aplicativos on-line, conexión remota u otro software que no esté autorizado; con excepción del sistema de la universidad, el aplicativo de auditoria a la computadora, verificación y monitoreo proporcionado por la Oficina de Admisión.
			</td>
		</tr>
	</table>
	";
?>