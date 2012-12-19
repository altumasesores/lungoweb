<?php
class AdminError 
{ 
    function AdminError() 
    { 
        function adm_error($numero, $mensaje, $archivo, $linea, $contexto, $retorna=0) 
        { 
            $objContexto = new Contexto($numero, $mensaje, $archivo, $linea, $contexto); 
            if($retorna)
			{
				$mensaje=json_encode(array(
				                           "error"=>true,
										   "usuario"=>"Error interno, <br/> no se puede continuar con la operacón",
										   "console"=>$objContexto->leer(),
										   )); 
			 
                //return $objContexto->leer(); 
				//$Mensaje=str_replace('"',"",$objContexto->leer());
				/* $mensaje="<script>jAlert('Error interno, <br/> no se puede continuar con la operacón','Error de Sistema');</script>";				*/
				 /* $mensaje.="<script>console.debug('".$objContexto->leer()."');</script>"; */
                 
				 return $mensaje;
				
				}
            else {
                //print $objContexto->leer(); 
				//$Mensaje=str_replace("'","",$objContexto->leer());
				/*$mensaje="<script>jAlert('Error interno, <br/> no se puede continuar con la operacón','Error de Sistema');</script>";				
				$mensaje.="<script>console.debug('".$objContexto->leer()."');</script>";*/
				$mensaje=json_encode(array(
				                           "error"=>true,
										   "usuario"=>"Error interno, <br/> no se puede continuar con la operacón",
										   "console"=>$objContexto->leer(),
										   )); 
				return $mensaje;
			}
        } 
         
        function errorFatal($buffer) 
        { 
            $buffer_temporal = $buffer; 
            $texto = strip_tags($buffer_temporal); 
            if(preg_match('/Fatal error: (.+) in (.+)? on line (\d+)/', $texto, $c)) 
                return adm_error(E_USER_ERROR, $c[1], $c[2], $c[3], "", true); 
            return $buffer; 
        } 
        ob_start('errorFatal'); 
        set_error_handler('adm_error'); 
    } 
} 

class contexto{
	var $_numero="";
	var $_mensaje="";
	var $_lineas=5;
	
	function contexto($numero, $mensaje, $archivo, $linea, $contexto)
	{
		$this->_mensaje='<b>Error:</b>'.$mensaje.'<br><hr><b>Linea:</b>'.$linea.'<br><hr>';
						 /*
						 "
		                 <b>Error:</b>$mensaje<br>
						 <hr>
						 <b>Archivo:</b>$archivo<br>
						 <hr>
						 <b>Linea:</b>$linea<br>
						 <hr>
						 <b>Contexto del codigo:</b><br>
						 <pre>".$this->obtenerContexto($archivo, (int)$linea)."</pre>
						 <hr>";
						 */
		}
		
	function leer()
	{
		return $this->_mensaje;
		}
		
	function obtenerContexto($archivo, $linea)
	{
		if(!file_exists($archivo))
		{
			return "El contexto no puede mostrarse - ($archivo) no existe";			
			}
			elseif((!is_int($linea))or($linea<=0))			
			{
				return "El contexto no puede mostrarse - ($linea) es un numero invalido de linea";			
				}
				else
				{
					$codigo=file($archivo);
					$lineas=count($codigo);
					$inicio=$linea-$this->_lineas;
					$fin=$linea+$this->_lineas;
					
					if($inicio<0)$inicio=0;
					if($fin>=$lineas)$fin=$lineas;
					$largo_fin=strlen($fin)+2;
					for($i=$inicio-1;$i<$fin;$i++)
					{
						$color=($i==$linea-1?"red":"black");
						$salida[]="<span style='background-color:lightgrey'>".($i+1).str_repeat("&nbsp;",$largo_fin-strlen($i+1))."</span><span style='color:$color'>".htmlentities($codigo[$i])."</span>";
						}
					return trim(join("",$salida));
					}
		}
	}

?>