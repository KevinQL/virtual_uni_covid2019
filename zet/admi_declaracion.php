    <!-- hcatpcha API -->
    <script src="https://hcaptcha.com/1/api.js" async defer></script>

    <script>
        /**
         * Function for show the bottom of aceptar declarations
         */
        function mostrarBoton(element){
            setTimeout(() => {
                element.style.display = "block";
            }, 2000);
        }

        /**
         * ANIMACIÓN PARA CARGA DE PÁGINA ITEC
         */
        window.addEventListener("load", function(){
            console.log("listoo!!")
            
            setTimeout(() => {
                
                function watching(){
                    console.log("entro!")
                    let valor = document.querySelector("textarea[name=h-captcha-response]").value;
                    if(valor.length == 0){
                        setTimeout(() => {
                            watching();
                        }, 1000);
                    }else{
                        document.querySelector(".hcaptcha").value = valor;
                        console.log("fin")
                        return null;
                    }
                }
                /**
                * Starting function for watch the captcha
                */
                watching();
    
            }, 3000);
        })


    </script>

<?php 
	require_once("zet_seg.php");
	include_once(GL_DIR_FS_APP.'funciones/admi_fun_admision.php');
	$cn_zyz = conectar();
	$cn_zoz = conectar();
	#echo $persona;
	#echo $usuario;
    /**
     * Number of the proccess current. ejem 2020-2
     */ 
    $DJproceso = "2021-2";
    $DJresolucion = "N° 182-2020-CO-UNAJMA";
    $DJreglamento = "2021-II";
    $DJresolucion_remoto = "N° 182-2020-CO-UNAJMA";
    $DJreglamento_remoto = "2020-II";
	/**
	 * FIN-----
	 */
	
    $vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $persona . "','','','','','','1900-01-01','','','','','',0,0,'','','','','','','',0,0,0,0,0,'00','00','00','','',0,0,'','1','2','3','4','5','6','7','L')";

	#echo $vsql;
	
	$rs = mysqli_query($cn_zyz,	$vsql);	
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
        }
        

    $conex=conectar();
    $query = "SELECT apoderado FROM adm_proceso_postulante WHERE numerodocumento = '$dni'";
    $res = mysqli_query($conex, $query);	
    $registros = mysqli_num_rows($res); 
    if ($registros > 0) {
        # code...
        $row2 = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $apoderado = $row2['apoderado'];
	    mysqli_data_seek($res,0);
    }
    
	
	$nombreescuela = nombreescuela($estructura);
	$nombremodalidad = nombremodalidadadmision($modalidadadmision);
	$nombreproceso = nombreproceso($proceso);
	$codigo = $proceso.$usuario;
	$codigozet = $proceso.$persona;
    $sub = mostrarfoto_voucher_existe($codigo);
    $sub=1;// cambiado para OCA
    $firma_oca = mostrarfoto_firma_existe($usuario);

	$dia = substr($fecharegistro,0,2);
	$mes = substr($fecharegistro,3,2);
	$anio = substr($fecharegistro,6,4);
	
	$nombremes = nombremes($mes);
	$fecha = 'Andahuaylas, '.$dia.' de '.$nombremes.' del '.$anio;	
	#echo $vsql;
