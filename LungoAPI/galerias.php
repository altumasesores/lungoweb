<?php header('Access-Control-Allow-Origin: *');
    
    $id_empresa=$_POST["id_empresa"];
	$dirFull = "../empresas/galerias/empresa".$id_empresa."/full/";
	$dirThumb = "../empresas/galerias/empresa".$id_empresa."/thumb/";
	
	$imagenes=array();
	$dr = opendir($dirFull);
	if (!$dr){
		echo "Error";
		exit();
	}
	else {
		while (($archivo = readdir($dr)) !== false) {
			
			if(filetype($dirFull . $archivo)!="dir"){
				//if(($archivo != "Thumbs.db") && ($archivo != ".htaccess")){
					/*if ($i == 0)
						$active = " class=\"active\"";
					else
						$active = "";*/
					//$tam = round(filesize($dirFull . $archivo)/1024, 0);
					$imagenes[]=array(
					                  "directorioFull"=>$dirFull,
									  "directorioThumb"=>$dirThumb,
									  "archivo"=>$archivo
									  );
					/*echo "<li".$active."><img src=\"".$dir.$archivo."\" alt=\"Archivo: ".$archivo."\" title=\"Archivo: ".$archivo." Tama&ntilde;o: ".$tam." Kb\"></li>";
					echo "active  ".$active."<br />";
					echo "dir  ".$dir."<br />";
					echo "archivo  ".$archivo."<br />";
					echo "tam  ".$tam."<br />";*/
					
					++$i;
				//}
			}
		}
		
		
		closedir($dr);
		
		if(count($imagenes)==0){
			$imagenes[]=array(
					                  "directorioFull"=>$dirFull,
									  "directorioThumb"=>$dirThumb,
									  "archivo"=>"vacio.png"
									  );
			}
		
		echo (json_encode($imagenes));
	}
	?>