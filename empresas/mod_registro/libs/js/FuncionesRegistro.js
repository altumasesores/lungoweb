//**HEREDANDO el manejador de transacciones**//
//contruimos la clase del grupo.
var FuncionesRegistro=function(){};
//heredamos del manejador y enviamos el grupo al que pertenece el conjunto de modulos.
FuncionesRegistro.prototype=new transaccionesPostGet("");
//intanciamos el contructor de la clase del grupo,para evitar errores durante la herencia.
FuncionesRegistro.prototype.constructor=FuncionesRegistro;
/*
instanciamos la clase del grupo en la vistaPrincipal.php, que será la contenedora de todas las vistas,
ademas que será donde extenderemos la nueva clase de grupo "transaccionesClientes()" y le agregaremos los metodos 
que necesite el modulo especificado.
cada modulo dentro del grupo,tendra su propio contenedor de vistas, el cual realiza la misma funcion descrita arriba,
sin embargo en cada una extenderemos la clase y la instanciaremos segun los requerimientos de cada modulo,el fin de esto 
es separar los metodos requeridos por cada modulo, sin amontonar las funciones en un solo lugar.
*/

  FuncionesRegistro.prototype.capaRegistro="cuerpo";//se puede sobreescribir

  FuncionesRegistro.prototype.init_mod_nomina=function(parametros,capa,accion,tipo)
	{	
	    
		var controlador="Registro";
		var capa=capa;
		var parametros=parametros;
		var accion=accion;
		var tipo=tipo;
		
		this.init(controlador,accion,parametros,capa,tipo)		
		this.construir_parametros();
		this.construir_url();		
		
	}
	
	FuncionesRegistro.prototype.ListaCiudades=function(capa)//parametros,capa,accion,tipo
   {	   
	   var that=this;
	   var ciudades="";
	   this.abrir_loader();		
	   this.init_mod_nomina(null,capa,"ListaCiudades","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   RespuestaAjax=jQuery.parseJSON(RespuestaAjax);
		   
		   $.each(RespuestaAjax,function(posicion,ciudad){			
				ciudades+="<option value='"+ciudad.id+"'>"+ciudad.ciudad+"</option>";
				});	
		   $("#"+capa).append(ciudades);
			
			that.cerrar_loader();
				
		});
   }
   
   
   FuncionesRegistro.prototype.Registro=function(formulario)//parametros,capa,accion,tipo
   {	    
	   var that=this;
	   this.formularioComoParametro(formulario);	  
	   this.abrir_loader();	   
	   this.init_mod_nomina(null,null,"Registro","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   RespuestaAjax=jQuery.parseJSON(RespuestaAjax);
		   if(RespuestaAjax.error)
		   {
			   jAlert(RespuestaAjax.usuario,'Error');
			   console.debug(RespuestaAjax.console);
			   }
			   else
			   {
				   if(RespuestaAjax.usuario!=null)
				   {
				   jAlert(RespuestaAjax.usuario,'Alerta');
				   }
				   console.debug(RespuestaAjax.console);
				   $("#"+that.capaRegistro).html(RespuestaAjax.response);
				   }
			
			that.cerrar_loader();
		   });	  
   }


		
		
var Registro= new FuncionesRegistro();
Registro.setModulo("registro");