?>
<form  name="form" method="post" id="frmcronmod" action="admi_declaracion_grabar.php?d=<?php echo $_GET['d']?>&nav=<?php echo $_GET['nav']?>" onsubmit="grabar(this.id);return false;">
<?php
	if ($dj==0)
		{
			echo '<table width="600">';					
					if ($sub == 1 && $firma_oca == 1)
						{	
							echo '<tr>';
								echo '<td width="6%">';
									echo '<input name="chkConforme" id="chkConforme" onclick="this.value=gEsCasillaActiva(this.id);" checked="checked" type="checkbox" value="1">';
								echo '</td>';
								echo '<td>';
									echo '<span style="font-style:14px;">';
									echo 'He le&iacute;do integramente las Declaraciones Juradas y constancias y declaro bajo juramento que acepto el integro de su contenido.';
									echo '</span>';
									echo '<br>';
									echo '<br>';
								echo '</td>';							
							echo '</tr>';
							?>
                                <tr>
                                    <br>
                                    <td align="center" colspan="2">
                                        <!-- Elemento hCaptcha -->
                                        <div class="pt-2 text-center">
                                            <div class="h-captcha" data-sitekey="90541f3b-4b55-40ad-a480-1e07bf94bfdb">
                                            </div>
                                        </div>
                                        <!--  -->
                                    </td>
                                </tr>
                            <?php
							echo '<tr>';
								echo '<td colspan="2" align="center">';
									echo '<input name="codigo" type="hidden" value="'.$codigozet.'">';
									echo '<input name="hcaptcha" type="hidden" class="hcaptcha" value=""/>';
									echo '<input name="cmdGrabar" 
                                            type="submit" 
                                            value="Aceptar" 
                                            class="btn btn-primary"
                                            onclick="mostrarBoton(this)">';
								echo '</td>';							
							echo '</tr>';
						}
					else
						{
							echo '<div class="alert alert-danger">';
							echo '<span class="semi-bold" style="font-size:16px;">Tiene que subir los documentos requeridos, antes de aceptar la declaraci&oacute;n jurada.</span>';
							echo '</div>';
						}
				echo '</table>';		
		}
	else
		{
            


			echo '<div class="alert alert-danger">';
			echo '<span class="semi-bold" style="font-size:16px;">Usted acept&oacute; las declaraciones juradas y la ficha de inscripci&oacute;n.</span>';
			echo '</div>';
			echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/admi_declaracion_pdf.php?codigo='.$codigozet.'\')">';
            echo '<i class="fa fa-print"> Descargar Declaraciones Juradas PDF </i>';
            echo '</a>';	
            echo '<br>';	
            echo '<br>';	
            echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/admi_constancia_pdf.php?codigo='.$codigozet.'\')">';
            echo '<i class="fa fa-print"> Descargar Constancia de Inscripcion PDF </i>';
			echo '</a>';	
			
		}
	?>
</form>

<br>
<br>
<br>

<!-- INICIO FICAH DE INSCRIPCION --->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:18px; font-weight:bold">FICHA DE INSCRIPCION DEL POSTULANTE</span>
        </td>
    </tr>
</table>
<br>
<table width="100%">
	<tr>
    	<td align="left" width="20%">
        	<strong>CARRERA A LA QUE POSTULA:</strong>
        </td>
        <td>
        	<?php echo $nombreescuela;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>MODALIDAD:</strong>
        </td>
        <td>
        	<?php 
				echo $nombremodalidad;	
			?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>APELLIDO PATERNO:</strong>
        </td>
        <td>
        	<?php echo $apellidopaterno;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>APELLIDO MATERNO:</strong>
        </td>
        <td>
        	<?php echo $apellidomaterno;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>NOMBRE:</strong>
        </td>
        <td>
        	<?php echo $nombre;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>FECHA NACIMIENTO:</strong>
        </td>
        <td>
        	<?php echo $fechanacimiento;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>NRO. DNI:</strong>
        </td>
        <td>
        	<?php echo $dni;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>SEXO:</strong>
        </td>
        <td>
        	<?php echo $sexo;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>DOMICILIO:</strong>
        </td>
        <td>
        	<?php echo $domicilio;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>REGION:</strong>
        </td>
        <td>
        	<?php echo $nombredepartamento;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>PROVINCIA:</strong>
        </td>
        <td>
        	<?php echo $nombreprovincia;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>DISTRITO:</strong>
        </td>
        <td>
        	<?php echo $nombredistrito;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>CELULAR:</strong>
        </td>
        <td>
        	<?php echo $celular;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>EMAIL:</strong>
        </td>
        <td>
        	<?php echo $email;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>TIPO COLEGIO:</strong>
        </td>
        <td>
        	<?php echo $tipocolegio;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>NOMBRE COLEGIO:</strong>
        </td>
        <td>
        	<?php echo $colegio;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>A&Ntilde;O DE EGRESO:</strong>
        </td>
        <td>
        	<?php echo $anioegreso;?>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	<strong>APODERADO:</strong>
        </td>
        <td>
        	<?php echo $apoderado;?>
        </td>
    </tr>
</table>

<br>

<table width="100%">
	<tr>
    	<td align="right">
        	<?php echo $fecha?>
        </td>
        <td width="10%">
        	&nbsp
        </td>
    </tr>
</table>
<br>
<table width="100%" border="0">
    <tr>
        <td  width="10%">&nbsp;
            
        </td>
        <td align="center" width="35%" style="vertical-align:bottom">                    
            <?php
                mostrarfoto_ing_firma($usuario);
            ?>
        </td>
        <td width="10%">&nbsp;
            
        </td>
        
    </tr>
    <tr>
        <td>&nbsp;
            
        </td>
        <td style="border-top-style:dotted" align="center">                    
            <?php echo $nombrecompleto; ?> <br>
            Dni Nro: <?php echo $dni?>
        </td>
        <td>&nbsp;
            
        </td>
        
    </tr>
