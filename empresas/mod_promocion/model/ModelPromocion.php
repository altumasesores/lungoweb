<?php
class ModelPromocion extends ModelBase
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
	
	public function GuardarPromocion($_POST)
	{
		try
		{
			$this->db->beginTransaction();
			$query="INSERT INTO `promociones_empresas` 
			      (emp_id,fec_alta,fec_inicioValidez,fec_finValidez,prom_descripcion,prom_bases,prom_restricciones)
				   VALUES(:idEmpresa,:fechaAlta,:fechaInicio,:fechaFin,:descripcion,:bases,:restricciones)";
						  
			$consulta = $this->db->prepare($query);
			$consulta->execute(array("idEmpresa"=>$_POST['id_empresa'],"fechaAlta"=>$_POST['fechaRegistro'],"fechaInicio"=>fentrada($_POST['fechaInicio']),
			"fechaFin"=>fentrada($_POST['fechaFin']),"descripcion"=>$_POST['promocion'],"bases"=>$_POST['bases'],"restricciones"=>$_POST['restricciones']));
			$this->db->commit();
			return true;	
			}
			catch(PDOException $e)
			{
				$this->db->rollBack();
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
	
	
	
      
		
}
/*
$this->db->beginTransaction();
$this->db->commit();
$this->db->rollBack();
*/
?>