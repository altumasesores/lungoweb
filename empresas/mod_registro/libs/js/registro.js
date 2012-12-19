$(document).ready(function(e) {
		
		
		$("#Formregistro").bind("submit",function(){			
			password=$("#pass");
			confirm_password=$("#confirm_password");
			
			if(password.val().length<6)
			{
				jAlert("Debe especificar una contraseña de por lo menos 6 caracteres");
				return false;
				}
			
			
			if(password.val()!=confirm_password.val())
			{
				jAlert("El password no coincide, vuelva a proporcionarlo","Alerta");				
				confirm_password.val("");
				password.val("");
				password.focus();
				return false;	
				
				}
			
			
				
			Registro.Registro("Formregistro");
			
			return false;
			
			
			
			});

        
	
			
});