</table>
<!-- FIN FICAH DE INSCRIPCION --->

<!-- <br>
<br>
<br> -->

<!-- INICIO - DJ CONDICIONES EXAMEN ADMISION VIRTUAL --->
<!-- <table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
            DECLARACI&Oacute;N JURADA DE ACEPTACI&Oacute;N DE CONDICIONES EXAMEN ADMISION VIRTUAL            
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, de nacionalidad peruana, identificado con documento de identidad Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> del distrito <?php echo $nombredistrito;?>, provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante a la carrera profesional de <strong><?php echo $nombreescuela; ?></strong>, en la modalidad <strong><?php echo $nombremodalidad?></strong> en el Proceso de admisi&oacute;n <strong><?php echo $nombreproceso?></strong> de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas de Andahuaylas; en pleno uso de mis facultades f&iacute;sico mentales.
                <br>
                <br>                
                <strong>DECLARO BAJO JURAMENTO</strong> que conozco y acepto el contenido del Reglamento del Proceso de Admisi&oacute;n Remoto 2020 - II, Prospecto de Admisi&oacute;n y los "Lineamientos para el desarrollo del proceso de admisi&oacute;n, en el marco de emergencia sanitaria y medidas de prevenci&oacute;n de contagio y propagaci&oacute;n del COVID 19", as&iacute; como las faltas, sanciones, riesgos y requisitos m&iacute;nimos para participar en el examen virtual. As&iacute; mismo, durante el desarrollo del Examen de Admisi&oacute;n Virtual, me comprometo a cumplir con las instrucciones del supervisor o fiscalizador de la sesi&oacute;n virtual.
                <br>
                <br> 
		</td>
    </tr>
    <tr>
    	<td style="font-size:14px;" align="right">
        	
		</td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
       		<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;
                    	
                    </td>
                    
                </tr>
            </table>
		</td>
    </tr>
</table> -->
<!-- FIN - DJ CONDICIONES EXAMEN ADMISION VIRTUAL --->

<!-- <br>
<br>
<br> -->

<!-- INICIO - DJ RIESGOS DE EXAMEN ADMISION VIRTUAL --->
<!-- <table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
            DECLARACION JURADA ACEPTACION DE 
RIESGOS EN EL EXAMEN DE ADMISI&Oacute;N VIRTUAL       
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, de nacionalidad peruana, identificado con documento de identidad Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> del distrito <?php echo $nombredistrito;?>, provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante a la carrera profesional de <strong><?php echo $nombreescuela; ?></strong>, en la modalidad <strong><?php echo $nombremodalidad?></strong> en el Proceso de admisi&oacute;n <strong><?php echo $nombreproceso?></strong> de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas de Andahuaylas; en pleno uso de mis facultades f&iacute;sico mentales.
                <br>
                <br>                
                <strong>DECLARO BAJO JURAMENTO</strong> conocer los riesgos de un examen no presencial on-line, los cuales me comprometo a prevenir y reducir BAJO MI RESPONSABILIDAD:
                <br>
                <ol>
                <li>
                Limitado o nulo acceso al servicio de internet por tiempo de dos (03) horas como m&iacute;nimo con la fluidez de datos y sin interferencia.
                </li>
<li>Ausencia de energ&iacute;a el&eacute;ctrica para la computadora port&aacute;til (laptop).</li>
<li>Baja o limitada carga de bater&iacute;a del celular.</li>
<li>Ambiente no apropiado para rendir el examen virtual, que tenga interrupci&oacute;n por ruidos, terceras personas o interrupci&oacute;n por necesidades biol&oacute;gicas.</li>
<li>Interrupci&oacute;n de la conectividad de internet, audio o video, por tener encendido alg&uacute;n aparato electr&oacute;nico adicional a la laptop y celular con el que rendir&aacute; el examen.</li>
<li>Interrupci&oacute;n, fraude, robo de informaci&oacute;n o acceso no autorizado en el examen de admisi&oacute;n virtual, por hacking, phishing u otros aplicativos maliciosos; cuando ejecute una p&aacute;gina web, aplicativos on-line, conexi&oacute;n remota u otro software que no est&eacute; autorizado; con excepci&oacute;n del sistema de la Universidad, el aplicativo de verificaci&oacute;n y monitoreo proporcionado por la Oficina de Admisi&oacute;n.</li>
				</ol>

		</td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;
                    	
                    </td>
                    
                </tr>
            </table>
		</td>
    </tr>
