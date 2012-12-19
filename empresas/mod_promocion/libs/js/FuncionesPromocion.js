//**HEREDANDO el manejador de transacciones**//
//contruimos la clase del grupo.
var FuncionesPromocion=function(){};
//heredamos del manejador y enviamos el grupo al que pertenece el conjunto de modulos.
FuncionesPromocion.prototype=new transaccionesPostGet("");
//intanciamos el contructor de la clase del grupo,para evitar errores durante la herencia.
FuncionesPromocion.prototype.constructor=FuncionesPromocion;
/*
instanciamos la clase del grupo en la vistaPrincipal.php, que será la contenedora de todas las vistas,
ademas que será donde extenderemos la nueva clase de grupo "transaccionesClientes()" y le agregaremos los metodos 
que necesite el modulo especificado.
cada modulo dentro del grupo,tendra su propio contenedor de vistas, el cual realiza la misma funcion descrita arriba,
sin embargo en cada una extenderemos la clase y la instanciaremos segun los requerimientos de cada modulo,el fin de esto 
es separar los metodos requeridos por cada modulo, sin amontonar las funciones en un solo lugar.
*/

  FuncionesPromocion.prototype.capaRegistro="cuerpo";//se puede sobreescribir

  FuncionesPromocion.prototype.init_mod_nomina=function(parametros,capa,accion,tipo)
	{	
	    
		var controlador="Promocion";
		var capa=capa;
		var parametros=parametros;
		var accion=accion;
		var tipo=tipo;
		
		this.init(controlador,accion,parametros,capa,tipo)		
		this.construir_parametros();
		this.construir_url();		
		
	}
	
	
   
   
  
   
   FuncionesPromocion.prototype.GuardarPromocion=function(capa)
   {
	   var parametros={"id_usuario":$("#idUsuario").val()}; 
	   var that=this;	  
	   this.abrir_loader();	
	   this.formularioComoParametro("FormPromociones");   
	   this.init_mod_nomina(parametros,null,"GuardarPromocion","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
		   }
		   
  
   


		
		
var Promociones= new FuncionesPromocion();
Promociones.setModulo("promocion");


// this.formularioComoParametro("Formregistro");	  



