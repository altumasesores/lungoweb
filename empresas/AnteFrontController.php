<?php //header('Access-Control-Allow-Origin: *');
require_once('class.AdminError.php');
require_once 'libs/php/sistema/FechasFormatoDate.php';
require_once 'libs/php/autoload/autoload.php';
//Incluimos algunas clases:
require_once 'libs/php/mvc/ConfigBD.php'; //de configuracion
require_once 'mod_login/libs/php/mvc/FrontControllerLogin.php';



       




if(isset($_GET['controlador'])){
$controllerName = $_GET['controlador'] ;
}
elseif(isset($_POST['controlador'])){
$controllerName = $_POST['controlador'] ;
}

if(!empty($controllerName))
{
	$controllerName="FrontController".$controllerName."::main();";
	
}else
{
	$controllerName="FrontControllerLogin::main();";
	
}


eval($controllerName);

?> 
