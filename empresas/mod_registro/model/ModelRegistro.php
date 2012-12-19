<?php
class ModelRegistro extends ModelBase
{
	public function ListaCiudades($_POST)
	{
		try
		{
			$query="SELECT * FROM ciudades ";
			$consulta = $this->db->prepare($query);
			$consulta->execute();
			return $consulta;	
			}
			catch(PDOException $e)
			{
				$Mensaje="Seleccion Erronea:  </br></br>";
				$Mensaje.="Error (Mensaje) capturado:_____".$e->getMessage()." </br></br> ";			
				$Mensaje.="Error (Archivo) capturado:_____".$e->getFile()." </br></br> ";					   			  
				$Mensaje.="Error ( Linea ) capturado:_____".$e->getLine()."</br></br>";
				$Mensaje=str_replace("'","",$Mensaje);//eliminamos comillas simples,que causan problemas en javascript		
				echo "<script>jAlert('$Mensaje')</script>";
				}
		}
	
	public function Registro($_POST)
	{
		try
		{
			$registro=date("Y-m-d");			
			$tipo="empresa";
			$this->db->beginTransaction();
			$query="INSERT into usuarios (usr_nombre,usr_usuario,usr_password,usr_fecRegistro,usr_tipo) values(:nombre,:usuario,:password,:registro,:tipo)";			
			$consulta = $this->db->prepare($query);
			$consulta->execute(array(
			                          "nombre"=>$_POST['nombre'],"usuario"=>$_POST['usuario'],"password"=>$_POST['pass'],"registro"=>$registro,"tipo"=>$tipo
									  
									  ));
			$this->db->commit();
			$mensaje=array(
			               "error"=>false,
						   "usuario"=>"Registro exitoso!",
						   "console"=>"Nuevo usuario(Empresa) registrado",
						   "response"=>null
						   );
			return $mensaje;		
			}
			catch(PDOException $e)
			{
				$this->db->rollBack();
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
		
	public function usuarioExiste($usuario)
	{
		try
		{
			$query="SELECT usr_id
			        FROM usuarios
					where usr_usuario=:usuario";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array(
			                         "usuario"=>$usuario
									 ));
			$mensaje=array(
			               "error"=>false,
						   "usuario"=>null,
						   "console"=>null,
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