<?php 
	$cn_zet = conectar();
	require_once("zet_seg.php");
	if (isset($_POST['cboProceso'])) 
		{
			$proceso = $_POST["cboProceso"];
			$canal = $_POST["cboCanal"];
		}
	elseif (isset($_GET['codigo'])) 
		{
			$codigo = $_GET["codigo"];
			$proceso = substr($codigo,0,4);
			$canal = substr($codigo,4,2);
		}
	else
		{
			#echo 'hola';
			$proceso = procesodefecto();
			#$canal = '01';
			$vsqltipoexamen="select canal, descripcion from admi_canal where activo=1 order by descripcion limit 1";
			#echo $vsqltipoexamen;
			$rs_zet  = mysqli_query($cn_zet, $vsqltipoexamen);	
			$rsjk_zet = mysqli_fetch_row($rs_zet);	
			$canal = $rsjk_zet[0];	
		}
	
	#echo 'hola';
	#echo procesodefecto();	
	#echo $proceso;
	#echo 'hola';
	#echo $canal;
	$vsqlproceso = "call zyz_MantenedorProceso ('', '','','','','','','1900-01-01',0,0,0,1,'','','','','W')";	
	$vsqlcanal = "select canal, descripcion from admi_canal where activo=1;";		
	$vsql = "call zyz_Admi_Estructura ('". $proceso . "','". $canal . "','','',0,0,'C')";
	#echo $vsql;		
	$rs = mysqli_query($cn,	$vsql);			
	$contador = 0;
	$total = 0;
?>
<form method="post">
<table width="100%">
    <tr>
        <td width="8%">
            <strong>Proceso:</strong>
        </td>
        <td>
            <?php MostrarComboJuanc("cboProceso",$vsqlproceso,$proceso); ?>
        </td>											
    </tr>
    <tr>
        <td>
            <strong>Canal:</strong>
        </td>
        <td>
            <?php MostrarComboJuanc("cboCanal",$vsqlcanal,$canal); ?>
        </td>											
    </tr>
</table>
<br>
</form>
<table class="table table-striped">
	<thead>
    <tr>
        <th width="5%" style="text-align: center">
            <strong>C&oacute;digo</strong>
        </th>
        <th style="text-align: center">
            <strong>Descripci&oacute;n</strong>
        </th>
        <th width="8%" style="text-align: center">
            <strong>Preguntas</strong>
        </th>
        <th width="8%" style="text-align: center">
            <strong>Orden</strong>
        </th>																				
        <th width="10%" style="text-align: center">
            <a class="btn btn-default" href="admi_estructura_nuevo.php?code=<?php md5(md5($usuario))?>&d=<?php echo $_REQUEST['d']?>&nav=<?php echo base64_encode(base64_decode($_REQUEST['nav']).',Nuevo')?>&codigo=<?php echo $proceso.$canal ?>"><i class="fa fa-file-o"></i></a>
        </th>
    </tr>
    </thead>
    <?php								
	$total = 0;		
    while ($rsjk=mysqli_fetch_row($rs))
        {
            $contador = $contador + 1;
            echo '<tr>';
                echo '<td align="center">';
                    echo $rsjk[0];
                echo '</td>';
                echo '<td align="left">';
                    echo $rsjk[1];
                echo '</td>';
				echo '<td align="right">';				
					$total = $total + $rsjk[2];
                    echo $rsjk[2];
                echo '</td>';
				echo '<td align="right">';
                    echo $rsjk[3];
                echo '</td>';					
                echo '<td align="center">';	
					echo '<a class="btn btn-default" rel="nolink" href="admi_estructura_eliminar.php?codigo='.base64_encode(base64_encode($rsjk[4])).'&d='. $_REQUEST['d'].'&nav='.$_REQUEST['nav'].'" data-mensaje="Esta seguro de eliminar el registro?"><i class="fa fa-ban"></i>';
                    echo '</a>';																								
                echo '</td>';																																													
            echo '</tr>';
        }
        mysqli_close($cn);
    ?>						
    <tr>	
    	<td colspan="2" align="right">
        	<strong>
            TOTAL
            </strong>
        </td>
        <td align="right">
        	<strong>
            <?php echo $total;?>
            </strong>
        </td>
        <td colspan="2">&nbsp;
        	
        </td>
    </tr>				
</table>
<script>$('#cboProceso').css('width','100%')</script>