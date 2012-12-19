<?php

				
//http://www.jqueryeasy.com/2011/12/09/subir-imagenes-al-servidor-con-ajax-y-guardarlas-en-una-tabla-mysql/
$guardar="";
$modificar="";
if(empty($Empresa))
{
	$boton="<input type='submit' class='button primary submit' value='Guardar' name='accion' id='GuardarEmpresa' />";
	}else{
		$boton="<input type='submit' class='button primary submit' value='Modificar' name='accion' id='ModificarEmpresa' /> ";
		}
	
$catEmpresa="";
$optionCategorias="";

/*$id_empresa=htmlentities($Empresa['emp_id']);
$ciudad=htmlentities($Empresa['emp_ciudad']);
$nombre=htmlentities($Empresa['emp_nombreComercial']);
$direccion=htmlentities($Empresa['emp_direccion']);
$detalles=htmlentities($Empresa['emp_detalles']);
$calificacion=htmlentities($Empresa['emp_calificacion']);
$geolocalizacion=htmlentities($Empresa['emp_geolocalizacion']);
$web=htmlentities($Empresa['emp_web']);
$facebook=htmlentities($Empresa['emp_facebook']);
$twitter=htmlentities($Empresa['emp_twitter']);
$mails=htmlentities($Empresa['emp_email']);//modificado
$google=htmlentities($Empresa['emp_googlePlus']);
$horarios=htmlentities($Empresa['emp_horarios']);
$telefono1=htmlentities($Empresa['emp_telefono1']);
$telefono2=htmlentities($Empresa['emp_telefono2']);
$imagen=htmlentities($Empresa['emp_imagenPerfil']);
$servProductos=htmlentities($Empresa['emp_serviciosProductos']);*/
$id_empresa=$Empresa['emp_id'];
$ciudad=$Empresa['emp_ciudad'];
$nombre=$Empresa['emp_nombreComercial'];
$direccion=$Empresa['emp_direccion'];
$detalles=$Empresa['emp_detalles'];
$calificacion=$Empresa['emp_calificacion'];
$geolocalizacion=$Empresa['emp_geolocalizacion'];
$web=$Empresa['emp_web'];
$facebook=$Empresa['emp_facebook'];
$twitter=$Empresa['emp_twitter'];
$mail=$Empresa['emp_email'];
$google=$Empresa['emp_googlePlus'];
$horarios=$Empresa['emp_horarios'];
$telefono1=$Empresa['emp_telefono1'];
$telefono2=$Empresa['emp_telefono2'];
$imagen=$Empresa['emp_imagenPerfil'];
$servProductos=$Empresa['emp_serviciosProductos'];

while($row=$categoriasEmpresa->fetch())
{
	$catEmpresa=$row['ctg_id'];
	}
while($row=$categorias->fetch()){
if($row['ctg_id']==$catEmpresa)
{
	$optionCategorias="<option value='".$row['ctg_id']."'>".htmlentities($row['ctg_descripcion'])."</option>".$optionCategorias;
	}else{
		$optionCategorias.="<option value='".$row['ctg_id']."'>".htmlentities($row['ctg_descripcion'])."</option>";
		}
}
?>

  



            <form id="FormregistroEmpresa" onsubmit="return false">
            <div class="column left">
             <input id="id_empresa" name="id_empresa" type="text" value="<?php echo $id_empresa;?>" style="display:none" /> 
             <input id="id_usuario" name="id_usuario" type="text" value="<?php echo $id_usuario;?>" style="display:none" />           
            <section>
             <label>Nombre del Establecimiento</label>
             <div>
             <input id="nombre" name="nombre" type="text" value="<?php echo $nombre;?>" required />
             </div>
             </section>
             
             <section>
             <label>Categor&iacute;a</label>
             <div>
              <select id="categoria" name="categoria">
             <?php echo $optionCategorias;?>
             </select>
             </div>
             </section>
             
             <section>
             <label>Ubicaci&oacute;n</label>
             <div>
             <input id="ubicacion" name="ubicacion" type="text" value="<?php echo $direccion;?>" required />
             </div>
             </section>
             
             <section>
             <label>Tel&eacute;fono1</label>
             <div>
             <input id="telefono1" name="telefono1" type="text" value="<?php echo $telefono1;?>" required />
             </div>
             </section>
             
             <section>
             <label>Tel&eacute;fono2</label>
             <div>
             <input id="telefono2" name="telefono2" type="text" value="<?php echo $telefono2;?>" required />
             </div>
             </section>
             
             <section>
             <label>Web</label>
             <div>
             <input id="web" name="web" type="text" value="<?php echo $web;?>" required />
             </div>
             </section>
             
             <section>
             <label>Email</label>
             <div>
             <input id="email" name="email" type="text" value="<?php echo $mail;?>" required />
             </div>
             </section>
             
           
              </div>
              
              <div class="column right">
                <section>
             <label>Facebook</label>
             <div>
             <input id="facebook" name="facebook" type="text" value="<?php echo $facebook;?>" required />
             </div>
             </section>
             
             <section>
             <label>Twitter</label>
             <div>
             <input id="twitter" name="twitter" type="text" value="<?php echo $twitter;?>" required />
             </div>
             </section>
             
             <section>
             <label>Detalles del Establecimiento</label>
             <div>
             <textarea id="detalles" name="detalles" required><?php echo $detalles;?></textarea>             
             </div>
             </section>
             
             <section>
             <label>Servicios/Productos</label>
             <div>
             <textarea id="servProductos" name="servProductos" required><?php echo $servProductos;?></textarea>
             </div>
             </section>
             
             <section>
             <label>Horarios de atenci&oacute;n</label>
             <div>
             <input id="horarios" name="horarios" type="text" value="<?php echo $horarios;?>" required />
             </div>
             </section>
             
              </div>
         
            <?php echo $boton;?>

            </form>
            <br />
            <br />
           
            
            <section>
            <div style="overflow:scroll">
            <table>
            <thead>
            <tr>
            <th>Nombre del Establecimiento</th>          
            <th>Categoría</th>
            <th>Ubicación</th>
            <th>Teléfono1</th>
            <th>Teléfono2</th>
            <th>Web</th>
            <th>Email</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Detalles del Establecimiento</th>
            <th>Servicios/productos</th>
            <th>Horarios de Atención</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td><?php echo $nombre;?></td>
            <td><?php echo $catEmpresa;?></td>
            <td><?php echo $direccion;?></td>
            <td><?php echo $telefono1;?></td>
            <td><?php echo $telefono2;?></td>
            <td><?php echo $web;?></td>
            <td><?php echo $mail;?></td>
            <td><?php echo $facebook;?></td>
            <td><?php echo $twitter;?></td>
            <td><?php echo $detalles;?></td>
            <td><?php echo $servProductos;?></td>
            <td><?php echo $horarios;?></td>   
            </tr>
            </tbody>
            <tfoot></tfoot>
            </table>
            </div>
            </section>
          