<?php

class FrontControllerPromocion
{
	
	static function main()
	
	{
		require 'mod_promocion/libs/php/mvc/configPromocion.php'; //Archivo con configuraciones,cargado manualmente(no es clase)	
		
		//Detectamos el controlador a buscar.
		if(isset($_GET['controlador']))
		{
			$controllerName = $_GET['controlador'] . 'Controller';			
			}
			elseif(isset($_POST['controlador']))
			{
				$controllerName = $_POST['controlador'] . 'Controller';				
				}
				else{
                    echo "
					<script>
					jAlert('Error: no se recibio el controlador','Error');					
					</script>";
				} 
				
		//Detectamos la accion.
		if(isset($_GET['accion']))
		{
			$actionName = $_GET['accion'];					
			}
			elseif(isset($_POST['accion']))
			{
				$actionName = $_POST['accion'];
				}
				else{
                    echo "
					<script>
					jAlert('Error: no se recibio la acción','Error');					
					</script>";
				}
				
		//una vez que tenemos el controlador y la accion a cargar, creamos la instancia para ejecutar la accion solicitada.
		//el autoload se encarga de cargar  cualquier clase solicitada, sin necesidad del requires o includes.				
		$controller = new $controllerName();					
		$controller->model();
				
				if(method_exists($controller, $actionName)) {
					
					if(isset($_GET) && !empty($_GET))//si hay get
					{
						$controller->$actionName($_GET);
						}
						elseif(isset($_POST) && !empty($_POST))//si hay post
						{
							$controller->$actionName($_POST);
							}
							else//si get y post estan vacios							
							{
								$controller->$actionName();
								}
				}
				else
				{
					
					echo "
					<script>
					jAlert('Error: no se encontro la accion solicitada: $actionName','Error');								
					</script>";
					
				}
				
}
}

?>
