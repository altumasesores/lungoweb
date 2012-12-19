<?php
class ModelLogin extends ModelBase
{
	public function ConfirmarLogin($_POST)
	{
		try
		{
			$query="SELECT * FROM usuarios 
			        where usr_usuario=:usuario and usr_password=:password and (usr_tipo='empresa' or usr_tipo='superadmin')";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array(':usuario' => $_POST['usuario'],'password'=>$_POST['password']));
			$mensaje=array(
			               "error"=>false,
						   "usuario"=>null,
						   "console"=>"usuario encontrado.",
						   "response"=>$consulta
						   );
			return $mensaje;	
			}
			catch(PDOException $e)
			{
				$Error="Seleccion Erronea:  </br></br>";
				$Error.="Error (Mensaje) capturado:_____".$e->getMessage()." </br></br> ";			
				//$Mensaje.="Error (Archivo) capturado:_____".$e->getFile()." </br></br> ";					   			  
				//$Mensaje.="Error ( Linea ) capturado:_____".$e->getLine()."</br></br>";
				$Error=str_replace("'","",$Error);//eliminamos comillas simples,que causan problemas en javascript		
				
				$mensaje=array(
			               "error"=>true,
						   "usuario"=>"Error interno, <br/> no se puede continuar con la operacón",
						   "console"=>$Error
						   );
			    return $mensaje;	
				}
		}
		
	
      
		
}
/*
$this->db->beginTransaction();
$this->db->commit();
$this->db->rollBack();
*/
?>