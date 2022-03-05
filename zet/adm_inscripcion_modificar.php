<?php 
	require_once("zet_seg.php");
	include_once(GL_DIR_FS_APP.'funciones/admi_fun_admision.php');
	$codigo = $_GET['codigo'];
	$proceso = substr($codigo,0,4);
	$postulante = substr($codigo,4,7);	
	$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '". $postulante . "','','','','','','1900-01-01','','','','','',0,0,'','','','','','','',0,0,0,0,0,'00','00','00','','',0,0,'','1','2','3','4','5','6','7','M')";	
	#echo $vsql;	
	$rs = mysqli_query($cn,	$vsql);	
	$numeroregistros = mysqli_num_rows($rs); 
	
	if ($numeroregistros > 0)
		{
			$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			$postulante = $row["postulante"];
			$estructura = $row["estructura"];
			$modalidadadmision = $row["modalidadadmision"];
			$escuelamodalidad=$estructura.$modalidadadmision;
			$apellidopaterno = $row["apellidopaterno"];
			$apellidomaterno = $row["apellidomaterno"];
			$nombre = $row["nombre"];
			$fechanacimiento = $row["fechanacimiento"];
			$anioegreso = $row["anioegreso"];
			$tipocolegio = $row["tipocolegio"];
			$tipodocumento = $row["tipodocumento"];
			$numerodocumento = $row["numerodocumento"];
			$sexo = $row["sexo"];
			$vecesunj = $row["vecesunj"];
			$vecesotra = $row["vecesotra"];
			$tipopago = $row["tipopago"];
			$recibopago = $row["recibopago"];
			$tipoprocedencia = $row["tipoprocedencia"];
			$direccion = $row["direccion"];
			$email = $row["email"];
			$telefono = $row["telefono"];
			$celular = $row["celular"];	
			$certificado = $row["certificado"];	
			$departamento = $row["departamento"];
			$provincia = $row["provincia"];
			$distrito = $row["distrito"];
			$departamentocolegio = $row["departamentocolegio"];
			$provinciacolegio = $row["provinciacolegio"];
			$distritocolegio = $row["distritocolegio"];
			$departamentoprocedencia = $row["departamentoprocedencia"];
			$provinciaprocedencia = $row["provinciaprocedencia"];
			$distritoprocedencia = $row["distritoprocedencia"];
			$apoderado = $row["apoderado"];		
			$colegio = $row["colegio"];	
			$moda = $row["moda"];
			$pago1 = $row["pago1"];
			$pago2 = $row["pago2"];
			$turno = $row["turno"];	
			$validado = $row["validado"];	
			$dj = $row["dj"];		
			mysqli_data_seek($rs,0);
		}	
	$contador = 0;
	$nombreescuela = nombreescuela($estructura);
	$nombremodalidadadmision = nombremodalidadadmision($modalidadadmision);
	$vsqlescuelamodalidad = "call zyz_CAMantenedorVacante ('". $proceso . "', '','',0,1,'D')";
	#echo $vsqlescuelamodalidad;
	$vsqltipocolegio = "select tipocolegio, descripcion from adm_tipocolegio order by descripcion";	
	$vsqltipodocumento = "select tipodocumento, descripcion from mae_tipodocumento where activo=1 order by descripcion";
	$vsqlsexo = "select sexo, descripcion from adm_sexo where activo=1 order by descripcion";
	$vsqltipopago = "select tipopago, descripcion from adm_tipopago where activo=1 order by descripcion";
	$vsqltipoprocedencia = "select tipoprocedencia, descripcion from adm_tipoprocedencia where activo=1 order by descripcion";
	
	
	$vsqldepartamento="SELECT departamento,descripcion FROM mae_ubigeo WHERE provincia='00' AND distrito='00' order by 2";
	$vsqlprovincia="SELECT provincia,descripcion FROM mae_ubigeo WHERE departamento='$departamento' AND provincia<>'00' AND distrito='00' order by 2";
	$vsqldistrito="SELECT distrito,descripcion FROM mae_ubigeo WHERE departamento='$departamento' AND provincia='$provincia' AND distrito<>'00' order by 2";
	
	$vsqldepartamentocolegio="SELECT departamento,descripcion FROM mae_ubigeo WHERE provincia='00' AND distrito='00' order by 2";
	$vsqlprovinciacolegio="SELECT provincia,descripcion FROM mae_ubigeo WHERE departamento='$departamentocolegio' AND provincia<>'00' AND distrito='00' order by 2";
	$vsqldistritocolegio="SELECT distrito,descripcion FROM mae_ubigeo WHERE departamento='$departamentocolegio' AND provincia='$provinciacolegio' AND distrito<>'00' order by 2";
	
	$vsqldepartamentoprocedencia="SELECT departamento,descripcion FROM mae_ubigeo WHERE provincia='00' AND distrito='00' order by 2";
	$vsqlprovinciaprocedencia="SELECT provincia,descripcion FROM mae_ubigeo WHERE departamento='$departamentoprocedencia' AND provincia<>'00' AND distrito='00' order by 2";
	$vsqldistritoprocedencia="SELECT distrito,descripcion FROM mae_ubigeo WHERE departamento='$departamentoprocedencia' AND provincia='$provinciaprocedencia' AND distrito<>'00' order by 2";
	
	
	$vsqlmoda = "select moda, descripcion from adm_moda order by descripcion";
	$vsqlturno = "select turno, descripcion from adm_turno order by descripcion";
