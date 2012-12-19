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

$usuario= $_POST['usuario'];
$contrasenia= $_POST['contrasena'];

		if($con->conectar()==true){		
			$query_empresas = "SELECT * from usuarios where usr_usuario='$usuario' and usr_password='$contrasenia'";
			$empresas = mysql_query($query_empresas); 	
			$columnas=mysql_num_rows($empresas);
			
			
		
			if ($columnas<=0){
				$datos=json_encode(array(
						'login'=>'no',
						'nombre'=>"invalido"					
						));
				
				 
				}else{
					
					
					$row = mysql_fetch_array($empresas);
					
					
						$datos=json_encode(array(
						'login'=>'si',
						'nombre'=>"$row[usr_nombre]",
						'usr_id'=>"$row[usr_id]",
						'ciu_id'=>"$row[ciu_id]"//id de la ciudad
						));
						
							
						
					
				}
				
			}
			
			
			
			
			
			echo $datos;





 

		
		?>