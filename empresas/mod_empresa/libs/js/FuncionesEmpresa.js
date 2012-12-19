//**HEREDANDO el manejador de transacciones**//
//contruimos la clase del grupo.
var FuncionesEmpresa=function(){};
//heredamos del manejador y enviamos el grupo al que pertenece el conjunto de modulos.
FuncionesEmpresa.prototype=new transaccionesPostGet("");
//intanciamos el contructor de la clase del grupo,para evitar errores durante la herencia.
FuncionesEmpresa.prototype.constructor=FuncionesEmpresa;
/*
instanciamos la clase del grupo en la vistaPrincipal.php, que será la contenedora de todas las vistas,
ademas que será donde extenderemos la nueva clase de grupo "transaccionesClientes()" y le agregaremos los metodos 
que necesite el modulo especificado.
cada modulo dentro del grupo,tendra su propio contenedor de vistas, el cual realiza la misma funcion descrita arriba,
sin embargo en cada una extenderemos la clase y la instanciaremos segun los requerimientos de cada modulo,el fin de esto 
es separar los metodos requeridos por cada modulo, sin amontonar las funciones en un solo lugar.
*/

  FuncionesEmpresa.prototype.capaRegistro="cuerpo";//se puede sobreescribir

  FuncionesEmpresa.prototype.init_mod_nomina=function(parametros,capa,accion,tipo)
	{	
	    
		var controlador="Empresa";
		var capa=capa;
		var parametros=parametros;
		var accion=accion;
		var tipo=tipo;
		
		this.init(controlador,accion,parametros,capa,tipo)		
		this.construir_parametros();
		this.construir_url();		
		
	}
	
	
   
   
   FuncionesEmpresa.prototype.VistaPerfil=function(capa)//parametros,capa,accion,tipo
   {	   
	   var that=this;
	   var parametros={"id_usuario":$("#idUsuario").val()};
	   this.abrir_loader();	   
	   this.init_mod_nomina(parametros,null,"VistaPerfil","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
   }
   
   
   FuncionesEmpresa.prototype.VistaPromociones=function(capa)//parametros,capa,accion,tipo
   {
	 
	   var parametros={"id_usuario":$("#idUsuario").val()}; 
	   var that=this;	  
	   this.abrir_loader();	   
	   this.init_mod_nomina(parametros,null,"VistaPromociones","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
   }
   
    FuncionesEmpresa.prototype.VistaPerfilUsuario=function(capa)//parametros,capa,accion,tipo
   {	 
  
       var parametros={"id_usuario":$("#idUsuario").val()}; 
	   var that=this;	  
	   this.abrir_loader();	   
	   this.init_mod_nomina(parametros,null,"VistaPerfilUsuario","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
   }  
   
   
   FuncionesEmpresa.prototype.GuardarEmpresa=function(capa)
   {
	   
	   var that=this;	  
	   this.abrir_loader();	
	   this.formularioComoParametro("FormregistroEmpresa");   
	   this.init_mod_nomina(null,null,"GuardarEmpresa","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
		   }
		   
   FuncionesEmpresa.prototype.ModificarEmpresa=function(capa)
   {
	   
	   var that=this;	  
	   this.abrir_loader();	   
	    this.formularioComoParametro("FormregistroEmpresa");   
	   this.init_mod_nomina(null,null,"ModificarEmpresa","POST");			  
	   this.ejecutar(function(RespuestaAjax)
	   {
		   
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
		   }
	
	FuncionesEmpresa.prototype.UploadImage=function(capa)
	{
		this.abrir_loader();	
		var that=this;
		$.ajaxFileUpload
		(
			{
				url:'AnteFrontController.php',
				type:'POST',
				secureuri:false,
				fileElementId:'imagelogo',				
				dataType: 'json',
				data:{controlador:'Empresa',modulo:'empresa',accion:'UploadImage'},
				success: function (data)
				{
					if(data.cargado)
					{
						imagen="<img src='images/files/"+data.nombre+"'/>";	
						$("#nombreLogo").val(data.nombre)					
						$("#Capalogo").html(imagen);						 
						}else{
							$("#Capalogo").html("error al cargar, reintente!!");
							}
					that.cerrar_loader();
					
					
				},
				error: function (data, status, e)
				{
					alert("error")
					alert(status);
				}
			}
		)
	   
		   }
	
	FuncionesEmpresa.prototype.UploadImageFull=function(capa)
	{
		var image=$("#nombreLogo").val();
		this.url="AnteFrontController.php";
	   var that=this;	  
	   var parametros={"image":image}
	   this.abrir_loader();	   
	   //this.formularioComoParametro("FormregistroEmpresa");   
	   this.init_mod_nomina(parametros,null,"UploadImageFull","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   
		   that.url="http://www.mivacante.com/lungo/empresas/AnteFrontController.php";
		   $("#"+capa).html(RespuestaAjax);
		   that.ActualizarFotoEmpresa();
		   that.cerrar_loader();
		   });
		}
		
	FuncionesEmpresa.prototype.ActualizarFotoEmpresa=function()
	{
		var image=$("#nombreLogo").val();		
		var capa="VistaPerfil";
	   var that=this;	  
	   var parametros={"image":image,"id_usuario":$("#id_usuario").val(),"id_empresa":$("#id_empresa").val()}
	   this.abrir_loader();	   
	   //this.formularioComoParametro("FormregistroEmpresa");   
	   this.init_mod_nomina(parametros,null,"ActualizarFoto","POST");		
	   this.ejecutar(function(RespuestaAjax)
	   {
		   $("#"+capa).html(RespuestaAjax);
		   that.cerrar_loader();
		   });
		   
		}
   
  
   


		
		
var Empresas= new FuncionesEmpresa();
Empresas.setModulo("empresa");


// this.formularioComoParametro("Formregistro");	  



