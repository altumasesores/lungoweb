<?php header('Access-Control-Allow-Origin: *');
//Clase para conectarnos a la base de datos

 class dbConexion{
	//public $conect;
		
	function conectar(){
		
	//remoto
		
	$server= "localhost";
		$bd=  "lungocom_lungo";
		$user= "lungocom";
		$pass=  "9Uskcz778R"; 
	
/*
	
		
		$server= "localhost";
		$bd=  "lungo";
		$user= "root";
		$pass=  "mysql";
		*/
		if(!($con = mysql_connect($server, $user, $pass))){
			echo "Error al conectar la Base de Datos";
			exit();			
			}
			
		if(!mysql_select_db($bd,$con)){
			echo "Error al seleccionar la Base de Datos";
			exit();
			}
	
		//$this->conect=$con;
		return true;		
		
		}	
 }
		?>
<?php






$con= new dbConexion();

 $nombre=$_POST['nombreUsuario'];

 $sexo=$_POST['generoUsuario'];

 $edad=$_POST['selectEdad'];

     $año=date("Y");
     $año=$año-$edad;
 $mes=$_POST['selectMes'];

 $dia=$_POST['selectDia'];

 $fecha_nac=$año."-".$mes."-".$dia;

 $correo=$_POST['correoUsuario'];

 $contrasenia=$_POST['passUsuario'];
 $fecha_registro=date("Y-m-d"); 
 $tipo="usuario";
 $ciudad=$_POST['ciudad'];


		if($con->conectar()==true){		
			$query_empresas = "INSERT INTO `usuarios` (`usr_nombre`, `usr_genero`, `usr_edad`, `usr_fecNacimiento`, `usr_usuario`, `usr_password`, `usr_fecRegistro`,usr_ciudad,ciu_id,usr_tipo) 
			values('$nombre','$sexo','$edad','$fecha_nac','$correo','$contrasenia','$fecha_registro','$ciudad','$ciudad','$tipo') ";
			$empresas = mysql_query($query_empresas); 	 
			
		
			if (!$empresas){
				
				$datos=json_encode(array(
						'registrado'=>'no',
						'mensaje'=>utf8_encode("Error al guardar:  :".mysql_error())
						));
				
	
				 
				}else{
					
					$datos=json_encode(array(
						'registrado'=>'si',
						'mensaje'=>"Registrado correctamente"
						));
				}
				
			}
			
			
			
			
			
			

 echo $datos;

		
		?>