</table> -->
<!-- FIN - DJ RIESGOS DE EXAMEN ADMISION VIRTUAL --->

<!-- <br>
<br>
<br> -->

<!-- INICIO - DJ REQUISITOS MÍNIMOS DE EXAMEN ADMISION VIRTUAL --->
<!-- <table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
            DECLARACION JURADA
REQUISITOS M&Iacute;NIMOS       
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, de nacionalidad peruana, identificado con documento de identidad Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> del distrito <?php echo $nombredistrito;?>, provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante a la carrera profesional de <strong><?php echo $nombreescuela; ?></strong>, en la modalidad <strong><?php echo $nombremodalidad?></strong> en el Proceso de admisi&oacute;n <strong><?php echo $nombreproceso?></strong> de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas de Andahuaylas; en pleno uso de mis facultades f&iacute;sico mentales.
                <br>
                <br>                
                <strong>DECLARO BAJO JURAMENTO</strong> disponer como m&iacute;nimo:
                <br>
                <ol>
                <li>
                Un (01) ambiente privado, sin interrupci&oacute;n de equipos electr&oacute;nicos encendidos (radio, televisor, celulares, computadoras u otros), acondicionado con una (01) silla y una (01) mesa, escritorio u otro de1 metro por 60 cm. Aproximadamente.
                </li>
				<li>
                Una (01) computadora o laptop con: - C&aacute;mara web operativo. - Conexi&oacute;n a internet por WiFi o cableado. - Capacidad de memoria de 4GB de RAM (recomendado). - Procesador Intel Celeron o superior. - Navegador web Mozilla. - Conectada a energ&iacute;a el&eacute;ctrica o con bater&iacute;a cargada al 100% que garantice una duraci&oacute;n por m&aacute;s de dos (02) horas.
                </li>
                <li>
				Un (01) celular Smartphone con: - C&aacute;mara - Conexi&oacute;n a internet. - Sistema Android compatible con Google Meet. - Conectada a energ&iacute;a el&eacute;ctrica o con bater&iacute;a cargada al 100% que garantice una duraci&oacute;n por m&aacute;s de dos (02) horas.</li>
				<li>
                Servicio de internet por un periodo aproximado de dos (02) horas y un ancho de banda m&iacute;nimo estable de 4 Mbps.</li>
				<li>
			Correo electr&oacute;nico en Gmail.
            	</li>
                </ol>
		</td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
            </table>
		</td>
    </tr>
</table> -->
<!-- FIN - DJ REQUISITOS MÍNIMOS DE EXAMEN ADMISION VIRTUAL --->


<br>
<br>
<br>

<!-- INICIO - DJ ANTECEDENTES PENALES --->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px"> 
            DECLARACION JURADA
DE NO POSEER ANTECEDENTES PENALES POR LA COMISI&Oacute;N DE LOS DELITOS DE TERRORISMO O APOLOG&Iacute;A AL TERRORISMO, DE VIOLACI&Oacute;N A LA LIBERTAD SEXUAL O DE TR&Aacute;FICO IL&Iacute;CITO DE DROGAS   
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	Se&ntilde;or:<br>
			Presidente de la Comisi&oacute;n Organizadora de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas 

        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, de nacionalidad peruana, identificado con documento de identidad Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> del distrito <?php echo $nombredistrito;?>, provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante a la carrera profesional de <strong><?php echo $nombreescuela; ?></strong>, en la modalidad <strong><?php echo $nombremodalidad?></strong> en el Proceso de admisi&oacute;n <strong><?=$DJproceso?></strong> de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas de Andahuaylas; en pleno uso de mis facultades f&iacute;sico mentales.
                <br>
                <br>                
                DECLARO BAJO JURAMENTO, no haber sido condenado por el delito de terrorismo o apolog&iacute;a al terrorismo en cualquiera de sus modalidades, que impida mi postulaci&oacute;n a la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas, seg&uacute;n el Art. 98° de la Ley Universitaria N° 30220, ni tampoco por los delitos de violaci&oacute;n a la libertad sexual o de tr&aacute;fico il&iacute;cito de drogas, seg&uacute;n Ley N° 29988.
                <br>
Doy fe que esta declaraci&oacute;n corresponde a la verdad, por lo que me someto a las responsabilidades a que hubiere lugar en caso de consignar informaci&oacute;n falsa.

		</td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
            </table>
		</td>
    </tr>
