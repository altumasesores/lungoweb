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
 $comentario="";
 $valoracion="";
 $id_empresa="";
 $id_usuario="";
 $fecha="";
 $calificacion="";

 $comentario=$_POST['opinion'];
 $valoracion=$_POST['valoracion'];
 $id_empresa=$_POST['emp_id'];
 $id_usuario=$_POST['id_usuario'];
 $fecha=date("Y-m-d");





$con= new dbConexion();



		if($con->conectar()==true){		
			$query_empresas = "insert into comentarios(emp_id,usr_id,com_comentario,fecha_comentario) values('$id_empresa','$id_usuario','$comentario','$fecha')";
			$empresas = mysql_query($query_empresas); 
			$com_id=mysql_insert_id();
			$comentario_error=mysql_error();
			
			$query = "select * from emp_calificacion ec where ec.emp_id='$id_empresa'";
			$resultado = mysql_query($query); 
			$filas=mysql_num_rows($resultado);
			
			if($filas<=0)
			{//primera vez
				$calificacion=$valoracion;		
				}else{
					while($row=mysql_fetch_array($resultado)){
						$calificacion+=$row['cal_calificacion'];
						}
						$calificacion+=$valoracion;
						$filas+=1;
						$calificacion=$calificacion/$filas;
						
						if($calificacion<=1)
						{
							$calificacion=1;
							}
							
						if($calificacion>1 && $calificacion<=2)
						{
							$calificacion=2;
							}
							
						if($calificacion>2 && $calificacion<=3)
						{
							$calificacion=3;
							}
						
						if($calificacion>3 && $calificacion<=4)
						{
							$calificacion=4;
							}
							
						if($calificacion>4 && $calificacion<=5)
						{
							$calificacion=5;
							}
					}
			$query1="update empresas set emp_calificacion='$calificacion' where emp_id='$id_empresa'";
			$query2="insert into emp_calificacion(emp_id,usr_id,com_id,cal_calificacion,fecha_calificacion) values('$id_empresa','$id_usuario','$com_id','$valoracion','$fecha')";
			
			$resultado1 = mysql_query($query1); 
			$valoracion_empresa_error=mysql_error();
			$resultado2 = mysql_query($query2); 
			$valoracion_error=mysql_error();
				
			$datos=array(
			"insercionComentario"=>"",
			"comentarioError"=>"",
			"insercionValoracion"=>"",
			"valoracionError"=>"",
			"insercionValoracionEmpresa"=>"",
			"valoracionEmpresaError"=>""			
			);
			
		
			if (!$empresas){
				$datos["insercionComentario"]="false";
			    $datos["comentarioError"]=utf8_encode($comentario_error);			 
				}else{
					$datos["insercionComentario"]="true";     			   
					}
					
			if (!$resultado1){
				$datos["insercionValoracion"]="false";
			    $datos["valoracionError"]=utf8_encode($valoracion_error);			 
				}else{
					$datos["insercionValoracion"]="true";     			   
					}
					
			if (!$resultado2){
				$datos["insercionValoracionEmpresa"]="false";
			    $datos["valoracionEmpresaError"]=utf8_encode($valoracion_empresa_error);			 
				}else{
					$datos["insercionValoracionEmpresa"]="true";     			   
					}
				
				
			
				
				
				
				
			}
			
			
		
		
	
			
			echo json_encode($datos);





 

		
		?>