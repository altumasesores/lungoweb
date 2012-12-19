

   var index=function(){
	   this.parametros=null;
	   }
   
   
   index.prototype=
   {
	   "login":function(user,password)
	   {
		   this.parametros=
		   {
			   "accion":"loguearSITE",
			   "controlador":"Login",
			   "modulo":"login",			
			   "usuario":user,
			   "password":password
		   };		
		},
		   
	   "registro":function(name,user,password)
	   {
		   this.parametros=
		   {
			   "accion":"Registro",
			   "controlador":"Registro",
			   "modulo":"registro",
			   "nombre":name,
			   "usuario":user,
			   "pass":password
			};
	   },
		   
	   "ejecutar":function(callback)
	   {
			$.ajax({
			type:"POST",
			url:"../empresas/AnteFrontController.php",
			data:this.parametros,
			success:function(RespuestaAjax)
			{
				RespuestaAjax=jQuery.parseJSON(RespuestaAjax);
				callback.call(this,RespuestaAjax);
				
				},
			});
		
		},
		
		"redireccionar":function()
		{
			this.parametros.accion="loguear";
			$().redirect('../empresas/index.php', this.parametros);
		}
		
		
		 
		 
	   }
	   
	   var indice=new index();

	  