</table>
<!-- FIN - DJ ANTECEDENTES PENALES --->

<br>
<br>
<br>

<?php

//0015: Proceso CEPRE
//0014: Proceso Primera selección--------------------------------
if($proceso == '0016' || $proceso != ""){
    
?>

<!-- INICIO - DJ PARA REGULARIZAR DOCUMENTOS REQUERIDOS --->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
                DECLARACIÓN JURADA
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	Se&ntilde;or:<br>
			Presidente de la Comisi&oacute;n Organizadora de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas 

        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, identificado con DNI Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> distrito <?php echo $nombredistrito;?> y provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante por la modalidad <strong><?php echo $nombremodalidad?></strong> a la Escuela Profesional de <strong><?php echo $nombreescuela; ?></strong> –  Proceso de Admisión <?=$DJproceso?>.

                <br>
                <br>
                Declaro bajo juramento, que cumplo con los requisitos establecidos en el reglamento de admisión para el proceso remoto <?=$DJreglamento_remoto?>, aprobado con resolucion <?=$DJresolucion_remoto?>, por lo que me comprometo a regularizar los documentos requeridos. 
                <br>
                Deseo mencionar también, que por motivo del Estado de Emergencia Nacional frente a la infección por Coronavirus (COVID-19), no fue posible obtener los documentos originales requeridos y proceder a la inscripción correcta del proceso de admisión, por la modalidad <strong><?php echo $nombremodalidad?></strong>, por lo que recurro a esta declaración jurada en honor a la verdad.
                <br>
                Dejo constancia que lo declarado es un compromiso y puede ser objeto de comprobación en cualquier circunstancia, teniendo conocimiento de las sanciones administrativas y penales a las que me viera sujeto de constatarse alguna falsedad, por lo cual firmo y estampo mi impresión dactilar, en señal de conformidad de todos los datos de la presente declaración.

		</td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
                <br>
                
            </table>
		</td>
    </tr>
</table>
<!-- FIN - DJ PARA REGULARIZAR DOCUMENTOS REQUERIDOS --->

<!-- INICIO - DJ PARA REQUISITOS MINIMOS --->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
                DECLARACIÓN JURADA DE REQUISITOS MÍNIMOS
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	Se&ntilde;or:<br>
			Presidente de la Comisi&oacute;n Organizadora de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas 

        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, identificado con DNI Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> distrito <?php echo $nombredistrito;?> y provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante por la modalidad <strong><?php echo $nombremodalidad?></strong> a la Escuela Profesional de <strong><?php echo $nombreescuela; ?></strong> –  Proceso de Admisión <?=$DJproceso?>.

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
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
                <br>
<!-- esta es la parte de la firma del apoderado --->
                
<!-- aqui termina la firma del apoderado --->
            </table>
		</td>
    </tr>
</table>
<!-- FIN - DJ PARA REQUISITOS MINIMOS --->

<!-- INICIO - DJ PARA ACEPTACION DE RIESGOS --->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
                DECLARACIÓN JURADA DE ACEPTACION DE RIESGOS
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	Se&ntilde;or:<br>
			Presidente de la Comisi&oacute;n Organizadora de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas 

        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, identificado con DNI Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> distrito <?php echo $nombredistrito;?> y provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante por la modalidad <strong><?php echo $nombremodalidad?></strong> a la Escuela Profesional de <strong><?php echo $nombreescuela; ?></strong> –  Proceso de Admisión <?=$DJproceso?>.

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
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
                <br>
<!-- esta es la parte de la firma del apoderado --->
                <tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario.'AP');
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $apoderado; ?> <br>
                        APODERADO DEL POSTULANTE
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
<!-- aqui termina la firma del apoderado --->
            </table>
		</td>
    </tr>
</table>
<!-- FIN - DJ ACEPTACION DE RIESGOS --->

<!-- INICIO - DJ PARA ACEPTACION DE CONDICIONES --->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
                DECLARACIÓN JURADA DE ACEPTACION DE CONDICIONES
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	Se&ntilde;or:<br>
			Presidente de la Comisi&oacute;n Organizadora de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas 

        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, identificado con DNI Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> distrito <?php echo $nombredistrito;?> y provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante por la modalidad <strong><?php echo $nombremodalidad?></strong> a la Escuela Profesional de <strong><?php echo $nombreescuela; ?></strong> –  Proceso de Admisión <?=$DJproceso?>.

                <br>
                <br>
                Declaro bajo juramento , que conozco y acepto el contenido del Reglamento del Proceso de Admisión <?=$DJproceso?>, Prospecto de Admisión y los lineamientos para el desarrollo del proceso de admisión, en el marco de emergencia sanitaria y medidas de prevención de contagio y propagación del COVID-19; así como las faltas, sanciones, riesgos y requisitos mínimos para participar en el examen virtual. Así mismo, durante el desarrollo del Examen de Admisión Virtual, me comprometo a cumplir con las instrucciones del supervisor o fiscalizador de la sesión virtual.
        </td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
                <br>
