<?php
class sistema{
	public function registrado(){
		$_POST['modulo']="login";
		$_POST['controlador']="Login";
		$_POST['accion']="loguear";
		$_POST['usuario']=$_SESSION['usr'];
		$_POST['password']=$_SESSION['pss'];
		
		echo "
		<script>
		Login.login({'usuario':'$_SESSION[usr]','password':'$_SESSION[pss]'});		
		</script>
		";
		//require_once 'http://www.mivacante.com/lungo/empresas/AnteFrontController.php';
		}
	}
?>