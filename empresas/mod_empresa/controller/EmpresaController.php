<?php //header('Access-Control-Allow-Origin: *');
class EmpresaController extends ControllerBase
{	
	public function model()
	{
		
		$this->Modelo = new ModelEmpresa();	
		/*
		if (!isset($_SESSION))
		{
			session_start();
			
			
				
			
		}*/
		
		
	}
		
	public function VistaPerfil($_POST)
	{
		        
			
	
		$id_usuario=$_POST['id_usuario'];
		
		$datosEmpresa=$this->Modelo->ConsultarEmpresasUsuario($id_usuario);
		$Empresa=array();
		
		if($datosEmpresa->rowCount()){
		foreach($datosEmpresa->fetch(PDO::FETCH_ASSOC) as $key=>$value)
		{
			//array asociativo dinamico
			$Empresa[$key]=$value;
			}
			//$_SESSION['id_empresa']=$Empresa['emp_id'];
			$data['id_empresa']=$Empresa['emp_id'];
		}	
					
		$id_empresa=$Empresa['emp_id'];		
		$categoriasEmpresa=$this->Modelo->ConsultarCatEmpresaXID($id_empresa);		
		$categorias=$this->Modelo->ConsultarCategorias();
		$data['Empresa']=$Empresa;
		$data['categoriasEmpresa']=$categoriasEmpresa;
		$data['categorias']=$categorias;
		$data['id_usuario']=$id_usuario;		
		$this->view->show("perfilEmpresa.php",$data,"viewsFolder");
		
		}
		
	public function VistaPerfilUsuario($_POST)
	{
		
		
		$id_usuario=$_POST['id_usuario'];
		$Usuario=$this->Modelo->ConsultarUsuario($id_usuario);
		$data['Usuario']=$Usuario->fetch();
		$ciudades=$this->Modelo->ConsultarCiudades();
		$data['Ciudades']=$ciudades;
		$this->view->show("perfilUsuario.php",$data,"viewsFolderUsuario");
		}
	
	public function VistaPromociones($_POST)
	{ 
	    $id_usuario=$_POST['id_usuario'];
		$datosEmpresa=$this->Modelo->ConsultarEmpresasUsuario($id_usuario);
		$Empresa=$datosEmpresa->fetch();
		$id_empresa=$Empresa['emp_id'];
		$data['id_empresa']=$id_empresa;
		$promociones=$this->Modelo->ListaPromocionesXEmpresa($id_empresa);
		$data['promociones']=$promociones;	
		$this->view->show("promociones.php",$data,"viewsFolderPromociones");
		}
	
	public function GuardarEmpresa($_POST)
	{
		$guardado=$this->Modelo->GuardarEmpresa($_POST);
		if($guardado){
			echo "<script>jAlert('Empresa guardada satisfactoriamente','Alerta')</script>";
		$this->VistaPerfil($_POST);		}else{
			echo "<script>jAlert('No se pudo guardar la empresa, reintente!','Alerta')</script>";
			$this->VistaPerfil($_POST);
			}
		}
	
	public function ModificarEmpresa($_POST)
	{
		$modificado=$this->Modelo->ModificarEmpresa($_POST);
		if($modificado){
			echo "<script>jAlert('empresa modificada satisfactoriamente!','Alerta')</script>";
		$this->VistaPerfil($_POST);
		}else{
			echo "<script>jAlert('No se pudo modificar la empresa, reintente!','Alerta')</script>";
			$this->VistaPerfil($_POST);
			}
		}
		
	public function UploadImage()
	{
		//Get the file information
		$userfile_name = $_FILES['imagelogo']['name'];
		$userfile_tmp = $_FILES['imagelogo']['tmp_name'];
		$userfile_size = $_FILES['imagelogo']['size'];
		$userfile_type = $_FILES['imagelogo']['type'];
		
		
		
		$large_image_location="images/files/$userfile_name";
		move_uploaded_file($userfile_tmp, $large_image_location);
		chmod($large_image_location, 0777);
		
		$size = getimagesize($large_image_location);
		$height = $size[1];
		
		$size = getimagesize($large_image_location);
		$width = $size[0];	
		
		$maxwidth=75;
		$maxheight=75;	
		
		
		$newImage = imagecreatetruecolor($maxwidth,$maxheight);
		
		switch($userfile_type) {
		case "image/gif":
			$source=imagecreatefromgif($large_image_location); 
			break;
	    case "image/pjpeg":
		$source=imagecreatefromjpeg($large_image_location); 
			break;
		case "image/jpeg":
		$source=imagecreatefromjpeg($large_image_location); 
			break;
		case "image/jpg":
			$source=imagecreatefromjpeg($large_image_location); 
			break;
	    case "image/png":
		$source=imagecreatefrompng($large_image_location); 
			break;
		case "image/x-png":
			$source=imagecreatefrompng($large_image_location); 
			break;
			
			}
		
		imagecopyresampled($newImage,$source,0,0,0,0,$maxwidth,$maxheight,$width,$height);
		
		switch($userfile_type) {
		case "image/gif":
	  		imagegif($newImage,$large_image_location); 
			break;
      	case "image/pjpeg":
		imagejpeg($newImage,$large_image_location,90); 
			break;
		case "image/jpeg":
		imagejpeg($newImage,$large_image_location,90); 
			break;
		case "image/jpg":
	  		imagejpeg($newImage,$large_image_location,90); 
			break;
		case "image/png":
		imagepng($newImage,$large_image_location);  
			break;
		case "image/x-png":
			imagepng($newImage,$large_image_location);  
			break;
    }
	
	chmod($large_image_location, 0777);
		
		echo "{
			cargado:true,
			nombre:'$userfile_name'			
			}";
		
		
		

		
		
		
		}
		
	public function UploadImageFull($_POST)
	{
		$nombre=$_POST['image'];
		$ftp_server = "www.mivacante.com"; 
		$conn_id = ftp_connect($ftp_server,"21"); 
		
		// login with username and password 
		$ftp_user_name = "mivacant"; 
		$ftp_user_pass = "Vacante2012Navitas2012"; 
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
		
		// check connection 
		if ((!$conn_id) || (!$login_result))
		{
			echo "no se pudo subir,error de conexion, reintente";
			}
			else
			{
				$destination_file="/public_html/lungo/images/$nombre";
$source_file="images/files/$nombre";

// subir un archivo
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);  

// comprobar el estado de la subida
if (!$upload) {  
    echo "¡La subida FTP ha fallado!";
} else {
    echo "Subida de $nombre exitosa <br/>";
}
				
				} 
	


// cerrar la conexión ftp 
ftp_close($conn_id);
		}
		
	public function ActualizarFoto($_POST)
	{
		$modificado=$this->Modelo->ActualizarFoto($_POST);
		if($modificado)
		{
			echo "<script>jAlert('Logo actualizada!!!','Mensaje')</script>";
			$this->VistaPerfil($_POST);
			}
			else
			{
				echo "<script>jAlert('No se pudo actualizar el logo la empresa, reintente!','Alerta')</script>";
			$this->VistaPerfil($_POST);
				}
		}
		
	
	
	
		
	
		

	
}
        
        ?>