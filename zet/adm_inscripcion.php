<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php 
	require_once("zet_seg.php");
	$cn = conectar();	
	$cn_vacante = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	mysqli_query($cn_vacante,"SET CHARACTER SET utf8");
	mysqli_query($cn_vacante,"SET NAMES utf8");

	if (isset($_POST['cboProceso'])) 
		{
			$proceso = $_POST["cboProceso"];
		}
	elseif (isset($_GET['proceso'])) 
		{
			$proceso = $_GET["proceso"];
		}
	else
		{
			$vsql_vacante = "call zyz_MantenedorProceso ('', '','','','','','','1900-01-01',0,0,0,1,'','','','','E')";	
			#echo $vsql_vacante;
			$rs_vacante = mysqli_query($cn_vacante, $vsql_vacante);
			$num= mysqli_num_rows($rs_vacante); 	
			if ($num > 0)
				{
					$row_vacante = mysqli_fetch_array($rs_vacante, MYSQLI_ASSOC);
					$proceso =  $row_vacante["proceso"];
				}
		}
	#echo $proceso;
	$contador = 0;
	$vsqlproceso = "call zyz_MantenedorProceso ('', '','','','','','','1900-01-01',0,0,0,1,'','','','','D')";		
	#echo $vsqlproceso;
	$vsql = "call zyz_CAMantenedorPostulante ('". $proceso . "', '','','','','','','1900-01-01','','','','','',0,0,'','','','','','','',0,0,0,0,0,'00','00','00','','',0,0,'','1','2','3','4','5','6','7','C')";
	$rs = mysqli_query($cn,	$vsql);
	#echo $vsql; 
?>

<form method="post">
<table class="table">
 	<tr>
    	<td colspan="2">
        	<table width="100%">
            	<tr>
                	<td width="6%">                    
        				<strong>Proceso:</strong>
                    </td>
                    <td align="right">
                    <?php MostrarComboJuanc("cboProceso",$vsqlproceso,$proceso); ?>
                    </td>
                </tr>
            </table>
      	</td>																																									
  	</tr>		
    <tr>
    	<td width="50%">
        	<strong>Leyenda: </strong>
            <i class="fa fa-key"></i> Reiniciar Clave 
            &nbsp;&nbsp;
            <i class="fa fa-envelope"></i> Enviar correo usuario
        </td>
    	<td align="right">
        	<!--
   		 	<a href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_post_imprimir.php?codigo=<?php echo $proceso ?>')">
            <i class="fa fa-print squre semiround icon_size4 " style="border-color: #006;color: #006;"></i>
            </a>
            -->
            <?php
            #echo '<a class="btn btn-default" rel="nolink" href="adm_proceso_reiniciar.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.base64_encode(base64_encode($proceso)).'" data-mensaje="Esta seguro de reiniciar las claves?"><i class="fa fa-key"></i></a>';
             #echo '</a>';
			 echo '&nbsp;';
			 #$tip = 'J'.$proceso.'0000000';
			 #$tip = base64_encode(base64_encode($tip));
			 #echo '<a class="btn btn-default" rel="nolink" href="admi_enviar_email_examen_usuario.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&clave='.$tip.'" data-mensaje="Esta seguro de enviar email"><i class="fa fa-heart"></i></a>';
			 #echo '&nbsp;';
			 #echo '<a class="btn btn-default" rel="nolink" href="admi_enviar_email_examen.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&clave='.$tip.'" data-mensaje="Esta seguro de enviar email"><i class="fa fa-heart-o"></i></a>';
			 #echo '&nbsp;';
			 ?>
             <!--
            <a class="btn btn-default" href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_pago_excel_imprimir.php?codigo=<?php echo $proceso ?>')">
            	<i class="fa fa-money"></i>
            </a>
            -->
            &nbsp;
            <a class="btn btn-default" href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_post_imprimir.php?codigo=<?php echo $proceso ?>')">
            	<i class="fa fa-print"></i>
            </a>
            &nbsp;
            <a class="btn btn-default" href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_post_excel_imprimir.php?codigo=<?php echo $proceso ?>')">
            	<i class="fa fa-cogs"></i>
            </a>
        </td>
    </tr>																	
