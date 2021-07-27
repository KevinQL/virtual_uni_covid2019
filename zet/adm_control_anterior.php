<?php 
	require_once("zet_seg.php");
	$cn = conectar();	
	$cn_vacante = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	mysqli_query($cn_vacante,"SET CHARACTER SET utf8");
	mysqli_query($cn_vacante,"SET NAMES utf8");

	$nombreproceso = nombreproceso($proceso);

	$vsql = "call zoz_CAControl ('". $proceso . "', '". $persona . "','',0,'C')";
	$rs = mysqli_query($cn,	$vsql);
	$contador = 0;
	#echo $vsql; 
?>

<form method="post">
<table class="table">
 	<tr>
    	<td colspan="2">
        	<table width="100%">
				<tr>
					<td></td>
					<td>
						<a href="https://examen.admisionunajma.pe/zetadmision/zet/ctrl/index.php?sp=<?=$_SESSION["usuario"]?>" target="_blank">
							<i class="fa fa-window-maximize"></i>
							<span class="dni_unajma text-danger">CONTROL SUPERVISOR</span>
						</a>
					</td>

				</tr>
            	<tr>
                	<td width="6%">                    
        				<strong>Proceso:</strong>
                    </td>
                    <td>
                    	<?php echo $nombreproceso;?>
                    </td>
                </tr>
            </table>
      	</td>																																									
  	</tr>		
    <tr>    	
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
            <a class="btn btn-default" href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_control_imprimir.php?codigo=<?php echo base64_encode(base64_encode($proceso.$persona)) ?>')">
            	<i class="fa fa-print"></i>
            </a>
            &nbsp;
            <a class="btn btn-default" href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_control_excel_imprimir.php?codigo=<?php echo base64_encode(base64_encode($proceso.$persona)) ?>')">
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
                <strong>Nr</strong>
            </th>
            <th width="4%" style="text-align: center">
                <strong>Amb</strong>
            </th>
            <th width="5%" style="text-align: center">
                <strong>DNI</strong>
            </th>
            <th width="5%" style="text-align: center">
                <strong>Clave</strong>
            </th>
            <th style="text-align: center">
                <strong>Apellidos y Nombres</strong>
            </th>
            <!--
            <th width="8%" style="text-align: center">
                <strong>Email</strong>
            </th>
            --->
            <th width="8%" style="text-align: center">
                <strong>Celular</strong>
            </th>
            <th width="14%" style="text-align: center">
                <strong>Escuela</strong>
            </th>
            <th width="5%" style="text-align: center">                          
            	<strong>Ing</strong>
            </th>
            <th width="5%" style="text-align: center">                          
            	<strong>Log</strong>
            </th>
            <th width="5%" style="text-align: center">                          
            	<strong>Sus</strong>
            </th>
            <th width="5%" style="text-align: center">                          
            	<strong>Rep</strong>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php							
    while ($rsjk=mysqli_fetch_row($rs))
        {
            echo '<tr>';
			    $contador = $contador + 1;
				echo '<td align="center">';
                    echo $contador;
                echo '</td>';
				echo '<td align="center">';                    
					echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/adm_ambiente.php?codigo='.$proceso.$rsjk[1].'\')">';
            		echo substr($rsjk[1],3,3);
					echo '</a>';
                echo '</td>';		
				echo '<td align="left" style="font-size:11px;">';
						echo $rsjk[3];				
                echo '</td>';
				echo '<td align="left">';
                    echo $rsjk[16];
                echo '</td>';
				echo '<td align="left">';
                    echo $rsjk[4];
                echo '</td>';
				echo '<td align="left" style="font-size:10px;">';
                    echo $rsjk[6];
                echo '</td>';
				echo '<td align="left" style="font-size:10px;">';
                    echo $rsjk[11];
                echo '</td>';
				echo '<td align="left" style="font-size:10px;">';
					if ($rsjk[13]==1)
						{
							$ing = 'Si';
						}
					else
						{
							$ing = 'No';	
						}
					$code = $rsjk[0].$rsjk[2];
					$code = base64_encode(base64_encode($code));
					$tipo = '1';
                    echo '<a class="btn btn-default" rel="nolink" href="adm_control_ingreso.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$code.'&val='.$rsjk[13].'&tipo='.$tipo.'" data-mensaje="Esta seguro de cambiar el permiso?">';
						echo $ing;
					echo '</a>';
                echo '</td>';
				echo '<td align="left" style="font-size:10px;">';
					if ($rsjk[14]==1)
						{
							$log = 'Si';
						}
					else
						{
							$log = 'No';	
						}
					$tipo = '2';						
                    echo '<a class="btn btn-default" rel="nolink" href="adm_control_ingreso.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$code.'&val='.$rsjk[14].'&tipo='.$tipo.'" data-mensaje="Esta seguro de cambiar el permiso?">';
						echo $log;
					echo '</a>';
                echo '</td>';
				echo '<td align="left" style="font-size:10px;">';
					if ($rsjk[15]==1)
						{
							$sus = 'Si';
						}
					else
						{
							$sus = 'No';	
						}
					$tipo = '3';
                    echo '<a class="btn btn-default" rel="nolink" href="adm_control_ingreso.php?d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'&codigo='.$code.'&val='.$rsjk[15].'&tipo='.$tipo.'" data-mensaje="Esta seguro de cambiar el permiso?">';
						echo $sus;
					echo '</a>';
                echo '</td>';
				echo '<td align="center" style="font-size:11px;">';
   					echo '<a href="javascript:ventanaSecundaria(\''.GL_DIR_WS_HTTP_APP.'zet/adm_control_postulante.php?codigo='.$code.'\')">';
					echo '<i class="fa fa-print" style="border-color: #066;color: #066;"></i>';
					echo '</a>';							
                echo '</td>';																																	
            echo '</tr>';
        }
        mysqli_close($cn);
    ?>		
    </tbody>								
</table>
<script>$('#cboProceso').css('width','100%')</script>
