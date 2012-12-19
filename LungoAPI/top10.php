<?php  header('Access-Control-Allow-Origin: *');
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



if(empty($_POST['ciudad']) || $_POST['ciudad']==""){
	$ciudad=1;
	}else{
$ciudad=$_POST['ciudad'];
	}


$con= new dbConexion();



		if($con->conectar()==true){		
			$query_empresas = "SELECT distinct cat.ctg_descripcion, emp.*  from empresas emp 
			                   inner join empresa_categoria emcat on emp.emp_id=emcat.emp_id
							   inner join categorias cat on emcat.ctg_id=cat.ctg_id
							   where ciu_id='$ciudad'			                   
							   ORDER BY emp_calificacion DESC LIMIT 0, 10";
			$empresas = mysql_query($query_empresas); 
				
			
		
			if (!$empresas){
				
				 
				 
				}else{
				$datos=array();
				
					while($row = mysql_fetch_array($empresas))
					{
						
						$datos[]=array(
						"emp_id"=>$row['emp_id'],
						"emp_nombreComercial"=>utf8_encode($row['emp_nombreComercial']),                    					 
						"emp_direccion"=>utf8_encode($row['emp_direccion']),
						"emp_detalles"=>utf8_encode($row['emp_detalles']),
						"ctg_descripcion"=>utf8_encode($row['ctg_descripcion']),
						"emp_geolocalizacion"=>$row['emp_geolocalizacion'], 
						"emp_web"=>$row['emp_web'],
						"emp_facebook"=>$row['emp_facebook'],
						"emp_twitter"=>$row['emp_twitter'],
						"emp_email"=>$row['emp_email'],
						"emp_googlePlus"=>$row['emp_googlePlus'],
						"emp_calificacion"=>$row['emp_calificacion'],						
						"ctg_descripcion"=>utf8_encode($row['ctg_descripcion']),						
						"emp_imagenPerfil"=>$row['emp_imagenPerfil']
						);
						
						
						
						}	
						
					
				}
				
			}
		
        echo json_encode($datos);
		?>