</table>					
</form>
<table class="table table-striped">
	<thead>
        <tr>
        	<th width="4%" style="text-align: center">
                <strong>Nro.</strong>
            </th>
            <th width="5%" style="text-align: center">
                <strong>DNI</strong>
            </th>

			<th width="5%" style="text-align: center">
                <strong>Tel.</strong>
            </th>

            <th style="text-align: center">
                <strong>Apellidos y Nombres</strong>
            </th>
            <th width="8%" style="text-align: center">
                <strong>Clave</strong>
            </th>
            <th width="8%" style="text-align: center">
                <strong>Email</strong>
            </th>
            <th width="14%" style="text-align: center">
                <strong>Escuela</strong>
            </th>
            <!--
            <th width="3%" style="text-align: center">
                <strong>Rep</strong>
            </th>
            -->
            <th width="20%" style="text-align: center">                          
            	 <a class="btn btn-default" href="adm_inscripcion_nuevo.php?d=<?php echo $_REQUEST['d']?>&nav=<?php echo base64_encode(base64_decode($_REQUEST['nav']).',Nuevo')?>&proceso=<?php echo $proceso ?>">
            	<i class="fa fa-file-o"></i>
            	</a>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php							
    while ($rsjk=mysqli_fetch_row($rs))
        {
            echo '<tr>';
			    $contador = $contador + 1;
				if ($rsjk[8]==1)
					{
						echo '<td style="background-color:#A9B4FE;font-style:10px;text-align: center">';
                    	echo $contador;
						if ($rsjk[11]==1)
							{	
								echo '<sub>';	
								echo '<span style="font-style:9px;font-weight:bold; color:#F30">';
									echo ' Em';
								echo '</span>';
								echo '</sub>';
							}	
						if ($rsjk[12]==1)
							{	
								echo '<sub>';	
								echo '<span style="font-style:9px;font-weight:bold; color:#F30">';
									echo ' Dj';
								echo '</span>';
								echo '</sub>';
							}		
                		echo '</td>';
					}
				elseif ($rsjk[8]==0)
					{
						echo '<td style="background-color:#FCCAAB;text-align: center">';
                    	echo $contador;
						if ($rsjk[11]==1)
							{	
								echo '<sub>';	
								echo '<span style="font-style:9px;font-weight:bold; color:#F30">';
									echo ' Em';
								echo '</span>';
								echo '</sub>';
							}	
						if ($rsjk[12]==1)
							{	
								echo '<sub>';	
								echo '<span style="font-style:9px;font-weight:bold; color:#F30">';
									echo ' Dj';
								echo '</span>';
								echo '</sub>';
							}		
                		echo '</td>';
					}	
				
								 			
				echo '<td align="left" style="font-size:11px;">';
					    #$codigo=base64_encode(base64_encode($rsjk[5]));
						#echo '<a href="foto.php?code='.md5(md5($codigo));
						#echo '&d='.$_GET['d'].'&nav='.$nav;
						#echo '&proceso='.$proceso;
						#echo '&cc='.$codigo.'">';
						echo $rsjk[5];
						#echo '</a>';					
                echo '</td>';

				echo '<td align="left">';
                    echo "<a href='#' onclick=\"verTelefono('{$rsjk[5]}', '{$rsjk[9]}', '{$rsjk[3]}');\">ver</a>";
                echo '</td>';

				echo '<td align="left">';
                    echo $rsjk[2];
                echo '</td>';
				echo '<td align="left" style="font-size:12px;">';
					echo '<span style="color:#393;font-weight:bold;">';
                    echo $rsjk[9];
					echo '</span>';
                echo '</td>';
				echo '<td align="left" style="font-size:10px;">';
                    echo $rsjk[10];
                echo '</td>';
				echo '<td align="left" style="font-size:11px;">';
                    echo $rsjk[3]; //esto es la escuela profesional 
                echo '</td>';
				#echo '<td align="center" style="font-size:11px;">';
   					#echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/adm_post_total.php?codigo='.$rsjk[0].$rsjk[1].'\')">';
					#echo '<i class="fa fa-print" style="border-color: #066;color: #066;"></i>';
					#echo '</a>';
					#echo '&nbsp;'; 
					#echo '&nbsp;';
					#echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/adm_post_total_pdf.php?codigo='.$rsjk[0].$rsjk[1].'\')">';
            		#echo '<i class="fa fa-print" style="border-color: #66CC99;color: #66CC99;"></i>';
					#echo '</a>';
                #echo '</td>';	
				echo '<td align="center">';   
					$tipex = 'K'.$rsjk[0].$rsjk[1];
					$tipex = base64_encode(base64_encode($tipex));
               		echo '<a class="btn btn-default" href="adm_inscripcion_modificar.php?d='. $_REQUEST['d'].'&nav='.base64_encode(base64_decode($_REQUEST['nav']).',Modificar').'&codigo='.$rsjk[0].$rsjk[1].'"><i class="fa fa-edit"></i></a>';
                    echo '&nbsp;';
					echo '<a class="btn btn-default" rel="nolink" href="adm_inscripcion_reiniciar.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$rsjk[0].$rsjk[1].'" data-mensaje="Esta seguro de cambiar la clave del postulante?"><i class="fa fa-key"></i></a>';                   
					echo '&nbsp;';
					
					 echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/admi_enviar_email_examen_usuario.php?clave='.$tipex.'\')">';
            		echo '<i class="fa fa-envelope" style="border-color: #006;color: #006;"></i>';
					echo '</a>';					
					###echo '<a class="btn btn-default" rel="nolink" href="admi_enviar_email_examen_usuario.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&clave='.$tipex.'" data-mensaje="Esta seguro de enviar email"><i class="fa fa-envelope"></i></a>';
					 echo '&nbsp;';
					 #echo '<a class="btn btn-default" rel="nolink" href="admi_enviar_email_examen.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&clave='.$tipex.'" data-mensaje="Esta seguro de enviar email"><i class="fa fa-heart-o"></i></a>';
					 echo '&nbsp;';
                    echo '<a class="btn btn-default" rel="nolink" href="adm_inscripcion_eliminar.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$rsjk[0].$rsjk[1].'" data-mensaje="Esta seguro de eliminar el registro?"><i class="fa fa-ban"></i></a>';
                    #echo '</a>';    
                echo '</td>';																																							
            echo '</tr>';
        }
        mysqli_close($cn);
    ?>		
    </tbody>								
