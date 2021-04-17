<?php
	ob_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
	//Iniciamos la sesion par apoder usar variables de SESSION
	session_start();
	

	//Envio al Sitio
	//Cargamos nuestro archivo Autoload.php que traerá todos los Controladores
	require_once 'autoload.php';
	require_once 'config/db.php';
	require_once 'config/parameters.php';
	require_once 'helpers/utils.php';
	require_once 'helpers/alertas.php';
	

	function error($er){
		$error = new ErrorController();
		return $error->$er();
	}

	////////////////////////////////////////////////////////////
	//Traemos la Parte Superior de Nuestra Plantilla Principal
	require_once 'views/layout/index-top.php';

	//Hago la comprobacion
	if(isset($_GET['controller'])){
		$nombre_controlador = $_GET['controller'].'Controller';
		
		//Comprobamos si la Clase Controlador Existe
		if (class_exists($nombre_controlador)) {
			$controlador = new $nombre_controlador;

			//Comprobamos el método o Acción
			if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
				$action = $_GET['action'];
				$controlador->$action();
			} else {
				error("ErrorMostrarIndex");
			}
		} else {
			error("ErrorMostrarIndex");
		}
	}else{
		error("ErrorMostrarIndex");
	}

	//Traemos la Parte Inferior de Nuestra Plantilla Principal
	require_once 'views/layout/index-footer.php';

	ob_end_flush();
?>