/*
FUNCIONES ESPAGUETI DEL INDEX DE EMPRESAS
*/

$(document).ready(function(e) {
	
	//Cacheamos el evento submit del formulario de registro 	
	$("body").on("submit","#signin",function(e){
		
		indice.registro($("#nombre").val(),$("#correo").val(),$("#pass").val());
		indice.ejecutar(function(callback){
			
			if(callback.error)
			{
				alert(callback.usuario);
				console.debug(callback.console);
				e.preventDefault();
				}
				else
				{
					alert(callback.usuario);
					console.debug(callback.console);
					//indice.login($("#correo").val(),$("#pass").val());
					//indice.ejecutar(function(callback){});
					$("#username").val($("#correo").val());
					$("#password").val($("#pass").val());
					$("#signinlogin").trigger("submit");
					$("#username").val("");
					$("#password").val("");
					e.preventDefault();
					}
			});
	});
	
	$("body").on("submit","#signinlogin",function(e){
		
		indice.login($("#username").val(),$("#password").val());
		indice.ejecutar(function(callback){
			
			if(callback.error)
			{
				alert(callback.usuario);
				console.debug(callback.console);
				e.preventDefault();
				}
				else
				{
					console.debug(callback.console);				
					indice.redireccionar();						
					e.preventDefault();
					}
			
			});
		})

	$("body").on("click","#registro",function(e){
		
		$(".signin").trigger("click");		
		$("#nombre").focus();
		e.preventDefault();
		
		
		})
    
});

  