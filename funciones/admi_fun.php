<?php
function nombretiposubtipo($tiposubtipo)
{
	$cn_tip= conectar();
	$a = substr($tiposubtipo,0,2);
	$b = substr($tiposubtipo,2,2);
	mysqli_query($cn_tip,"SET CHARACTER SET utf8");
	mysqli_query($cn_tip,"SET NAMES utf8");
	#mysqli_query($cn,"SET CHARACTER SET utf8");
	#mysqli_query($cn,"SET NAMES utf8");
	$vsql = "select concat(a.descripcion, ' ---> ', b.descripcion) as descripcion from admi_tipo a inner join admi_subtipo b on a.tipo=b.tipo where b.tipo = '". $a. "' and b.subtipo = '". $b. "'  ";
	#echo $vsql;
	$rs = mysqli_query($cn_tip,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombretiposubtipo = $rsjk[0];
	return $nombretiposubtipo;
}

function nombrecanal($canal)
{
	$cn= conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	$vsql = "select descripcion from admi_canal where canal= '". $canal. "'";
	//echo $vsql;
	$rs = mysqli_query($cn,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombrecanal = $rsjk[0];
	return $nombrecanal;
}

function procesodefecto()
{
	$cn_zoz= conectar();
	mysqli_query($cn_zoz,"SET CHARACTER SET utf8");
	mysqli_query($cn_zoz,"SET NAMES utf8");
	$vsql = "select max(proceso) as proceso from adm_proceso where activo=1";
	#echo $vsql;
	$rs = mysqli_query($cn_zoz,$vsql);	
	$num= mysqli_num_rows($rs); 	
	if ($num > 0)
		{
			$rsjk = mysqli_fetch_row($rs);
			$procesodefecto = $rsjk[0];
		}
	else
		{
			$procesodefecto = '0000';	
		}
	
	return $procesodefecto;	
	#echo $procesodefecto;
}

function nombreproceso($proceso)
{
	$cn= conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	$vsql = "select descripcion from adm_proceso where proceso= '". $proceso. "'";
	//echo $vsql;
	$rs = mysqli_query($cn,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombreproceso = $rsjk[0];
	return $nombreproceso;
}

function nombremacro($proceso)
{
	$cn= conectar();
	mysqli_query($cn,"SET CHARACTER SET utf8");
	mysqli_query($cn,"SET NAMES utf8");
	$vsql = "select g.descripcion from adm_proceso p inner join adm_procesogeneral g on p.procesogeneral=g.procesogeneral where p.proceso= '". $proceso. "'";
	#echo $vsql;
	$rs = mysqli_query($cn,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombremacro = $rsjk[0];
	return $nombremacro;
}

function nombreescuela($estructura)
{
	$cn_1= conectar();
	$vsql= "select descripcion from mae_estructura where estructura= '". $estructura. "'";
	#echo $vsql;
	$rs = mysqli_query($cn_1,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombreescuela= $rsjk[0];
	mysqli_close($cn_1);
	return $nombreescuela;
}

function nombremodalidadadmision($modalidadadmision)
{
	$cn_1= conectar();
	$vsql= "select descripcion from adm_modalidadadmision where modalidadadmision= '". $modalidadadmision. "'";
	#echo $vsql;
	$rs = mysqli_query($cn_1,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombremodalidadadmision= $rsjk[0];
	mysqli_close($cn_1);
	return $nombremodalidadadmision;
}

function nombredominio($dominio)
{
	$cn_1= conectar();
	$vsql= "select nombre from men_dominio where dominio= '". $dominio. "'";
	#echo $vsql;
	$rs = mysqli_query($cn_1,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombredominio= $rsjk[0];
	mysqli_close($cn_1);
	return $nombredominio;
}

function nombreperfil($perfil)
{
	$cn_1= conectar();
	$vsql= "select nombre from men_perfil where perfil= '". $perfil. "'";
	#echo $vsql;
	$rs = mysqli_query($cn_1,$vsql);	
	$rsjk = mysqli_fetch_row($rs);
	$nombreperfil= $rsjk[0];
	mysqli_close($cn_1);
	return $nombreperfil;
}

function validar_d($d, $per, $usuario, $perfil)
	{
		$cn_1 = conectar();
		$vsql = "call zoz_Val_Zet ('". $d . "', '". $per . "', '". $usuario . "', '". $perfil . "', 'C')";
		#echo $vsql;
		#exit;
		$rs_lia = mysqli_query($cn_1, $vsql);		
		$rsjk = mysqli_fetch_row($rs_lia);
		$validar_d = $rsjk[0];
		mysqli_close($cn_1);
				
		return $validar_d;
	}

function MostrarComboJuanc($cbname,$vsql,$valor_defecto)
{
	$cn_1= conectar(); 
	mysqli_query($cn_1,"SET CHARACTER SET utf8");
	mysqli_query($cn_1,"SET NAMES utf8");
	$rs = mysqli_query($cn_1, $vsql) or die ("IT: Problema con el query".mysqli_error($cn_1)) ;
	echo "<select name=".$cbname." id=".$cbname." onChange='javascript:recarga(this.form);'>";
	while($row = mysqli_fetch_row($rs)) 
	{
		if ($row[0] == $valor_defecto)
			{echo "<option value=".$row[0]." selected>".$row[1]."</option>";}
		else
		{echo "<option value=".$row[0].">".$row[1]."</option>";}	
	} 
	echo "</select>";
	mysqli_close($cn_1);	
} 

function MostrarComboZet($cbname,$vsql,$valor_defecto,$habilitado)
{
	$cn_1 = conectar(); 
	mysqli_query($cn_1,"SET CHARACTER SET utf8");
	mysqli_query($cn_1,"SET NAMES utf8");

	$rszet = mysqli_query($cn_1, $vsql) or die ("IT: Problema con el query") ;
	if ($habilitado == 'No')
		{
			echo "<select name=".$cbname." disabled>";	
		}
	else
		{
			echo "<select name=".$cbname." id=".$cbname.">";	
		}
	if ('xx' == substr($valor_defecto,0,2))
		{
			echo "<option value='xx' selected>".substr($valor_defecto,2,40)."</option>";
		}
	while($row = mysqli_fetch_row($rszet)) 
	{
		if ($row[0] == $valor_defecto)
			{
				echo "<option value=".$row[0]." selected>".$row[1]."</option>";			
			}
		else
			{
				echo "<option value=".$row[0].">".$row[1]."</option>";
			}	
	} 
	echo "</select>";
	mysqli_close($cn_1);
} 

function MostrarCombo2($cbname,$vsql,$valor_defecto)
{
	#echo $vsql;
	$cn_1= conectar();
	mysqli_query($cn_1,"SET CHARACTER SET utf8");
	mysqli_query($cn_1,"SET NAMES utf8");
	$rs = mysqli_query($cn_1, $vsql) or die ("IT: Problema con el query") ;
	echo "<select name=".$cbname." id=".$cbname.">";	
	while($row = mysqli_fetch_row($rs)) 
	{
		if (trim($row[0]) == trim($valor_defecto))
		{echo "<option value=".$row[0]." selected>".$row[1]."</option>";}
		else
		{echo "<option value=".$row[0].">".$row[1]."</option>";}
		
	} 
		echo "</select>";
		mysqli_close($cn_1);
} 

function nombremes($mes)
{
	if ($mes == '01')
		{
			$nombremes = 'enero';
		}
	elseif ($mes == '02')
		{
			$nombremes = 'febrero';
		}
	elseif ($mes == '03')
		{
			$nombremes = 'marzo';
		}
	elseif ($mes == '04')
		{
			$nombremes = 'abril';
		}
	elseif ($mes == '05')
		{
			$nombremes = 'mayo';
		}
	elseif ($mes == '06')
		{
			$nombremes = 'junio';
		}
	elseif ($mes == '07')
		{
			$nombremes = 'julio';
		}
	elseif ($mes == '08')
		{
			$nombremes = 'agosto';
		}
	elseif ($mes == '09')
		{
			$nombremes = 'setiembre';
		}
	elseif ($mes == '10')
		{
			$nombremes = 'octubre';
		}
	elseif ($mes == '11')
		{
			$nombremes = 'noviembre';
		}
	elseif ($mes == '12')
		{
			$nombremes = 'diciembre';
		}
	return $nombremes;
}



?>