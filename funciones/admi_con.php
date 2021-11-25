<?php
	function conectar()
	{
		ini_set("display_errors", 0);
		//error_reporting(E_ALL);
		
		// Notificar todos los errores de PHP (ver el registro de cambios)
		
		#$db_host="localhost";
		#$db_name="unajmadm_admision";
		#$db_user="unajmadm_admision";
		#$db_password="carlsen2020";
		#$conection= mysqli_connect($db_host,$db_user,$db_password) or die ("Error conectando a la DB");
		#mysqli_select_db($conection, $db_name) or die ("Error seleccionando la DB");
		#return $conection;
		
		$db_host="localhost";
		$db_name="admision_zet"; //admision_zet   /   admision_respaldo / admision_simulacros 
		$db_user="admision_zet";
		$db_password="carlsen2020";
		$conection= mysqli_connect($db_host,$db_user,$db_password) or die ("Error conectando a la DB");
		mysqli_select_db($conection, $db_name) or die ("Error seleccionando la DB");
		return $conection;
		
		
		#$db_host="localhost";
		#$db_name="admision_zet";
		#$db_user="root";
		#$db_password="juliocesar";
		#$conection= mysqli_connect($db_host,$db_user,$db_password) or die ("Error conectando a la DB");
		#mysqli_select_db($conection, $db_name) or die ("Error seleccionando la DB");
		#return $conection;
	}
function messageError($code) {
	$msg = '';
	switch ($code) {
		case 1305:
			$msg = 'Procedimiento almacenado no existe.';
			break;
		case 1318:
			$msg = 'Numero de argumentos en el procedimiento incorrectos.';
			break;
		case 1061:
			$msg = 'Nombre de clave duplicado.';
			break;
		case 547:
			$msg = 'No se puede eliminar el registro porque se necesitan en otras tablas.';
			break;
		case 1452:
			$msg = 'Algunas claves primarias no existen en las tablas maestras. No se pudo realizar la relación.';
			break;
		case 1062:
			$msg = 'Se esta intentando registrar un dato duplicado.';
			break;
		case 1146:
			$msg = 'La tabla no existe.';
			break;
		case 1054:
			$msg = 'La columna es desconocida.';
			break;
		case 1064:
			$msg = 'Sintaxis incorrecta.';
			break;
		case 1136:
			$msg = 'Numero de columnas no corresponde al numero de campos.';
			break;
		case 1362:
			$msg = 'Error de clave unica.';
			break;
		case 1063 :
			$msg = 'No puede eliminar el registro debido a que está siendo utilizado en otras operaciones.';
			break;
		case 1022:
			$msg = 'Ya existe un registro con este nombre.';
			break;
		case 1005 :
			$msg = 'No se puede crear la tabla.';
			break;
		case 1016  :
			$msg = 'No se puede hallar la tabla.';
			break;
		case 1114  :
			$msg = 'Se ha quedado sin lugar en el espacio de tablas. Se debería reconfigurar el espacio de tablas para agregar un nuevo fichero de datos..';
			break;
		case 1205  :
			$msg = 'Expiró el tiempo de espera para realizar un bloqueo.';
			break;
		case 1213  :
			$msg = 'Se está intentando agregar una fila, pero no hay una fila padre.';
			break;
		case 1006  :
			$msg = 'No puedo crear base de datos.';
			break;
		case 1007 :
			$msg = 'No puedo crear base de datos; la base de datos ya existe.';
			break;
		case 1012 :
			$msg = 'No puedo leer el registro en la tabla del sistema.';
			break;
		case 1014 :
			$msg = 'No puedo acceder al directorio.';
			break;
		case 1020  :
			$msg = 'El registro ha cambiado desde la ultima lectura de la tabla.';
			break;
		case 1021  :
			$msg = 'Disco lleno. Esperando para que se libere algo de espacio.';
			break;
		case 1023 :
			$msg = ' Error en el cierre.';
			break;
		case 1028 :
			$msg = 'Ordeancion cancelada.';
			break;
		case 1037 :
			$msg = 'Memoria insuficiente. Reinicie el servidor e intentelo otra vez.';
			break;
		case 1038 :
			$msg = 'Memoria de ordenacion insuficiente. Incremente el tamano del buffer de ordenacion.';
			break;
		case 1040 :
			$msg = 'Demasiadas conexiones.';
			break;
		case 1044 :
			$msg = 'Acceso negado para usuario. Para la base de datos';
			break;
		case 1045 :
			$msg = ' Acceso negado para usuario.';
			break;
		case 1046 :
			$msg = 'Base de datos no seleccionada.';
			break;
		case 1048  :
			$msg = 'La columna no puede ser nula.';
			break;
		case 1050  :
			$msg = 'La tabla ya existe.';
			break;
		case 1051   :
			$msg = 'Tabla desconocida.';
			break;
		case 1052 :
			$msg = 'La columna no puede ser nula.';
			break;
		case 1053 :
			$msg = 'Desconexion de servidor en proceso.';
			break;
		case 1060 :
			$msg = 'Nombre de columna duplicado.';
			break;
		case 1065 :
			$msg = 'La query estaba vacia.';
			break;
		case 1109  :
			$msg = ' Tabla desconocida.';
			break;
		case 1113 :
			$msg = 'Una tabla debe tener al menos 1 columna.';
			break;
		case 1136 :
			$msg = 'El número de columnas no corresponde al número en la línea.';
			break;
		case 1137   :
			$msg = 'No puedo reabrir tabla.';
			break;
		case 1141  :
			$msg = 'No existe permiso definido para usuario.';
			break;
		case 1048  :
			$msg = 'La columna no puede ser nula.';
			break;
		case 1451:
			$msg = 'No puede eliminar el registro debido a que estan siendo utilizado en otras operaciones.';
			break;
		default:
			$msg = 'Codigo de error: ' . $code . ': 
                        Por favor comun&iacute;que de este problema a la Oficina de Sistemas.';
	}
	}
?>