<!-- esta es la parte de la firma del apoderado --->
                
<!-- aqui termina la firma del apoderado --->
            </table>
		</td>
    </tr>
</table>
<!-- FIN - DJ ACEPTACION DE CONDICIONES --->

<?php

}

elseif ($proceso == '0015') {
    # code...
    
?>
<!-- INICIO - DJ PARA REGULARIZAR DOCUMENTOS REQUERIDOS CEPRE--->
<table width="100%">
	<tr>
    	<td align="center">
        	<span style="font-size:22px">            
                DECLARACIÓN JURADA
            </span>
            <br>
        </td>
    </tr>
    <tr>
    	<td align="left">
        	Se&ntilde;or:<br>
			Presidente de la Comisi&oacute;n Organizadora de la Universidad Nacional Jos&eacute; Mar&iacute;a Arguedas 

        </td>
    </tr>
    <tr>
    	<td style="font-size:14px;">
        <br>
                Yo, <strong><?php echo $nombrecompleto; ?></strong>, identificado con DNI Nro <strong><?php echo $dni;?></strong> con domicilio en <?php echo $domicilio;?> distrito <?php echo $nombredistrito;?> y provincia <?php echo $nombreprovincia;?> de la regi&oacute;n <?php echo $nombredepartamento?>; postulante por la modalidad <strong><?php echo $nombremodalidad?></strong> a la Escuela Profesional de <strong><?php echo $nombreescuela; ?></strong> –  Proceso de Admisión <?=$DJproceso?>.

                <br>
                <br>
                <br>
                Declaro bajo juramento, que cumplo con los requisitos establecidos en el reglamento de admisión para el proceso remoto <?=$DJreglamento_remoto?>, aprobado con resolución <?=$DJresolucion_remoto?>, por lo que me comprometo a regularizar los documentos requeridos. 
                <br>
                Deseo mencionar también, que por motivo del Estado de Emergencia Nacional frente a la infección por Coronavirus (COVID-19), no fue posible obtener los documentos originales requeridos y proceder a la inscripción correcta al proceso de admisión, por la modalidad <strong>Centro Pre Universitario</strong>, por lo que recurro a esta declaración jurada en honor a la verdad.
                <br>
                Dejo constancia que lo declarado es un compromiso y puede ser objeto de comprobación en cualquier circunstancia, teniendo conocimiento de las sanciones administrativas y penales a las que me viera sujeto de constatarse alguna falsedad, por lo cual firmo y estampo mi impresión dactilar, en señal de conformidad de todos los datos de la presente declaración.

		</td>
    </tr>
    <tr>
     	<td style="font-size:14px;" align="center">
        	<br>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo $fecha?>
                    </td>
                    <td width="10%">
                        &nbsp
                    </td>
                </tr>
            </table>
            <br>
        	<table width="100%" border="0">
            	<tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario);
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $nombrecompleto; ?> <br>
                        Dni Nro: <?php echo $dni?>
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
                <br>
                <tr>
                	<td  width="10%">&nbsp;
                    	
                    </td>
                    <td align="center" width="35%" style="vertical-align:bottom">                    
 						<?php
                       		mostrarfoto_ing_firma($usuario.'AP');
						?>
                    </td>
                    <td width="10%">&nbsp;
                    	
                    </td>
                    
                </tr>
            	<tr>
                	<td>&nbsp;
                    	
                    </td>
                    <td style="border-top-style:dotted" align="center">                    
                        <?php echo $apoderado; ?> <br>
                        APODERADO DEL POSTULANTE
                    </td>
                    <td>&nbsp;                    	
                    </td>
                </tr>
            </table>
		</td>
    </tr>
</table>
<?php

}

?>

<script>
function gEsCasillaActiva(idCasilla) {
    if (!document.getElementById(idCasilla)) {
        alert("El objeto no existe.\ngVerificaCasilla()");
    }
    return document.getElementById(idCasilla).checked ? "1" : "0";
}
