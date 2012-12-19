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
			$query_empresas = "SELECT * from comentarios com
			                   inner join emp_calificacion emcal on com.com_id=emcal.com_id
							   inner join usuarios usr on emcal.usr_id=usr.usr_id
			                   where com.emp_id='$emp_id'
			                   order by com.com_id
			                   ";
			$empresas = mysql_query($query_empresas); 
				
			
		
			if (!$empresas){
				
				 
				 
				}else{
				$datos=array();
				
					while($row = mysql_fetch_array($empresas))
					{
						
						$datos[]=array(
						"com_comentario"=>utf8_encode($row['com_comentario']),
						"usuario"=>utf8_encode($row['usr_nombre']),
						"fecha"=>$row['fecha_comentario'],
						"calificacion"=>$row['cal_calificacion']
						
						);
						
						
						
						}	
						
					
				}
				
			}
			
			
			
			
			echo json_encode($datos);





 

		
		?>