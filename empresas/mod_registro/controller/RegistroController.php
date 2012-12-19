<?php
class RegistroController extends ControllerBase
{
	
	public function model()
	{
		
		$this->Modelo = new ModelRegistro();
		$error = new AdminError; 	
		
		
	}
	
	public function ListaCiudades($_POST)
	{
		$data="";
		//Le pedimos al Modelo que busque el usuario
		$responseModelo=$this->Modelo->ListaCiudades($_POST);
		$registros=$responseModelo->rowCount();
		if($registros>0){
			$ciudades=array();
			while($row=$responseModelo->fetch())
			{
				$gato[]=array(
			              "id"=>$row['ciu_id'],
						  "ciudad"=>$row['nom_ciudad']
			              );				
				}
				
				echo json_encode($gato);
			}
		}
	public function Registro($_POST)
	{
		$usuario=$_POST['usuario'];
		if($this->usuarioExiste($usuario))
		{
			$mensaje=array(
			               "error"=>true,
						   "usuario"=>"Imposible registrar.<br/>Este correo ya ha sido usado.",
						   "console"=>"Imposible registrar.<br/>Este correo ya ha sido usado.",
						   "response"=>null
						   );
			echo json_encode($mensaje);
			}
			else
			{
				$responseModelo=$this->Modelo->Registro($_POST);
				if($responseModelo['error'])
				{
					echo json_encode($responseModelo);
					}
					else
					{
						$responseModelo['response']="<script>Login.login({'usuario':'$_POST[usuario]','password':'$_POST[pass]'})</script>";
						echo json_encode($responseModelo);
						}
						}
				
			
		
		}
	public function usuarioExiste($usuario)
	{
		$existe=$this->Modelo->usuarioExiste($usuario);
		if($existe['error'])
		{
			echo json_encode($existe);
			}
			else
			{
				$filas=$existe['response']->rowCount();
				
				if($filas>0)
				{
					return true;
					}
					else
					{
						return false;
						}
						}
						}
						
}
        
        ?>