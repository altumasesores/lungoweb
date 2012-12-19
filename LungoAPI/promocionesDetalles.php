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



$prom_id=$_POST['prom_id'];


$con= new dbConexion();



		if($con->conectar()==true){		
			$query_empresas = "select * from promociones_empresas pem
			                   inner join empresas em on pem.emp_id=em.emp_id
							   where pem.prom_id='$prom_id'
							   ";
			$empresas = mysql_query($query_empresas); 
				
			
		
			if (!$empresas){
				
				 
				 
				}else{
				$datos=array();
				
					while($row = mysql_fetch_array($empresas))
					{
						
						$datos[]=array(
						"emp_nombreComercial"=>utf8_encode($row['emp_nombreComercial']),
						"fec_inicioValidez"=>$row['fec_inicioValidez'],
						"fec_finValidez"=>$row['fec_finValidez'],
						"prom_descripcion"=>utf8_encode($row['prom_descripcion']),
						"prom_id"=>$row['prom_id'],
						"prom_bases"=>utf8_encode($row['prom_bases']),
						"prom_restricciones"=>utf8_encode($row['prom_restricciones'])
						
						
						);
						
						
						
						}	
						
					
				}
				
			}
			
			
			
			
			echo json_encode($datos);





 

		
		?>