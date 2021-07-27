<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php 
	include_once(GL_DIR_FS_APP.'funciones/admi_fun_admision.php');
	$cn_zyz = conectar();
	$cn_zoz = conectar();
	$cn_zuz = conectar();
	$est = base64_decode(base64_decode($_GET["est"]));
	#echo $est;
	#exit;
	#$for ($i = 1; $i <= 10000; $i++) {
	#	echo ' -'.$i.'- ';
	 #   echo rand();
	#	echo '&nbsp;';
	#}
	
	if ($est=='iniciar')
		{
			$vsql = "call zyz_Admi_Parametros ('". $persona . "','". $usuario . "','". $proceso . "','G')";
			#echo $vsql;
			#exit;
			mysqli_query($cn_zyz, $vsql) or die (mysql_error());
			mysqli_close($cn_zyz);
		}
	#mysqli_query($cn_zuz,"SET CHARACTER SET utf8");
	#mysqli_query($cn_zuz,"SET NAMES utf8");
	$vsql = "call zyz_Admi_Parametros ('". $persona . "','". $usuario . "','". $proceso . "','C')";
	#echo $vsql;
	$rs = mysqli_query($cn_zoz,	$vsql);			
	$rsjk = mysqli_fetch_row($rs);		
	$mensaje = $rsjk[0];
	$pasa = $rsjk[1];
	$total = $rsjk[0];
	#echo $mensaje;
	#echo $pasa;
	#echo $total;
	####################################
	#####Mostrar pregunta
	####################################
	$vsql = "call zyz_Admi_Parametros ('". $persona . "','". $usuario . "','". $proceso . "','P')";
	#echo $vsql;
	$rs_zuz = mysqli_query($cn_zuz,	$vsql);			
	$rsjk_zuz = mysqli_fetch_row($rs_zuz);		
	$banco = $rsjk_zuz[0];
	$tipo = $rsjk_zuz[1];
	$subtipo = $rsjk_zuz[2];
	$descripcion = $rsjk_zuz[3];
	#################################
	#################################
	$claveA = $rsjk_zuz[4];
	$claveB = $rsjk_zuz[5];
	$claveC = $rsjk_zuz[6];
	$claveD = $rsjk_zuz[7];
	$claveE = $rsjk_zuz[8];
	$segundos = $rsjk_zuz[12];
	$hora = $rsjk_zuz[13];
	$fechafinal = $rsjk_zuz[14];
	
	#echo $segundos;
	#$fechafinal = 'May 23 2020 09:30:00 GMT-0500';
	#echo $fechafinal;
	
	$aleatorio = rand(1,5);
	#echo $aleatorio;
	
	if ($aleatorio == 1)
		{
			#EDCBA
			$pre1 = $claveE;
			$val1 = 'E';
			
			$pre2 = $claveD;
			$val2 = 'D';
			
			$pre3 = $claveC;
			$val3 = 'C';
			
			$pre4 = $claveB;
			$val4 = 'B';
			
			$pre5 = $claveA;
			$val5 = 'A';
		}
	elseif ($aleatorio == 2)
		{
			#CABED
			$pre1 = $claveC;
			$val1 = 'C';
			
			$pre2 = $claveA;
			$val2 = 'A';
			
			$pre3 = $claveB;
			$val3 = 'B';
			
			$pre4 = $claveE;
			$val4 = 'E';
			
			$pre5 = $claveD;
			$val5 = 'D';
		}
	elseif ($aleatorio == 3)
		{
			#DEBAC
			$pre1 = $claveD;
			$val1 = 'D';
			
			$pre2 = $claveE;
			$val2 = 'E';
			
			$pre3 = $claveB;
			$val3 = 'B';
			
			$pre4 = $claveA;
			$val4 = 'A';
			
			$pre5 = $claveC;
			$val5 = 'C';
		}
	elseif ($aleatorio == 4)
		{
			#BCEAD
			$pre1 = $claveB;
			$val1 = 'B';
			
			$pre2 = $claveC;
			$val2 = 'C';
			
			$pre3 = $claveE;
			$val3 = 'E';
			
			$pre4 = $claveA;
			$val4 = 'A';
			
			$pre5 = $claveD;
			$val5 = 'D';
		}
	elseif ($aleatorio == 5)
		{
			#BCEAD
			$pre1 = $claveB;
			$val1 = 'B';
			
			$pre2 = $claveC;
			$val2 = 'C';
			
			$pre3 = $claveE;
			$val3 = 'E';
			
			$pre4 = $claveA;
			$val4 = 'A';
			
			$pre5 = $claveD;
			$val5 = 'D';
		}

	#echo $aleatorio;
	#################################
	##################################
	$numero = $rsjk_zuz[9];
	$estado = $rsjk_zuz[11];
	$total = $rsjk_zuz[10];
	$ver = $tipo.$subtipo;
	$nombretiposubtipo = nombretiposubtipo($ver);
	#echo $estado;
	if ($pasa==0)
		{
			echo '<div class="alert alert-danger">';
				echo '<strong style="font-size:17px">Aviso: </strong>';
				echo '<span style="font-size:16px">'.$mensaje.'</span>';
			echo '</div>';
		}
	elseif ($pasa==1)
		{
			echo '<div class="alert alert-info">';
				echo '<strong style="font-size:17px">Aviso: </strong>';
				echo '<span style="font-size:16px">'.$mensaje.'</span>';
			echo '</div>';
		}		
	if ($estado==0)
		{
			$mensaje1 = 'EL EXAMEN HA FINALIZADO';
			echo '<div class="alert alert-danger">';
				echo '<strong style="font-size:17px">Aviso: </strong>';
				echo '<span style="font-size:16px">'.$mensaje1.'</span>';
			echo '</div>';
		}
	elseif ($estado==1)
		{
			$button = 'SIGUIENTE';
		}
	elseif ($estado==2)
		{
			$button = 'FINALIZAR';
		}
