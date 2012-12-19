<?php
class PromocionController extends ControllerBase
{	
	public function model()
	{
		
		$this->Modelo = new ModelPromocion();	
		if (!isset($_SESSION))
		{
			session_start();
		}
		
		
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
		$this->view->show("promociones.php",$data,"viewsFolder");
		}
	
	public function GuardarPromocion($_POST)
	{
		$guardado=$this->Modelo->GuardarPromocion($_POST);		
		if($guardado)
		{
			echo "<script>jAlert('Promociòn guardada y publicada en lungo app!!!','Mensaje')</script>";
			$this->VistaPromociones($_POST);
			}
			else
			{
				echo $guardado;
				$this->VistaPromociones($_POST);
				}
		}

		
		
		

	
}
        
        ?>