$vsqldepartamento="SELECT departamento,descripcion FROM mae_ubigeo WHERE provincia='00' AND distrito='00' order by 2";
	$vsqlprovincia="SELECT provincia,descripcion FROM mae_ubigeo WHERE departamento='$departamento' AND provincia<>'00' AND distrito='00' order by 2";
	$vsqldistrito="SELECT distrito,descripcion FROM mae_ubigeo WHERE departamento='$departamento' AND provincia='$provincia' AND distrito<>'00' order by 2";
	
	$nombreproceso = nombreproceso($proceso);
	#echo $vsqldepartamento;
	#echo '<br>';
	#echo $vsqlprovincia;
	#echo '<br>';
	#echo $vsqldistrito;


     /**
     * /**************************************\
     * |*************** SEGUNDA CARRERA
     * ****************************************
     * modificado: 14-02-2022
     */

        /**
         * 
         */
        class CarrerOption {
            private $idcarrer;

            function __construct($idcarrer) {
                $this->idcarrer = $idcarrer;
            }

            function esDiferente($id) {
                return ($id !== $this->idcarrer) && ($id !== "00");
            }
        }

        /**
         * - Devuelve toda la lista de carreras.
         * - Devuelve como seleccionado, la carrera opt2 del postulante preinscrito.
         */
        function getCarrerAdmision($idCarrer){
            $idcarrer = $idCarrer; // :V

            $carrer = ["00"=>'<option value="00" >ERROR EN LA CARRERA!!</option>',
                        "01"=>'<option value="01" >ADMINISTRACION DE EMPRESAS</option>',
                        "02"=>'<option value="02" >CONTABILIDAD</option>',
                        "03"=>'<option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option>',
                        "04"=>'<option value="04" >INGENIERIA AGROINDUSTRIAL</option>',
                        "05"=>'<option value="05" >INGENIERIA AMBIENTAL</option>',
                        "06"=>'<option value="06" >INGENIERIA DE SISTEMAS</option>'];

            $result = "";
            if(array_key_exists($idcarrer, $carrer)){
                
                $actual[$idcarrer] = $carrer[$idcarrer];
                $matches = array_filter($carrer, array(new CarrerOption($idcarrer), 'esDiferente'), ARRAY_FILTER_USE_KEY);
                $lista = array_merge($actual, $matches);

                foreach ($lista as $opt){
                    $result .= $opt;
                }
            }else{
                foreach ($carrer as $opt){
                    $result .= $opt;
                }
            }
            
            return $result;

        }


        /**
         * test function ssecond carrer part to admin
         */
        function test_SecondCarrer(){
            
            $restest = ["00"=>'<option value="00" >ERROR EN LA CARRERA!!</option><option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="02" >CONTABILIDAD</option><option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="05" >INGENIERIA AMBIENTAL</option><option value="06" >INGENIERIA DE SISTEMAS</option>',
                        "01"=>'<option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="02" >CONTABILIDAD</option><option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="05" >INGENIERIA AMBIENTAL</option><option value="06" >INGENIERIA DE SISTEMAS</option>',
                        "02"=>'<option value="02" >CONTABILIDAD</option><option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="05" >INGENIERIA AMBIENTAL</option><option value="06" >INGENIERIA DE SISTEMAS</option>',
                        "03"=>'<option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="02" >CONTABILIDAD</option><option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="05" >INGENIERIA AMBIENTAL</option><option value="06" >INGENIERIA DE SISTEMAS</option>',
                        "04"=>'<option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="02" >CONTABILIDAD</option><option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="05" >INGENIERIA AMBIENTAL</option><option value="06" >INGENIERIA DE SISTEMAS</option>',
                        "05"=>'<option value="05" >INGENIERIA AMBIENTAL</option><option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="02" >CONTABILIDAD</option><option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="06" >INGENIERIA DE SISTEMAS</option>',
                        "06"=>'<option value="06" >INGENIERIA DE SISTEMAS</option><option value="01" >ADMINISTRACION DE EMPRESAS</option><option value="02" >CONTABILIDAD</option><option value="03" >EDUCACION PRIMARIA INTERCULTURAL</option><option value="04" >INGENIERIA AGROINDUSTRIAL</option><option value="05" >INGENIERIA AMBIENTAL</option>'
            ];
            
            echo PHP_EOL;
            
            foreach ($restest as $key => $value){
                echo getCarrerAdmision($key);
                echo PHP_EOL;
                echo $value;
                echo PHP_EOL;
                if(trim(getCarrerAdmision($key)) == trim($value)){
                    echo "test succefully!!";
                }else{
                    echo "test error!!";
                }
                echo PHP_EOL;
            }
        }




        /**
         * MAIN PHP 
         */
        
            #echo getCarrerAdmision("02");
            
            #echo PHP_EOL."RESULT TEST:".PHP_EOL;
            #test_SecondCarrer();

            /**
             * Identifica el control para el proceso con carrera de segunda opcion
             * date last change: 02/03/2022
             */
            $paseVarAnio = true; // controla que el anio se imprima en la vista
            $pase_carrer2 = true; // controla que la carrera de segunda opt se imprima en la vista

            /**
             * - Evaluamos que el dato contenga los dos valores necesarios, para comvertirlos en 
             * un array de dos dimensiones
             */
            if(count(explode("||", $anioegreso)) == 2){

                /**
                 * - Asignamos los valores del anio egreso y codigo carrera opt 2, para su 
                 * asignación en la vista
                 */
                list($anio_egreso, $code_carrer2) = explode("||", $anioegreso);

            }else{

                if($proceso == "0030"){

                    /**
                     * - Asignamos codigo de carrera opt2. 
                     * - Esto debido a la programación anterior.
                     */
                    $code_carrer2 = $anioegreso; 
                    
                    $paseVarAnio = false; // no imprimimos el anio en la vista

                }else{

                    $anio_egreso = $anioegreso;

                    $pase_carrer2 = false;
                    
                }
            }

        /**
         * FIN MAIN PHP
         */

