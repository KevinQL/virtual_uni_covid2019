<?php 
	require_once("zet_seg.php");
	$cn_zet = conectar();
	$cn_vacante = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	$vsql = "call zyz_Admi_ParametrosGenerales ('','1900-01-01','1900-01-01',1,0,'C')";
	#echo $vsql;
	$rs = mysqli_query($cn_zet,	$vsql);			
	$rsjk = mysqli_fetch_row($rs);	
	$proceso = $rsjk[0];
	$fechainicio = $rsjk[1];
	$horainicio = $rsjk[2];
	$fechafin = $rsjk[3];
	$horafin = $rsjk[4];
	$activo = $rsjk[5];
	$modoexamen = $rsjk[6];
	
	$vsqlproceso = "call zyz_MantenedorProceso ('', '','','','','','','1900-01-01',0,0,0,1,'','','','','W')";		
?>
<form  name="form" method="post" id="frmcronmod" action="admi_parametro_grabar.php?d=<?php echo $_GET['d']?>&nav=<?php echo $_GET['nav']?>" onsubmit="grabar(this.id);return false;">							
<table class="table">
    <tr>
        <td width="12%">
            <strong>Proceso:</strong>
        </td>
        <td>
            <?php MostrarComboZet("cboProceso",$vsqlproceso,$proceso,'Si'); ?>
        </td>
    </tr>							
    <!--						
    <tr>
        <td>
            <strong>Fecha Inicio:</strong>
        </td>
        <td>
            <input name="txtFechaInicio" type="text" value=<?php echo $fechainicio; ?> maxlength="10">
        </td>
    </tr>
    <tr>
        <td>
            <strong>Hora Inicio:</strong>
        </td>
        <td>
            <input name="txtHoraInicio" type="text" value=<?php echo $horainicio; ?>  maxlength="5">
        </td>
    </tr>    
    <tr>
        <td>
            <strong>Fecha Fin:</strong>
        </td>
        <td>
            <input name="txtFechaFin" type="text" value=<?php echo $fechafin; ?> maxlength="10">
        </td>
    </tr>
    <tr>
        <td>
            <strong>Hora Fin:</strong>
        </td>
        <td>
            <input name="txtHoraFin" type="text" value=<?php echo $horafin; ?>  maxlength="5">
        </td>
    </tr>      
    -->	
    <tr>
        <td>
            <strong>Activo:</strong>								
        </td>
        <td>
            <input name="chkActivo" type="checkbox" id="chkActivo" onclick="this.value=gEsCasillaActiva(this.id);" value="<?php echo $activo?>" <?php if ($activo==1) {echo "checked";} ?>>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Modo examen:</strong>								
        </td>
        <td>
            <input name="chkModoExamen" type="checkbox" id="chkModoExamen" onclick="this.value=gEsCasillaActiva(this.id);" value="<?php echo $modoexamen?>" <?php if ($modoexamen==1) {echo "checked";} ?>>
        </td>
    </tr>																																							
    <tr>
        <td align="center" colspan="2">
            <input name="txtTipo" type="hidden" value="A">
            <input name="cmdGrabar" type="submit" value="Grabar"  class="btn btn-primary">
        </td>										  
    </tr>	
    <?php mysqli_close($cn);?>
</table>								
</form>
<script>$('#cboProceso').css('width','100%')</script>
<script>
function gEsCasillaActiva(idCasilla) {
    if (!document.getElementById(idCasilla)) {
        alert("El objeto no existe.\ngVerificaCasilla()");
    }
    return document.getElementById(idCasilla).checked ? "1" : "0";
}
</script>