?>

<form  name="form" method="post" id="frmcronmod" action="admi_mp_grabar.php?d=<?php echo $_GET['d']?>&nav=<?php echo $_GET['nav']?>">
<!-- onsubmit="$('input[type=submit]').remove();grabar(this.id);return false;" -->
<?php
	if (($estado==1 or $estado==2) and $pasa==1)
		{
			echo '<table width="100%">';				
    			echo '<tr>';
					echo '<td align="right">';	
						echo '<span style="font-size:16px;font-weight:bold">TIEMPO RESTANTE: </span>';
						echo '<span id="hora" style="font-size:16px;font-weight:bold">';						
						echo '</span>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
			echo '<table width="100%">';
				echo '<tr>';
        			echo '<td align="right">';
						echo '<progress value="'.$numero.'" max="'.$total.'"></progress>';
						echo '&nbsp;&nbsp;&nbsp;&nbsp;';
						echo '<strong style="font-size:16px;">';
						echo $numero;
						echo ' de ';
						echo $total;
						echo '</strong>';
        			echo '</td>';
    			echo '</tr>';
			echo '</table>';
			echo '<table width="100%">';
    			echo '<tr>';
        			echo '<td width="4%" style="vertical-align:top" align="center">';
						echo '<strong style="color:#930;font-size:15px;">'.$numero.'.- </strong>';
        			echo '</td>';
    				echo '<td>';
							echo $descripcion;
        			echo '</td>';
    			echo '</tr>';
				echo '<tr>';
        			echo '<td colspan="2">';
						mostrarfoto_pregunta($banco);        			
        			echo '</td>';
    			echo '</tr>';
			echo '</table>';
			echo '<table class="table">';
				echo '<tr height="50">';
					echo '<td width="6%">';
						echo '<input name="oiga" type="radio" value="'.$val1.'" /> <strong style="color:#930">a)</strong>';
					echo '</td>';
					echo '<td>';
						echo $pre1;
					echo '</td>';
				echo '</tr>';
				echo '<tr height="50">';
					echo '<td>';
						echo '<input name="oiga" type="radio" value="'.$val2.'" /> <strong style="color:#930">b)</strong>';
					echo '</td>';
					echo '<td>';
						echo $pre2;
					echo '</td>';
				echo '</tr>';
				echo '<tr height="50">';
					echo '<td>';
						echo '<input name="oiga" type="radio" value="'.$val3.'" /> <strong style="color:#930">c)</strong>';
					echo '</td>';
					echo '<td>';
						echo $pre3;
					echo '</td>';
				echo '</tr>';
				echo '<tr height="50">';
					echo '<td>';
						echo '<input name="oiga" type="radio" value="'.$val4.'" /> <strong style="color:#930">d)</strong>';
					echo '</td>';
					echo '<td>';
						echo $pre4;
					echo '</td>';
				echo '</tr>';
				echo '<tr height="50">';
					echo '<td>';
						echo '<input name="oiga" type="radio" value="'.$val5.'" /> <strong style="color:#930">e)</strong>';
					echo '</td>';
					echo '<td>';
						echo $pre5;
					echo '</td>';
				echo '</tr>';
			echo '</table>';   
			echo '<table width="100%">';																	
				echo '<tr>';
					echo '<td align="center">';
						$cod = base64_encode(base64_encode($banco));
						$per = base64_encode(base64_encode($persona));
						$usu = base64_encode(base64_encode($usuario));
						$ale = base64_encode(base64_encode($aleatorio));
						echo '<input name="ale" type="hidden" value="'.$ale.'">';
						echo '<input name="cod" type="hidden" value="'.$cod.'">';
						echo '<input name="per" type="hidden" value="'.$per.'">';
						echo '<input name="usu" type="hidden" value="'.$usu.'">';
						echo '<input name="txtTipo" type="hidden" value="U">';
						echo '<input name="cmdGrabar" type="button" onclick="$(this).hide();grabar(\'frmcronmod\');" value="'.$button.'" class="btn btn-primary">';
					echo '</td>';										  
				echo '</tr>';	
			echo '</table>';
		}
