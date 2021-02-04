<?php
	session_start();
	if (!isset($_SESSION["usuario"]))
	{
		header("location:noautorizado.php");
	}			
	include('../funciones/admi_con.php');
	include('../funciones/admi_fun.php');
	$cn = conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	$proceso = $_GET['codigo'];
	$nombreproceso = nombreproceso($proceso);
	$vsql = "call zyz_CACentopreReporte ('". $proceso . "', '', '01')";
	#echo $vsql;
	$rs = mysqli_query($cn, $vsql);
	#mysqli_close($cn);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $vcolacion?>" />
<title>LISTADO GENERAL</title>
<style>
body,th,td,p {
	background-color: #FFFFFF; font-size : 10px; font-family: Arial, Verdana, Helvetica, sans-serif;
	}
.zet10 {
	font-size: 9px;
}
</style>
</head>
<body leftmargin=0 topmargin=0 bgcolor="#ffffff" marginheight=0 marginwidth=0>
<?php 
	$titulo = 'REPORTE GENERAL - CENTRO PRE';
	require ('cabecera_admision.php')
?>
<table class="table">
	<tr>
    	<td width="8%">
        	<strong>Proceso:</strong>
        </td>
        <td>
        	2019-2
        </td>
    </tr>
</table>
<table width="780" border="1">
	<tr>
    	<td width="5%" align="center"><strong>Nro.</strong></td>
    	<td width="9%" align="center"><strong>C&oacute;digo</strong></td>	
    	<td align="center"><strong>Apellidos y Nombres</strong></td>
    	<td width="22%" align="center"><strong>Escuela</strong></td>
        <td width="8%" align="right"><strong>Sum 1(0.4)</strong></td>
        <td width="8%" align="right"><strong>Sum 2(0.6)</strong></td>
    	<td width="8%" align="right"><strong>Puntaje</strong></td>
        <td width="10%" align="center"><strong>Condici&oacute;n</strong></td>
	</tr>
	<?php
	$contador = 0;
	while ($rsjk= mysqli_fetch_row($rs))
	{ 
		$contador = $contador + 1;
		echo '<tr>';
			echo '<td align="center">';
				echo $contador;
			echo '</td>';
			echo '<td align="center">';
				echo $rsjk[0];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[1];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[2];
			echo '</td>';
			echo '<td align="right">';
				echo $rsjk[5];
			echo '</td>';
			echo '<td align="right">';
				echo $rsjk[6];
			echo '</td>';
			echo '<td align="right">';
				echo $rsjk[3];
			echo '</td>';
			echo '<td align="left">';
				echo $rsjk[4];
			echo '</td>';			
		echo '</tr>';			
  	}
	?>  
</table>
</body>
</html>