?>


<form  name="form" method="post" id="frmcronmod" action="adm_inscripcion_grabar.php?d=<?php echo $_GET['d']?>&nav=<?php echo $_GET['nav']?>" onsubmit="grabar(this.id);return false;">
<table width="100%">
    <tr>
        <td>
            
            <a data-atras="SI" href="adm_inscripcion.php?d=<?php echo $_REQUEST['d']?>&nav=<?php echo $nav?>&proceso=<?php echo $proceso?>"><i class="fa fa-mail-reply"></i> Regresar</a>
        </td>
        <td align="right" width="10%">
       		<?php
				if ($validado==0)
					{
						$men = 'Validar';	
						$val = 1;
					}
				else
					{
						$men = 'Dejar Pendiente';
						$val = 0;
					}
		echo '<a class="btn btn-default" data-eliminar="NO" rel="nolink" href="adm_inscripcion_validar.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$codigo.'&val='.$val.'" data-mensaje="Esta seguro de validar el usuario?">';
			echo '<i class="fa fa-asterisk"></i>  ';
		echo $men;
		echo '</a>';
			?>
        </td>
    </tr>
</table>
<table class="table">
    <tr>
        <td width="15%">
            <strong>Proceso:</strong>
        </td>
        <td>
            <?php echo $nombreproceso?>
        </td>
    </tr>
    <!--
    <tr>
        <td>
            <strong>Postulante:</strong>
        </td>
        <td>
            <?php echo $postulante?>
        </td>
    </tr>
    -->
    <tr>
        <td>
            <strong>Escuela - Modalidad:</strong>								
        </td>
        <td>
        	<?php
				#echo $nombreescuela . ' - ' . $nombremodalidadadmision;
				$estmod = $estructura.$modalidadadmision;
				MostrarComboZet("cboEscuelaModalidad",$vsqlescuelamodalidad,$estmod,'Si');
			?>
        </td>
    </tr>


    <?php

        /**
         * Si el proceso es ORDINARIO 2022, que admite carrera de segunda opción
         */
        if($proceso == "0030" && $pase_carrer2){
            
    ?>
	<tr>
        <td>
            <strong>Segunda carrera</strong>								
        </td>
        <td>
            <select name="txtAnioEgreso" id="txtAnioEgreso" style="width: 100%;">
            <?php
            echo getCarrerAdmision($code_carrer2);
            ?>
            </select>
        </td>
    </tr>	
    <?php
        }
    ?>


    <tr>
        <td>
            <strong>Apellido paterno:</strong>								
        </td>
        <td>
            <input name="txtApellidoPaterno" id="txtApellidoPaterno" type="text" value="<?php echo $apellidopaterno?>" style="width: 60%" data-requerido="true" data-requerido-texto="Apellido Paterno">
        </td>
    </tr>	
    <tr>
        <td>
            <strong>Apellido materno:</strong>								
        </td>
        <td>
            <input name="txtApellidoMaterno" id="txtApellidoMaterno" type="text" value="<?php echo $apellidomaterno?>" style="width: 60%" data-requerido="true" data-requerido-texto="Apellido Materno">
        </td>
    </tr>
    <tr>
        <td>
            <strong>Nombres:</strong>								
        </td>
        <td>
            <input name="txtNombre" id="txtNombre" type="text" value="<?php echo $nombre?>" style="width: 60%" data-requerido="true" data-requerido-texto="Nombres">
        </td>
    </tr>
    <tr>
        <td>
            <strong>CONTACTO:</strong>								
        </td>
        <td>            
            <h2>
                <?php echo  substr($telefono,0,3) . " - " . substr($telefono,3,3) . " - ". substr($telefono,6,9) ;  ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Celular/Fijo:</strong>								
        </td>
        <td>            
            <input name="txtTelefono" id="txtTelefono" type="text" value="<?php echo $telefono?>" style="width: 60%">
        </td>
    </tr>
    <tr>
        <td>
            <strong>Fec. Nacimiento:</strong>								
        </td>
        <td>
            <input name="txtFechaNacimiento" id="txtFechaNacimiento" type="text" value="<?php echo $fechanacimiento?>" style="width: 20%" data-requerido="true" data-requerido-texto="Fecha Nacimiento">
        </td>
    </tr>
    <tr>
        <td>
            <strong>Tipo documento:</strong>								
        </td>
        <td>
            <?php MostrarComboZet("cboTipoDocumento",$vsqltipodocumento,$tipodocumento,'Si'); ?>
        </td>
    </tr>	
    <tr>
        <td>
            <strong>Nro. documento:</strong>								
        </td>
        <td>
            <input name="txtNumeroDocumento" id="txtNumeroDocumento" type="text" value="<?php echo $numerodocumento?>" style="width: 15%" data-requerido="true" data-requerido-texto="Nro. Documento" maxlength="8">
        </td>
    </tr>    
    <tr>
        <td>
            <strong>Sexo:</strong>								
        </td>
        <td>
            <?php MostrarComboZet("cboSexo",$vsqlsexo,$sexo,'Si'); ?>
        </td>
    </tr>	
	<tr>
		<td align="left">
        	<strong>Departamento:</strong>
        </td>
		<td>
			<?php MostrarCombo2("cboDepartamento",$vsqldepartamento,$departamento)?>
        </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Provincia:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboProvincia",$vsqlprovincia,$provincia); ?>
             </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Distrito:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboDistrito",$vsqldistrito,$distrito); ?>
            </td>
	</tr>    
    <tr>
        <td>
            <strong>Direcci&oacute;n:</strong>								
        </td>
        <td>
            <input name="txtDireccion" id="txtDireccion" type="text" value="<?php echo $direccion?>" style="width: 60%">
        </td>
    </tr>
    
    <!--
    <tr>
        <td>
            <strong>Telefono:</strong>								
        </td>
        <td>
        	<input name="txtCelular" id="txtCelular" type="text" value="<?php echo $celular?>" style="width: 60%">
        </td>
    </tr>
    -->	
    <tr>
        <td>
            <strong>Email:</strong>								
        </td>
        <td>
            <input name="txtEmail" id="txtEmail" type="text" value="<?php echo $email?>" style="width: 60%">
        </td>
    </tr>	
  	<tr>
    	<td>
        	<strong>
            Apoderado:
            </strong>        
        </td>
        <td>
        	<input name="txtApoderado" id="txtApoderado" type="text" value="<?php echo $apoderado?>" style="width: 60%">
        </td>    
    </tr> 
    <tr>
        <td>
            <strong>Tipo colegio:</strong>								
        </td>
        <td>
            <?php MostrarComboZet("cboTipoColegio",$vsqltipocolegio,$tipocolegio,'Si'); ?>
        </td>
    </tr> 
	<tr>
		<td align="left">
        	<strong>Departamento Colegio:</strong>
        </td>
		<td>
			<?php MostrarCombo2("cboDepartamentoColegio",$vsqldepartamentocolegio,$departamentocolegio)?>
        </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Provincia Colegio:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboProvinciaColegio",$vsqlprovinciacolegio,$provinciacolegio); ?>
             </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Distrito Colegio:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboDistritoColegio",$vsqldistritocolegio,$distritocolegio); ?>
            </td>
	</tr>        	
    <tr>
        <td>
            <strong>Colegio procedencia:</strong>								
        </td>
        <td>
            <input name="txtColegio" id="txtColegio" type="text" value="<?php echo $colegio;?>" style="width: 85%" data-requerido="true" data-requerido-texto="Colegio">
        </td>
    </tr>


    <?php
        /**
         * Si se debe imprimir anio para el proceso
         */
        if($paseVarAnio){
    ?>
    <tr>
        <td>
            <strong>Año egreso:</strong>								
        </td>
        <td>
            <input name="txtAnioEgreso" id="txtAnioEgreso" type="text" value="<?php echo $anio_egreso; ?>" style="width: 10%" data-requerido="true" data-requerido-texto="Año egreso" maxlength="4">
        </td>
    </tr>
    <?php

        }
        /****
         * END IF select carrear
         */
    ?>


	<tr>
		<td align="left">
        	<strong>Departamento Procedencia:</strong>
        </td>
		<td>
			<?php MostrarCombo2("cboDepartamentoProcedencia",$vsqldepartamentoprocedencia,$departamentoprocedencia)?>
        </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Provincia Procedencia:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboProvinciaProcedencia",$vsqlprovinciaprocedencia,$provinciaprocedencia); ?>
             </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Distrito Procedencia:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboDistritoProcedencia",$vsqldistritoprocedencia,$distritoprocedencia); ?>
            </td>
	</tr>     
    <!--
   	<tr>
        <td>
            <strong>Promedio colegio:</strong>								
        </td>
        <td>
            <input name="txtCertificado" id="txtCertificado" type="text" value="<?php echo $certificado?>" style="width: 10%">
        </td>
    </tr> 	

    <tr>
        <td>
            <strong>Pago 1:</strong>								
        </td>
        <td>
            <input name="txtPago1" id="txtPago1" type="text" value="<?php echo $pago1?>" style="width: 10%">
        </td>
    </tr> 
    <tr>
        <td>
            <strong>Pago 2:</strong>								
        </td>
        <td>
            <input name="txtPago2" id="txtPago2" type="text" value="<?php echo $pago2?>" style="width: 10%">
        </td>
    </tr> 			
	<tr>
        <td>
            <strong>Turno:</strong>								
        </td>
        <td>
            <?php MostrarComboZet("cboTurno",$vsqlturno,$turno,'Si'); ?>
        </td>
    </tr>
    -->		
    <tr>
        <td>
            <strong>Foto postulante</strong>								
        </td>
        <td>
            <?php 
            mostrarfoto_postulante($numerodocumento);
            ?>	
        </td>
    </tr>   
    <tr>
        <td>
            <strong>Foto Dni</strong>								
        </td>
        <td>
            <?php 
            mostrarfoto_dni($numerodocumento);
            ?>	
        </td>
    </tr>    
	<tr>
        <td>
            <strong>Foto Voucher</strong>								
        </td>
        <td>
            <?php 
				#if ($proceso=='0006' or $proceso=='0007')
				#	{
				#		$proc='0005';
				#	}
				#else
				#	{
						$proc = $proceso;
						$code=$proc.$numerodocumento;
						mostrarfoto_voucher($code);
				#	}
			
            ?>	
        </td>
    </tr>
    <tr>
        <td>
            <strong>Foto Firma</strong>								
        </td>
        <td>
            <?php 
            mostrarfoto_ing_firma($numerodocumento);
            ?>		
        </td>
    </tr>
    <tr>
        <td>
            <strong>Documentos</strong>								
        </td>
        <td>
            <?php
				if ($proceso=='0006' or $proceso=='0007')
					{
						$busca1 = '0005'.$numerodocumento;
					}
				elseif ($proceso=='0008' or $proceso=='0009')
					{
						$busca1 = '0004'.$numerodocumento;
					}
				elseif ($proceso=='0010' or $proceso=='0011')
					{
						$busca1 = '0002'.$numerodocumento;
					}
				else
					{
						$busca1 = $proceso.$numerodocumento;
					}
				
				$busca2 = $proceso.$numerodocumento;
					
				#$busca = $proceso.$numerodocumento;
				 
            	$file1 = "foto_documento/".$busca1.".pdf";
				$file2 = "foto_documento/".$busca2.".pdf";
				
				#echo $file1;
				
				#echo $file;
				if (file_exists($file1))
					{
						echo '<a href="javascript:ventanaSecundaria(\'../zet/admi_mostrar_archivo.php?file='.$file1.'\')">';
							echo 'Ver PDF';
						echo '</a>';					
					}
				elseif (file_exists($file2))
					{
						echo '<a href="javascript:ventanaSecundaria(\'../zet/admi_mostrar_archivo.php?file='.$file2.'\')">';
							echo 'Ver PDF';
						echo '</a>';					
					}
				else
					{
						echo 'No se encuentran archivos relacionados';	
					}
            ?>		
        </td>
    </tr>
    <tr>
    	<td>
        	<strong>
        	Dj:
            </strong>
        </td>
        <td>
        	<?php
         		if ($dj==1)
					{
                        echo '<span class="blue_bg bg_space">';
                        echo 'Aceptadas';
                        echo '</span>';
						
						echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.		'zet/admi_declaracion_pdf.php?codigo='.$codigo.'\')">';
            					echo '<i class="fa fa-print"> Descargar PDF </i>';
						echo '</a>';
                    }
                    else
                    {
                        echo '<span class="red_bg bg_space">';
                        echo 'No aceptadas';
                        echo '</span>';
                    }
			?>
        </td>
    </tr>																	
    <tr>
        <td align="center" colspan="2">
            <input name="proceso" type="hidden" value="<?php echo $proceso;?>">
            <input name="postulante" type="hidden" value="<?php echo $postulante?>">
            <input name="txtTipo" type="hidden" value="A">
            <input name="cmdGrabar" type="submit" value="Grabar" class="btn btn-primary">
        </td>										  
    </tr>	
    <?php mysqli_close($cn);?>
