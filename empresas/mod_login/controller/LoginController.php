<?php
class LoginController extends ControllerBase
{
	public function model()
	{
		
		$this->Modelo = new ModelLogin();		
		
	}
	public function VistaLogin()
	{
		$this->view->show("login.php", $data=null,"viewsFolder");
	}
	
	public function loguear($_POST)
	{
		//Le pedimos al Modelo que busque el usuario
		$responseModelo=$this->Modelo->ConfirmarLogin($_POST);
		
		if($responseModelo['error'])
		{
			echo json_encode($responseModelo);
			}
			else
			{
				$registros=$responseModelo['response']->rowCount();
				
				if($registros>0)
				{
					$usuario=$responseModelo['response']->fetch();
					$data['id_usuario']=$usuario['usr_id'];
					
					//Finalmente presentamos nuestra plantilla
					$this->view->show("empresas.php", $data,"viewsFolderEmpresa");				    
					}
					else
					{
						//Finalmente presentamos nuestra plantilla
						$mensaje=array(
			               "error"=>true,
						   "usuario"=>"Error: Usuario/contraseña incorrectos, reintente",
						   "console"=>"El usuario/contraseña son incorrectos.",
						   "response"=>null
						   );				
						 echo json_encode($mensaje);	
						}
								
						}
						
	}
	
	
	
	public function loguearSITE($_POST)//accion para el sitio de lungo.com.mx
	{
		//Le pedimos al Modelo que busque el usuario
		$responseModelo=$this->Modelo->ConfirmarLogin($_POST);
		
		if($responseModelo['error'])
		{
			echo json_encode($responseModelo);
			}
			else
			{
				$registros=$responseModelo['response']->rowCount();
				
				if($registros>0)
				{
					//Finalmente presentamos nuestra plantilla
						$mensaje=array(
			               "error"=>false,
						   "usuario"=>null,
						   "console"=>"Usuario correcto.",
						   "response"=>null
						   );				
						 echo json_encode($mensaje);	
					}
					else
					{
						//Finalmente presentamos nuestra plantilla
						$mensaje=array(
			               "error"=>true,
						   "usuario"=>"Error: Usuario/contraseña incorrectos, reintente",
						   "console"=>"El usuario/contraseña son incorrectos.",
						   "response"=>null
						   );				
						 echo json_encode($mensaje);	
						}
								
						}
						
	}
	
	

	
}
        
        ?>