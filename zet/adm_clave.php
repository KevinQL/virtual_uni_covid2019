<?php	
	$cn = conectar();	
	$cn_vacante = conectar();
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
	$a=$proceso.'A';
	$a=base64_encode(base64_encode($a));
	$b=$proceso.'B';
	$b=base64_encode(base64_encode($b));
?>
<form method="post">
<table class="table">
 	<tr>
    	<td width="8%">
        	<strong>Proceso:</strong>
      	</td>
      	<td>
        	<?php MostrarComboJuanc("cboProceso",$vsqlproceso,$proceso); ?>
      	</td>																																									
  	</tr>																			
</table>					
</form>
<div class="alert alert-success">
	<span class="semi-bold">Opciones:</span>
</div>
<ul class="list-group">
     <li class="list-group-item">
        <a href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_clave_imprimir.php?codigo=<?php echo $a ?>')">
        Examen tipo A
        </a> 
    </li>
    <li class="list-group-item">
        <a href="javascript:ventanaSecundaria('<?php echo GL_DIR_WS_HTTP_APP?>zet/adm_clave_imprimir.php?codigo=<?php echo $b ?>')">
        Examen tipo B
        </a> 
    </li>
</ul>
<script>$('#cboProceso').css('width','100%')</script>
