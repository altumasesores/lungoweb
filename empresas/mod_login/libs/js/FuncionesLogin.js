//**HEREDANDO el manejador de transacciones**//
//contruimos la clase del grupo.
var FuncionesLogin=function(){};
//heredamos del manejador y enviamos el grupo al que pertenece el conjunto de modulos.
FuncionesLogin.prototype=new transaccionesPostGet("");
//intanciamos el contructor de la clase del grupo,para evitar errores durante la herencia.
FuncionesLogin.prototype.constructor=FuncionesLogin;
/*
instanciamos la clase del grupo en la vistaPrincipal.php, que será la contenedora de todas las vistas,
ademas que será donde extenderemos la nueva clase de grupo "transaccionesClientes()" y le agregaremos los metodos 
que necesite el modulo especificado.
cada modulo dentro del grupo,tendra su propio contenedor de vistas, el cual realiza la misma funcion descrita arriba,
sin embargo en cada una extenderemos la clase y la instanciaremos segun los requerimientos de cada modulo,el fin de esto 
es separar los metodos requeridos por cada modulo, sin amontonar las funciones en un solo lugar.
*/

  FuncionesLogin.prototype.capaLogin="cuerpo";

  FuncionesLogin.prototype.init_mod_nomina=function(parametros,capa,accion,tipo)
	{	
	    
		var controlador="Login";
		var capa=capa;
		var parametros=parametros;
		var accion=accion;
		var tipo=tipo;
		
		this.init(controlador,accion,parametros,capa,tipo)		
		this.construir_parametros();
		this.construir_url();		
		
	}
	
	FuncionesLogin.prototype.Vistalogin=function()//parametros,capa,accion,tipo
   {
	   var that=this;
	   this.abrir_loader();		
		this.init_mod_nomina(null,null,"vistaLogin","POST");
		this.ejecutar(function(RespuestaAjax)
		{			
			$("#"+that.capaLogin).html(RespuestaAjax);			
			that.cerrar_loader();
				
		});
   }



   FuncionesLogin.prototype.login=function(parametros)//parametros,capa,accion,tipo
   {
	   //desde el registro, se reciben 2 parametros usr y pass para un login directo desde el registro.	   
	   if(parametros==null || parametros=="undefined")
	   {
		  parametros="";
		   } 
   
	   this.formularioComoParametro("Formlogin");
	   
	   var that=this;					
	   this.abrir_loader();		
	   this.init_mod_nomina(parametros,null,"loguear","POST");		
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
				   $("#"+that.capaLogin).html(RespuestaAjax.response);				   		
				   }
			that.cerrar_loader();		   
				
		});
			
	};
		
	
	
		
		
var Login= new FuncionesLogin();
Login.setModulo("login");




