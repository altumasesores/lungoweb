<?php

$nombre=$Usuario['usr_nombre'];
$sexo=$Usuario['usr_genero'];
$fechaNacimiento=$Usuario['usr_fecNacimiento'];
$fechaNacimiento=split("-",$fechaNacimiento,3);
$edad=$Usuario['usr_edad'];
$mes=$fechaNacimiento[1];
$dia=$fechaNacimiento[2];
$id_usuario=$Usuario['usr_id'];

$ciudadusr=$Usuario['usr_ciudad'];


$ciudades=array();
while($ciudad=$Ciudades->fetch())
{
	$ciudades[$ciudad['nom_ciudad']]=$ciudad['nom_ciudad'];
	}

$menuMeses="";		
$menuDias="";
if($mes=="00")
{
	$menuMeses="<option value='seleccionar'>Seleccionar</option>";
	}
if($dia=="00")
{
	$menuDias="<option value='seleccionar'>Seleccionar</option>";
	}
$meses=array(	
			"01"=>array("mes"=>"Enero","dias"=>"31"),
			"02"=>array("mes"=>"Febrero","dias"=>"28"),
			"03"=>array("mes"=>"Marzo","dias"=>"31"),
			"04"=>array("mes"=>"Abril","dias"=>"30"),
			"05"=>array("mes"=>"Mayo","dias"=>"31"),
			"06"=>array("mes"=>"Junio","dias"=>"30"),
			"07"=>array("mes"=>"Julio","dias"=>"31"),
			"08"=>array("mes"=>"Agosto","dias"=>"31"),
			"09"=>array("mes"=>"Septiembre","dias"=>"30"),
			"10"=>array("mes"=>"Octubre","dias"=>"31"),
			"11"=>array("mes"=>"Noviembre","dias"=>"30"),
			"12"=>array("mes"=>"Diciembre","dias"=>"31"),
			);
			
					
		for($i=1;$i<=12;$i++){
			if($i<10){$i="0".$i;}
			if($i==$mes){
			$menuMeses="<option value='$i'>".$meses[$i]['mes']."</option>".$menuMeses;			
			}else{
				$menuMeses.="<option value='$i'>".$meses[$i]['mes']."</option>";			
				
				}
			}
			
		$dias=$meses[$mes]['dias'];
		
		for($i=1;$i<=$dias;$i++)
		{
			if($i<10){$i="0".$i;}
			if($dia==$i){
			$menuDias="<option value='$i'>".$i."</option>".$menuDias;
			}else{
				$menuDias.="<option value='$i'>".$i."</option>";
				}
			}
			
			
			
			

if(!empty($sexo) && $sexo=="hombre")
{
	$hombre="checked='checked'";
	$mujer="";
	}
if(!empty($sexo) && $sexo=="mujer")
	{
		$hombre="";
		$mujer="checked='checked'";
		}
if(empty($sexo))
{
	$hombre="";
	$mujer="";
	}


if(empty($edad))
{
	$selectEdad="<option value='seleccionar'>[Seleccionar]</option>";
	}
	
for($i=16;$i<60;$i++)
{
	if($i==$edad){
	$selectEdad="<option value='$i'>$i</option>".$selectEdad;
	}
	else
	{
		$selectEdad.="<option value='$i'>$i</option>";
		}
}

foreach($ciudades as $key=>$value)
{
	if($ciudadusr==$value)
	{
		$selectCiudad="<option value='$value'>$value</option>".$selectCiudad;
		}else{
			
			$selectCiudad.="<option value='$value'>$value</option>";
			}
	}


?>
            <form id="FormModificarUsuario">
            <div class="column left">
           <input id="id_usuario" name="id_usuario" type="text" value="<?php echo $id_usuario;?>" style="display:none" />
             <section>
             <label>Nombre completo</label>
             <div>
             <input id="nombre" name="nombre" type="text" value="<?php echo $nombre;?>" required />
             </div>
             </section>
             
             <section id="genero">
             <label>Sexo</label>            
             <div>
             <label for="hombre">Hombre</label>
             <input type="radio" name="sexo" id="hombre" value="hombre" <?php echo $hombre;?> />             
             <label for="mujer">Mujer</label>
             <input type="radio" name="sexo" id="mujer" value="mujer" <?php echo $mujer;?> />             
             </div>
             </section>
             
             <section>
             
             <label>Edad</label>
             <div>
             <select id="edad" name="edad">
             <?php echo $selectEdad;?>
             </select>
             </div>
             
             <label>Mes</label>
             <div>
             <select id="mes" name="mes">
             <?php echo $menuMeses;?>
             </select>
             </div>
             
             <label>Día</label>
             <div>
             <select id="dia" name="dia">             
             <?php echo $menuDias;?>
             </select>
             </div>             
                 
             </section>
             
           
             
             <section>
             
             <label>Ciudad</label>
             <div>
             <select id="ciudad" name="ciudad">
             <?php echo $selectCiudad;?>
             </select>
             </div>           
             
             </section>
             
             <br />
             <br />
           </div>
           
           <div class="column right">
          
             <section>
             <label for="usuario">Usuario Actual</label>
             <div>
             <input type="email" id="usrActual" name="usuarioActual" placeholder="correo"  />
             </div>
             <label for="usuario">Nuevo Usuario</label>
             <div>
             <input type="email" id="usr" name="usuario" placeholder="correo"  />
             </div>
             </section>
             
             <section>
             <label for="password">Contraseña Actual<small>M&iacute;nimo 6 caracteres</small></label>
             <div>
             <input placeholder="mínimo 6 caracteres" name="passActual" id="passActual" type="password"   />             
             </div>
             
             <label for="password">Nueva Contraseña<small>M&iacute;nimo 6 caracteres</small></label>
             <div>
             <input placeholder="mínimo 6 caracteres" name="pass" id="pass" type="password"   />
             <input name="confirm_password" id="confirm_password" type="password" placeholder="Confirmar Contraseña"   />
             </div>
             </section>
             <br />
             <br />
             <br /><br />
             <br />
             <br /><br /><br /><br /><br /><br />
           </div>
            
            <input type="submit" class="button primary submit" value="Modificar" id="modificarUsuario" />            
            </form>