</table>
</form>

<!-- INICIO -->
<style>
    .btn-fijo{
        background: rgb(2,0,36);
        background: radial-gradient(circle, rgba(2,0,36,1) 21%, rgba(9,9,121,1) 60%, rgba(0,212,255,1) 100%);
        border: 1px solid transparent;
        border-radius: 10px;

        padding: 4px;
        position: fixed;
        right:35px;
        bottom:50px;
    }

    .btn-fijo a{
        font-size: 1.4rem;
        text-align: center;
        outline: none;
        text-decoration: none;
        color: white;
    }
    .btn-fijo a:hover {
        color: #D1BCE3;
    }
</style>
<!-- MODAL FIJO EN LA PÁGIAN DE MODIFICAR -->
<div class="btn-fijo">
    <?php

        $tipex2 = 'K' . $proceso . $postulante ;
        $tipex2 = base64_encode(base64_encode($tipex2));
        $dir_env = GL_DIR_WS_HTTP_APP."zet/admi_enviar_email_examen_usuario.php?clave=".$tipex2;
    ?>
    <a href="javascript:ventanaSecundaria('<?php echo $dir_env; ?>')" class="btn btn-ligh" >
        ENVIAR :D
        <i class="fa fa-envelope" style=""></i>
    </a>
</div>
<!--  FIN  -->

