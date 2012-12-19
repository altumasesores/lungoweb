<?php
class ModelEmpresa extends ModelBase
{
	public function ConsultarEmpresasUsuario($id_usuario)
	{
		try
		{
			$query="SELECT * FROM empresas emp where emp.usr_id=:idUsuario";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("idUsuario"=>$id_usuario));
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
	
	public function ConsultarCatEmpresaXID($id_empresa)
	{
		try
		{
			$query="SELECT * 
			        FROM empresa_categoria empcat					
					inner join categorias cat on empcat.ctg_id=cat.ctg_id
					WHERE empcat.emp_id=:idEmpresa";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("idEmpresa"=>$id_empresa));
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
	
	public function ConsultarCategorias()
	{
		try
		{
			$query="SELECT * 
			        FROM categorias";
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
	
	public function GuardarEmpresa($_POST)
	{
		try
		{
			$this->db->beginTransaction();
			$query="INSERT INTO `empresas` 
			      (`usr_id`, `emp_ciudad`, `emp_nombreComercial`, `emp_direccion`, `emp_detalles`, `emp_calificacion`, `emp_geolocalizacion`,
				   `emp_web`, `emp_facebook`, `emp_twitter`, `emp_email`, `emp_googlePlus`, `emp_horarios`, `emp_telefono1`, `emp_telefono2`,
				   `emp_imagenPerfil`, `emp_serviciosProductos`)
				   VALUES(:idUsuario,:ciudad,:nombre,:direccion,:detalles,:calificacion,:geo,:web,:facebook,:twitter,:mail,:google,:horarios,
				          :telefono1,:telefono2,:imagen,:servProductos)";
						  
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("idUsuario"=>$_POST['id_usuario'],"ciudad"=>"chetumal","nombre"=>$_POST['nombre'],"direccion"=>$_POST['ubicacion'],
			                         "detalles"=>$_POST['detalles'],"calificacion"=>"5","geo"=>"no disponible","web"=>$_POST['web'],
									 "facebook"=>$_POST['facebook'],"twitter"=>$_POST['twitter'],"mail"=>$_POST['email'],"google"=>"no disponible",
									 "horarios"=>$_POST['horarios'],"telefono1"=>$_POST['telefono1'],"telefono2"=>$_POST['telefono2'],
									 "imagen"=>"no disponible","servProductos"=>$_POST['servProductos']));
									 
			$idEmpresa=$this->db->lastInsertId(); 
			$query="INSERT INTO `empresa_categoria` 
			      (`emp_id`, `ctg_id`)
				   VALUES(:empresa,:categoria)";
						  
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("empresa"=>$idEmpresa,"categoria"=>$_POST['categoria']));
									 
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
	
	public function ModificarEmpresa($_POST)
	{
		try
		{
			$this->db->beginTransaction();
			$query="update `empresas` set
			       `emp_ciudad`=:ciudad, `emp_nombreComercial`=:nombre, `emp_direccion`=:direccion, `emp_detalles`=:detalles, `emp_calificacion`=:calificacion, `emp_geolocalizacion`=:geo,
				   `emp_web`=:web, `emp_facebook`=:facebook, `emp_twitter`=:twitter, `emp_email`=:mail, `emp_googlePlus`=:google, `emp_horarios`=:horarios, `emp_telefono1`=:telefono1, 
				   `emp_telefono2`=:telefono2,`emp_imagenPerfil`=:imagen, `emp_serviciosProductos`=:servProductos
				   where emp_id=:idEmpresa and usr_id=:idUsuario";
						  
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("ciudad"=>"chetumal","nombre"=>$_POST['nombre'],"direccion"=>$_POST['ubicacion'],
			                         "detalles"=>$_POST['detalles'],"calificacion"=>"5","geo"=>"no disponible","web"=>$_POST['web'],
									 "facebook"=>$_POST['facebook'],"twitter"=>$_POST['twitter'],"mail"=>$_POST['email'],"google"=>"no disponible",
									 "horarios"=>$_POST['horarios'],"telefono1"=>$_POST['telefono1'],"telefono2"=>$_POST['telefono2'],
									 "imagen"=>"no disponible","servProductos"=>$_POST['servProductos'],"idEmpresa"=>$_POST['id_empresa'],"idUsuario"=>$_POST['id_usuario']));
									 
		    $query="update `empresa_categoria` set `ctg_id`=:categoria where emp_id=:empresa";
						  
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("categoria"=>$_POST['categoria'],"empresa"=>$_POST['id_empresa']));
									 
									 
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
		 
	
	public function ListaPromocionesXEmpresa($id_empresa)
	{
		try
		{
			$query="SELECT * 
			        FROM promociones_empresas
					where emp_id=:idEmpresa";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("idEmpresa"=>$id_empresa));
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
		
	
	public function ConsultarUsuario($id_usuario)
	{
		try
		{
			$query="SELECT * FROM usuarios where usr_id=:idUsuario and (usr_tipo='empresa' or usr_tipo='superadmin')";
			$consulta = $this->db->prepare($query);
			$consulta->execute(array('idUsuario' => $id_usuario));
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
		
	
	public function ActualizarFoto($_POST)
	{
		try
		{
			$this->db->beginTransaction();
			$query="update `empresas` set
			       `emp_imagenPerfil`=:imagen
				   where emp_id=:idEmpresa and usr_id=:idUsuario";						  
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("imagen"=>"images/".$_POST['image'],"idEmpresa"=>$_POST['id_empresa'],"idUsuario"=>$_POST['id_usuario']));		    
									 
									 
			$this->db->commit();
			return true;	
			}
			catch(PDOException $e)
			{
				$this->db->rollBack();
				$Mensaje="Actualizacion Erronea:  nombre$_POST[nombre]  </br></br>";
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