$(document).ready(function(e) {
	meses={
			"01":{"mes":"Enero","dias":"31"},
			"02":{"mes":"Febrero","dias":"28"},
			"03":{"mes":"Marzo","dias":"31"},
			"04":{"mes":"Abril","dias":"30"},
			"05":{"mes":"Mayo","dias":"31"},
			"06":{"mes":"Junio","dias":"30"},
			"07":{"mes":"Julio","dias":"31"},
			"08":{"mes":"Agosto","dias":"31"},
			"09":{"mes":"Septiembre","dias":"30"},
			"10":{"mes":"Octubre","dias":"31"},
			"11":{"mes":"Noviembre","dias":"30"},
			"12":{"mes":"Diciembre","dias":"31"},
			}	
	NumDias="";
	menuDias="";
		
	
	$("#contenidoEmpresas").on("change", "#mes", function(){		
		NumDias=meses[this.value].dias;			
			for(i=1;i<=NumDias;i++){
				if(i<10){dia="0"+i;}				
				dia=i;
				menuDias+="<option value='"+dia+"'>"+dia+"</option>"
				}
			$("#dia").html(menuDias);		
	
     
    });
	
	
	$("#contenidoEmpresas").on("submit", "#FormModificarUsuario", function(){
	
			hombre=$("#hombre").is(":checked");			
			mujer=$("#mujer").is(":checked");
			edad=$("#edad");
			dia=$("#dia");
			mes=$("#mes");
			password=$("#pass");
			confirm_password=$("#confirm_password");
			ciudad=$("#ciudad");
			if(!hombre && !mujer)
			{
				jAlert("Debe especificar un genero","Alerta");
				return false;				
				}
			if(edad.val()=="seleccionar")
			{
				jAlert("Debe especificar una edad","Alerta");
				edad.focus();
				return false;				
				}
			if(mes.val()=="seleccionar")
			{
				jAlert("Debe especificar un mes","Alerta");
				mes.focus();
				return false;				
				}
			
			if(dia.val()=="seleccionar")
			{
				jAlert("Debe especificar un dia","Alerta");
				dia.focus();
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
			
			if(ciudad.val()=="seleccionar")
			{
				jAlert("Debe especificar una ciudad","Alerta");				
				ciudad.focus();				
				return false;	
				}
				
			Usuario.ModificarUsuario('VistaPerfilUsuario');
			
			
			return false;
			
			
			
			});
			
	$("#contenidoEmpresas").on("change", "#usrActual", function(){		
		requerido=$("#usr").is(":required");
		usuario=this.value;
		
		if(!requerido && usuario!="")
		{
			
			$("#usr").attr("required","required");
			}else if(requerido && usuario==""){
				
			$("#usr").removeAttr("required");
			$("#usr").val();
				}
	});
	
	
	$("#contenidoEmpresas").on("change", "#passActual", function(){		
		requerido=$("#pass").is(":required");
		pass=this.value;
		
		if(!requerido && pass!="")
		{
			
			$("#pass").attr("required","required");
			$("#confirm_password").attr("required","required");
			
			}else if(requerido && pass==""){
				
			$("#pass").removeAttr("required");
			$("#confirm_password").removeAttr("required");
			$("#pass").val("");
			$("#confirm_password").val("");
				}
	});

	

		
	 
  
	
	
  
		
	
	


  
  
		
});