<script>$('#cboEscuelaModalidad').css('width','100%')</script>
<script>$('#cboDepartamento').css('width','100%')</script>
<script>$('#cboProvincia').css('width','100%')</script>
<script>$('#cboDistrito').css('width','100%')</script>
<script>$('#cboModa').css('width','60%')</script>
<script>$('#cboTipoProcedencia').css('width','60%')</script>
<script>
    function crearselectubigeo(id,data) {
        $("#" + id).html('');
        $("#" + id).html('<option value=\"\">SELECCIONAR..</option>');
        $.each(data, function(k,v){
            $("#"+id).append("<option value=\""+k+"\">"+v+"</option>");
        })
        $("#"+id).each(function() {
            // Obtencion del elemento seleccionado
            var valorSeleccionado = $(this).val();

            // Aplicacion del orden alfabetico
            $(this).html($("option", $(this)).sort(function(a, b) {
                return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
            }));

            // Reestablecimiento de la opción seleccionada previamente
            $(this).val('');
        });
    }
    function cargarubigeo(id,de,pr,di,nombre) {
        param={dep:de,prov:pr,dist:di,nombre:nombre};
        $.ajax({
            url: '../zet/ubigeo.php',
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            data: param, // our data object
            contentType: "application/x-www-form-urlencoded",
            dataType: 'json', // what type of data do we expect back from the server
            encode: true,
            cache: false
        }).done(function (data) {
            crearselectubigeo(id,data)

        });
    }
    $('#cboDepartamento').change(
       function () {
           cargarubigeo('cboProvincia',this.value,'00','00','provincia')
           crearselect('cboDistrito',{})
       }
    )
    $('#cboProvincia').change(
        function () {
            cargarubigeo('cboDistrito',$('#cboDepartamento').val(),this.value,'00','distrito')
        }
    )
 	$('#cboDepartamentoColegio').change(
       function () {
           cargarubigeo('cboProvinciaColegio',this.value,'00','00','provincia')
           crearselect('cboDistritoColegio',{})
       }
    )
    $('#cboProvinciaColegio').change(
        function () {
            cargarubigeo('cboDistritoColegio',$('#cboDepartamentoColegio').val(),this.value,'00','distrito')
        }
    )	
	
	
    $('#cboDepartamentoProcedencia').change(
        function () {
            cargarubigeo('cboProvinciaProcedencia',this.value,'00','00','provincia')
            crearselect('cboDistritoProcedencia',{})
        }
    )
    $('#cboProvinciaProcedencia').change(
        function () {
            cargarubigeo('cboDistritoProcedencia',$('#cboDepartamentoProcedencia').val(),this.value,'00','distrito')
        }
    )
</script>