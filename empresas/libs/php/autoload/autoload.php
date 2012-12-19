<?php
function __autoload($classname)
{
	//recibimos el nombre del modulo donde se buscarán las librerías
	if(isset($_GET['modulo']))
	{
		$modulo="mod_".$_GET['modulo']."/";
		}
		elseif(isset($_POST['modulo']))
		{
			$modulo="mod_".$_POST['modulo']."/";
			}else{
				$modulo="";
				}
			
				
	
				
	//directorios a evaluar	
	//libreriasSistema y libreriasModulo pueden extenderse segun las librerias que se manejen.
	$sistema=array(
				"libreriasSistema"=>array(
				//deben organizar en directorios en este nivel, no debe haber archivos sueltos.
				                       "mvc"=>"libs/php/mvc/"
				                          ),
				"controladores"=>$modulo."controller/",
				"modelos"=>$modulo."model/",
				"libreriasModulo"=>array(
				//deben organizar en directorios en este nivel, no debe haber archivos sueltos.
				                      "mvc"=>$modulo."/libs/php/mvc/"
				                         )				
				);
	$nombreArchivo=$classname.".php";
				
	if(!extraer($sistema,$nombreArchivo))
	{
		echo "
		<script>
		jAlert('Error: no se encontro el archivo de sistema','Error');		
		</script>";
		
		}
	
				
	
	
	
	
	
	
	
	
	
}

function extraer($sistema,$nombreArchivo)
{
	$encontrado=false;
	
		foreach($sistema as $directorio=>$subdirectorio)
		{
			if(is_array($subdirectorio))
			{
				$encontrado=extraer($subdirectorio,$nombreArchivo);
				if($encontrado){
					break;									
					}
				}else{
					$encontrado=cargar($subdirectorio,$nombreArchivo);
					if($encontrado){ 
					break;					
						}
				}
							
			}
			return $encontrado;
			}
			
function cargar($directorio,$nombreArchivo)
{
	if (file_exists($directorio.$nombreArchivo))
	{
		require_once($directorio.$nombreArchivo);
		return true;		
		}else{
			return false;
			}
		}
			
			

spl_autoload_register('__autoload');
	

?>