<?php
class UsuarioController extends ControllerBase
{	
	public function model()
	{
		
		$this->Modelo = new ModelUsuario();	
		/*if (!isset($_SESSION))
		{
			session_start();
		}*/
		
		
	}
	
	public function VistaPerfilUsuario($_POST)
	{
		
		$responseModelo=$this->Modelo->ValidarUsuario($_POST);
		$data['Usuario']=$responseModelo->fetch();		
		$ciudades=$this->Modelo->ConsultarCiudades();
		$data['Ciudades']=$ciudades;
		$this->view->show("perfilUsuario.php",$data,"viewsFolder");
		}
	

	
	public function ModificarUsuario($_POST)
	{
		$responseModelo=$this->Modelo->ValidarUsuario($_POST);
		$USUAR=$responseModelo->fetch();
		$usr=$_POST['usuario'];
		$usrActual=$_POST['usuarioActual'];		
		$passActual=$_POST['passActual'];
		$pass=$_POST['pass'];	
		$confirmPass=$_POST['confirm_password'];
		$cambioUsuario=true;
		$cambioPass=true;
		$mensaje="<br />";
		
		if(empty($usrActual) && empty($usr))
		{
			$usuario=false;
			$cambioUsuario=true;
			}else{
				if($usrActual==$USUAR['usr_usuario'])
				{
					$usuario=true;
					$cambioUsuario=true;
					}else
					{
						$cambioUsuario=false;
						$mensaje.="El usuario actual no coincide con su usuario, reintente de nuevo.<br />";						
						}			
				
				}
			
		if(empty($passActual) && empty($pass) && empty($confirmPass))
		{
			$password=false;
			$cambioPass=true;
			}else{
				if($passActual==$USUAR['usr_password'])				
				{
					$password=true;
					$cambioPass=true;
					}else{
						$cambioPass=false;
						$mensaje.="La contraseña actual no coincide con su contraseña.reintente de nuevo.<br />";
						}
				}
		
		if(!$cambioUsuario or !$cambioPass)
		{
			echo "<script>jAlert('$mensaje','Alerta')</script>";
			$this->VistaPerfilUsuario($_POST);
			}else{
				
				$modificado=$this->Modelo->ModificarUsuario($_POST,$usuario,$password);
				if($modificado)
				{
					if($usuario){
						//$_SESSION['usr']= $_POST['usuario'];
						}
					if($password)
					{
						 //$_SESSION['pss']= $_POST['pass'];
						}					
				   
					echo "<script>jAlert('usuario modificada satisfactoriamente!','Alerta')</script>";
					$this->VistaPerfilUsuario($_POST);
					}
					else
					{
						echo "<script>jAlert('No se pudo modificar el usuario, reintente!','Alerta');</script>";
						$this->VistaPerfilUsuario($_POST);
						}
			
				
				}
		
		
		}
		
		
		

	
}
        
        ?>