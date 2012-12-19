<?php
class ModelUsuario extends ModelBase
{
	public function ModificarUsuario($_POST,$usuario,$password)
	{
		$upUsuario="";
		$upPass="";
		$data=date("Y")-$_POST['edad'];
		$nacimiento=$data."-".$_POST['mes']."-".$_POST['dia'];
		$vals=array("nombre"=>$_POST['nombre'],"genero"=>$_POST['sexo'],"edad"=>$_POST['edad'],"nacimiento"=>$nacimiento,"ciudad"=>$_POST['ciudad'],"idUsuario"=>$_POST['id_usuario']);
		
		try
		{
			$this->db->beginTransaction();
			if($usuario)
			{
				$upUsuario=",usr_usuario=:usuario";
				$arusr=array("usuario"=>$_POST['usuario']);
				$vals=array_merge($vals,$arusr);
				
				}
			if($password)
			{
				$upPass=",usr_password=:password";
				$arpass=array("password"=>$_POST['pass']);
				$vals=array_merge($vals,$arpass);
				}
			$query="update `usuarios` set
			        usr_nombre=:nombre,usr_genero=:genero,usr_edad=:edad,
					usr_fecNacimiento=:nacimiento,usr_ciudad=:ciudad $upUsuario $upPass
					where usr_id=:idUsuario
			       ";
						  
			$consulta = $this->db->prepare($query);
			$consulta->execute($vals);
			$this->db->commit();			
			return true;	
			}
			catch(PDOException $e)
			{
				$this->db->rollBack();				
				$Mensaje="Seleccion Erronea:  nombre$_POST[nombre]  </br></br>";
				$Mensaje.="Error (Mensaje) capturado:_____".$e->getMessage()." </br></br> ";			
				$Mensaje.="Error (Archivo) capturado:_____".$e->getFile()." </br></br> ";					   			  
				$Mensaje.="Error ( Linea ) capturado:_____".$e->getLine()."</br></br>";
				$Mensaje=str_replace("'","",$Mensaje);//eliminamos comillas simples,que causan problemas en javascript		
				echo "<script>jAlert('$Mensaje')</script>";
				}
		}
		
	public function ConsultarCiudades()
	 {
		 try
		{
			$query="SELECT * 
			        FROM ciudades";
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
	
	public function ValidarUsuario($_POST)
	{
		try
		{
			$query="SELECT * FROM usuarios where usr_id=:usuario and (usr_tipo='empresa' or usr_tipo='superadmin')";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array('usuario' => $_POST['id_usuario']));
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
	
	
      
		
}
/*
$this->db->beginTransaction();
$this->db->commit();
$this->db->rollBack();
*/
?>