?>
</form>
<script type="text/javascript">
		const getRemainTime= deadline=>{/*getRemainTime significa obtener el tiempo faltante*/
        let now= new Date(),/*new Date() nos devuelve la fecha actual*/
         remainTime=(new Date(deadline)-now+1000)/1000,/*remaiTime=new Date(deadline)-now tiempo que falta para 
         llegar está fecha limite nos devuelve en milisegundo y lo dividimos en 1000 para que pasé a segundos*/
         remainSeconds=('0'+Math.floor(remainTime % 60)).slice(-2),/*En segundos, Math.floor pasar 
         numero entero, y slice(-2) hace seleccionar los 2 ultimos digitos*/
         remainMinutes=('0'+Math.floor(remainTime /60 % 60)).slice(-2),
         remainHours=('0'+Math.floor(remainTime /3600 % 24)).slice(-2),/*Cuantos segundos hay 
        en un hora (3600) y cuantas horas hay en un día (24)*/
        remainDays=Math.floor(remainTime / (3600 * 24));/*3600 que tiene una hora y 24 horas que
        tiene un día*/
         return{
          remainTime,
          remainSeconds,
          remainMinutes,
          remainHours,
          remainDays
         }
};
//console.log(getRemainTime('Oct 17 2019 15:26:43 GMT-0600'));
const countdown=(deadline,elem,finalMessage)=>{/*finalMessage mensaje que se va a imprimir
    cuano¿to termine el tiempo*/

    const el=document.getElementById(elem);/**Identificar el elemento*/
    const timerUpdate=setInterval(()=>{/*Crear la función que se va actualizar cada segundo*/
        let t=getRemainTime(deadline);
        el.innerHTML=`${t.remainHours}:${t.remainMinutes}:${t.remainSeconds}`;
		 <!-- el.innerHTML=`${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;-->
        if(t.remainTime<=1){/*Cuando se cumple va a dejar de contar hacia atras*/
        clearInterval(timerUpdate);
        el.innerHTML=finalMessage;
        }
   },1000);/*1000 cada segundo se actualice*/
};
countdown("<?php echo $fechafinal?>","hora","Muchas Gracias");
	</script>






<!-- SCRIPC FOR SUPR CONTROL UNI DASDAS DA SD INIT -->

<script>

//ALERT SWEETT
function mensaje_al_postulante(){
	Swal.fire({
		title: 'No salga del examen!',
		text: '¿Deseas continuar con tu examen?',
		icon: 'warning',
		confirmButtonText: 'ACEPTAR, ya no lo volveré a hacer.',
		footer: '<a href>Se registró una salida del postulate en el registro de la base de datos</a>'
	})
}

//CÓDIGO SUPERVISION ---------- EXAMEN UNAJMA - 2021 ----------------------------------------------------------------

let dni;
let nombre;
let veces = 0 ; 
let contador = 0;
let contador_p = 0; // contador cambio pestaña
let msj_plagio="";

const URL_AJAX = "../ajax_p.php"

//SI CAMBIA DE PESTAÑA EN LA MISMA PÁGINA ---------------------------------------------------------------------------
function handleVisibilityChange() {
	if(contador_p >= 1){
		if (document.hidden) {			
			msj_plagio = document.querySelector(".msj-plagio");
			dni = document.querySelector(".dni_unajma_n2").innerHTML.trim();
			nombre = document.querySelector(".nombre_unajma").innerHTML.trim();
			//nombre = document.querySelector(".nombre_unajma").innerHTML.trim();
			tipo=1;
			fetchKev('post',{proceso:'0020',dni,nombre,tipo},function(x){
				console.log(x)

				msj_plagio.innerHTML = "NO SALGA DE SU EXAMEN!! TP1";
				mensaje_al_postulante();
			}, URL_AJAX)
		} else  {
			// startSimulation();
			//console.log('NO CAMBIO LA PÁGINA')
		}
	}
	contador_p++;

}


setTimeout(() => {
	console.log("Iniciando control 1 de 100");
	//EJECUNTANDO EL VISIBILITY	
	document.addEventListener("visibilitychange", handleVisibilityChange, false);

	//SI MINIMIZA O CAMBIA EL NAVEGADOR -----------------------------------------------------------------------------------
	setInterval( checkPostulanteNav, 1000);	
}, 6000);


function checkPostulanteNav() {
	if ( document.hasFocus() ) {
		// 3 SEGUNDOS FUERA DEL EXAMEN
		if(contador>=4){
			msj_plagio = document.querySelector(".msj-plagio");
			dni = document.querySelector(".dni_unajma_n2").innerHTML.trim();
			nombre = document.querySelector(".nombre_unajma").innerHTML.trim();
			//nombre = document.querySelector(".nombre_unajma").innerHTML.trim();
			tipo = 2;
			fetchKev('post',{proceso:'0020',dni,nombre,tipo},function(x){
				console.log(x)

				msj_plagio.innerHTML = "NO SALGA DE SU EXAMEN!! TP2";
				mensaje_al_postulante();
				contador = 0;
			}, URL_AJAX)
		}
	} else {
		contador++;
		// console.log('SE SALIÓ DEL EXÁMEN')
	}
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

