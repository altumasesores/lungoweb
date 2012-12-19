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



		if($con->conectar()==true){		
			$query_empresas = "select * from ciudades order by ciu_id";
			$empresas = mysql_query($query_empresas); 
				
			
		
			if (!$empresas){
				
				 
				 
				}else{
				$datos=array();
				
					while($row = mysql_fetch_array($empresas))
					{
						
						$datos[]=array(
						"ciu_id"=>$row['ciu_id'],
						"nom_ciudad"=>utf8_encode($row['nom_ciudad'])				
						
						);
						
						
						
						}	
						
					
				}
				
			}
			
			
			
			
			echo json_encode($datos);





 

		
		?>