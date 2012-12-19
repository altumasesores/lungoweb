        <form id="FormPromociones">  
              <input id="id_empresa" name="id_empresa" type="text" value="<?php echo $id_empresa;?>" style="display:none" /> 
               <input id="fechaRegistro" name="fechaRegistro" type="text" value="<?php echo date("Y-m-d");?>" style="display:none" />           
             <section>
             <label>Validez</label>
             <div>
             De:
             <input id="fechaInicio" name="fechaInicio" type="date" onFocus="javascript:calendarioNaranja('fechaInicio');" required  />
             A:
             <input id="fechaFin" name="fechaFin" type="date" onFocus="javascript:calendarioNaranja('fechaFin');"  required />
             </div>
             </section>
             
                        
             <section>
             <label>Promoci&oacute;n del Mes</label>
             <div>
             <input id="promocion" name="promocion" type="text" required />
             </div>
             </section>
             
             <section>
             <label>Bases de la Promoci&oacute;n</label>
             <div>
             <textarea id="bases" name="bases" required></textarea>             
             </div>
             </section>
             
             <section>
             <label>Restricciones de la Promoci&oacute;n</label>
             <div>
             <textarea id="restricciones" name="restricciones" required></textarea>             
             </div>
             </section>
             <input type='submit' class='button primary submit' value='Guardar' name='guardar' id='guardarPromocion' />
             </form> 
             
              <br />
            <br />
           
            
            <section>
            <div style="overflow:scroll">
            <table>
            <thead>
            <tr>
            <th>Descripci&oacute;n</th>          
            <th>Fecha de Registro</th>
            <th>Bases</th>
            <th>Restricciones</th>
            <th>Fecha Inicion Promoci&oacute;n</th>
            <th>Fecha Fin Promoci&oacute;n</th>            
            </tr>
            </thead>
            <tbody>
            <?php
			while($promocion=$promociones->fetch())
			{
				$descripcion=$promocion['prom_descripcion'];
				$fecRegistro=$promocion['fec_alta'];
				$bases=$promocion['prom_bases'];
				$restricciones=$promocion['prom_restricciones'];
				$fecInicio=$promocion['fec_inicioValidez'];
				$fecFin=$promocion['fec_finValidez'];
				
				?>     
            <tr>
            
            <td><?php echo $descripcion;?></td>
            <td><?php echo $fecRegistro;?></td>
            <td><?php echo $bases;?></td>
            <td><?php echo $restricciones;?></td>
            <td><?php echo $fecInicio;?></td>
            <td><?php echo $fecFin;?></td>
            </tr>
            <?php }?>
            </tbody>
            <tfoot></tfoot>
            </table>
            </div>
            </section>
           