</table>
<script>$('#cboProceso').css('width','100%')</script>

<script>

	const URL_AJAX = "../ajax_tel.php"

	function reload_location(){
		setTimeout(() => {
			location.reload()
		}, 1500);
	}

	function verTelefono(user, clave, escuela){
		event.preventDefault();
		console.log("user: ",user, ". Clavel: ", clave);
		// alert($id)


		fetchKev('post',
				{proceso:'0020',user ,clave},
				function(x){
					console.log(x)
					postulante = x.data

					const val = postulante.validado==0?1:0;
					const bg_btn = postulante.validado==0?'btn-danger': 'btn-primary';
					const msj_btn = postulante.validado==0?'FALTA VALIDAR :(': 'YA ESTÁ VALIDADO :D';

					msj_texto = `
						<a class="btn btn-default ${bg_btn}" data-eliminar="NO" rel="nolink" href="javascript:ventanaSecundaria('<?=GL_DIR_WS_HTTP_APP?>zet/adm_inscripcion_validar.php?d=<?=$_REQUEST['d']?>&nav=<?=$_REQUEST['nav']?>&codigo=${postulante.proceso}${postulante.postulante}&val=${val}')" data-mensaje="Esta seguro de validar el usuario?" onclick="reload_location();"> 
							${msj_btn}
						</a>
						<br>
						... <br>
						celular: <strong>${postulante.celular} </strong> <br>
						... <br>
						Nombre: <strong>${postulante.nombrecompleto} </strong> <br>
						... <br>
						dni: <strong>${postulante.numerodocumento} </strong> <br>
						password: <strong>${postulante.clavel} </strong> <br>
						correo: <strong>${postulante.email} </strong> <br>
						carrera: <strong>${escuela} </strong> <br>
						... <br>
						Documentos:	${x.pdf} <br>
						... <br>
						firma: ${x.firma} <br>
						... <br>
						postulante: ${x.postulante} <br>
						... <br>
						dni: ${x.dni} <br>
						... <br>
						voucher: ${x.voucher} <br>
						... <br>
					`;
					mensaje_alerta(msj_texto);
				}, 
				URL_AJAX
		);

	}




//ALERT SWEETT
function mensaje_alerta(texto){
	Swal.fire({
		title: 'Datos Postulante!',
		html: `${texto}`,
		icon: 'info',
		confirmButtonText: 'ACEPTAR'
	})
}	



//FETCH MODIFICADOS
//-----------------------------
/**
* 
* @param {String} meth Que puede ser 'POST' o 'GET'
* @param {Object} jsonData Datos que se enviarán al servidor para que sena procesados
* @param {Function} fnRquest Aquí se tratarán los datos devueltos del servidor
*/
function fetchKev(meth, jsonData, fnRquest, urlProcess){
	let formData = new FormData();

	formData.append("data", JSON.stringify(jsonData));

	fetch(urlProcess,{
		method: meth,
		body: formData
	}).then( data => data.json())
	.then(data => {
		fnRquest(data);
	})
}

</script>
