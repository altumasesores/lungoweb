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


$emp_id=$_POST['emp_id'];



$con= new dbConexion();



		if($con->conectar()==true){		
			$query_empresas = "SELECT * from empresas emp
			                   inner join empresa_categoria emcat on emp.emp_id=emcat.emp_id
							   inner join categorias cat on emcat.ctg_id=cat.ctg_id							           
							   where emp.emp_id='$emp_id'";
			$empresas = mysql_query($query_empresas); 	
			$columnas=mysql_num_rows($empresas);
			
			/*
			$query2 = "SELECT *  from emp_servProd empSP			                   				           
							   where empSP.emp_id='$emp_id'";
			$empresas2 = mysql_query($query2); 	
			$columnas2=mysql_num_rows($empresas2);
			
			*/
		
			if ($columnas<=0){
				
				
				 
				}else{
					
					$row = mysql_fetch_array($empresas);
					
						
						$datos=array(
						"emp_id"=>$row['emp_id'],
						"emp_nombreComercial"=>utf8_encode($row['emp_nombreComercial']), 
						"emp_direccion"=>utf8_encode($row['emp_direccion']),
						"emp_detalles"=>utf8_encode($row['emp_detalles']),
						"emp_geolocalizacion"=>$row['emp_geolocalizacion'], 
						"emp_web"=>$row['emp_web'],
						"emp_facebook"=>$row['emp_facebook'],
						"emp_twitter"=>$row['emp_twitter'],
						"emp_email"=>$row['emp_email'],
						"emp_googlePlus"=>$row['emp_googlePlus'],
						"emp_calificacion"=>$row['emp_calificacion'],						
						"ctg_descripcion"=>utf8_encode($row['ctg_descripcion']),
						"emp_horarios"=>$row['emp_horarios'],
						"emp_detalles"=>utf8_encode($row['emp_detalles']),
						"emp_telefono1"=>$row['emp_telefono1'],
						"emp_telefono2"=>$row['emp_telefono2'],
						"emp_serviciosProductos"=>utf8_encode($row['emp_serviciosProductos']),						
						"emp_imagenPerfil"=>$row['emp_imagenPerfil'],
						"emp_latitud"=>$row['latitud'],
						"emp_longitud"=>$row['longitud']
						);
						
						
						
						
						
				}
				
			}
			

			/*
			
			
			if ($columnas2<=0){
				
				
				 
				}else{
					
					while($row = mysql_fetch_array($empresas2))
					{
						
						$datos['emp_servProd'][]=array(
						"servProd_nombre"=>$row['servProd_nombre'],
						"servProd_descripcion"=>$row['servProd_descripcion'],
						"servProd_tipo"=>$row['servProd_tipo']
						);
						
						
						
						}	
						
				}
				
				*/	
			echo json_encode($datos);	
			
			
			
			
			
			
			
			
			
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		




 

		
		?>