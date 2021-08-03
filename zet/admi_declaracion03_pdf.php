<?php	
   ########################
	#######################
	$titulo4 = 'DECLARACI&Oacute;N JURADA';		
	$vd40 = '	
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
					$titulo4.
					'</span>
				</td>
			</tr>
		</table>';		

	$vd41 = "
	<div style='text-align: left; font-size:9px;'>
	<table width='750' border='0'>
		<tr>
			<td width='2%'>&nbsp;
				
			</td>
			<td align='center' style='line-height:20pt;'>
				<strong>
					DECLARACIÓN JURADA DE REQUISITOS MÍNIMOS	
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
                Declaro bajo juramento disponer como mínimo:
                <br>
                Un (01) ambiente privado, sin interrupción de equipos electrónicos encendidos (radio, televisión, celulares, computadoras u otros), acondicionado con una (01) silla y una (01) mesa, escritorio u otro de 1 metro por 60 cm. Aproximadamente. 
                <br>
                Una (01) computadora o laptop con: -Cámara web operativo. - Conexión a internet por WiFi o cableado. - Capacidad de memoria de 4GB de RAM (recomendado). - Procesador Intel Celeron o superior. - Navegador web Mozilla, Chrome. - Conectada a energía o con batería cargada al 100% que garantice una duración por más de dos (02) horas.
                <br>
                Un (01) celular Smartphone con: - Cámara. – Conexión a internet. – Sistema Android compatible con Google Meet. – Conectada a energía eléctrica o con batería cargada al 100% que garantice una duración por más de dos (02) horas.
                <br>
                Servicio de internet por un periodo aproximado de dos (02) horas y un ancho de banda mínimo estable de 4 Mbps.
                <br>
                Correo electrónico en Gmail.
			</td>
		</tr>
	</table>
	";
?>