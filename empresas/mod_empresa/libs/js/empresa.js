$(document).ready(function(e) {	
    MenuPrimario="";
	MenuSecundario="";
	Menu={
		"PERFIL EMPRESA":{
			     "class":"",
				 "href":"perfil",
				 "icon":"icon dashboard",
				 "submenu":{
					        "Perfil Empresa":{
								     "class":"",
									 "href":"VistaPerfil"							      
								      },
							"Perfil Usuario":{
								     "class":"",
									 "href":"VistaPerfilUsuario"							      
								      }
					       }
			},
		"PROMOCIONES":{
			     "class":"",
				 "href":"promociones",
				 "icon":"icon pencil",
				 "submenu":{
					        "Promociones":{
								     "class":"",
									 "href":"VistaPromociones"							      
								      }
					       }
			}
		}
	
	//SE CREA EL MENU PRINCIPAL
	$.each(Menu,function(menu,componente){
		MenuPrimario+="<li class='"+componente.class+"'><a href='"+componente.href+"'><span class='"+componente.icon+"'></span>"+menu+"</a></li>";
		});
	$("nav#primary ul").append(MenuPrimario);
	//SE OCULTAN LOS BLOQUES SECTION O BLOQUES DE CONTENIDO QUE MOSTRARA EL SUBMENU
	$(".contenidoMenu").hide();
	//SI LA PRIMERA OPCION NO TIENE CLASE SE LE AGREGA Y SE CREA EL SUBMENU QUE LE CORRESPONDE
	if($("nav#primary ul li.current").length < 1) 
	{
		opcion=$("nav#primary ul li:first-child");
		opcion.addClass("current");
		
		posicion=opcion.text();
		Submenu=Menu[posicion].submenu;
		
		$.each(Submenu,function(submenu,componente){			
		MenuSecundario+="<li class='"+componente.class+"'><a href='"+componente.href+"'>"+submenu+"</a></li>";		
		});		
		
		$("nav#secondary ul").append(MenuSecundario);
		MenuSecundario="";
		
		    
		}
	//CON LOS SECTION OCULTOS AUN ESTAN VISIBLES(OCULTOS) LOS CONTENIDOS POR PESTAÑAS DEL SUBMENU
	//SE OCULTAN LOS CONTENIDOS DEL SUBMENU DENTRO LOS SECTION	
	$(".tab").hide();
	//INTERNAMENTE SE LE AGREGA UNA CLASE AL SUBMENU SI NO LA TIENE	
	if($("nav#secondary ul li.current").length < 1)
	{
		$("nav#secondary ul li:first-child").addClass("current");    
		}
		
	//HASTA AQUI YA SE CREO EL MENU Y SE SELECCIONO LA PRIMERA OPCION.
	//HASTA AQUI YA SE CREO EL SUBMENU Y SE CREO LA PRIMERA OPCION
	
	//HAORA MOSTRAMOS EL SECTION DE LA PRIMERA OPCION DEL MENU
	var link = $("nav#primary ul li.current a").attr("href");	
	$("#"+link).show();  
	//HASTA AQUI NO SE VE EL CONTENIDO DEL SUBMENU
	
	//AHORA MOSTRAMOS EL CONTENIDO DEL SUMBENU
	var link = $("nav#secondary ul li.current a").attr("href");
	$("#"+link).show();
	eval("Empresas."+link+"('"+link+"')");
	
	//AHORA ACTIVAMOS EL CLIQUEO DEL SUBMENU
	//AL DAR CLIC EN EL SUBMENU SE MOSTRARA EL CONTENIDO PARA ESE SUBMENU
	
		
	//HASTA AQUI EL CLIQUEO NO FUNCIONA
	//POR DEFAULT AL INICIO VEMOS EL CONTENIDO DE LA PRIMERA OPCION DEL MENU
	//POR DEFAULT AL INICIO VEMOS EL CONTENIDO DE LA PRIMERA OPCION DEL SUBMENU
	
	//ACTIVAMOS EL CLIQUEO DEL MENU PRINCIPAL
	$("nav#primary ul li a").live("click",function() {
		
		$("nav#secondary ul").html("");
		
		if(!$(this).hasClass("current")) {
			$("nav#primary ul li").removeClass("current");
			$(this).parent().addClass("current");
			
			
			$(".contenidoMenu").hide();
			
			posicion=$(this).text();
			Submenu=Menu[posicion].submenu;
			
			$.each(Submenu,function(submenu,componente){		  
			MenuSecundario+="<li class='"+componente.class+"'><a href='"+componente.href+"'>"+submenu+"</a></li>";
			});
			
			$("nav#secondary ul").append(MenuSecundario);
			MenuSecundario="";
			
			$(".tab").hide();
			
			if($("nav#secondary ul li.current").length < 1) {
				$("nav#secondary ul li:first-child").addClass("current");
				}
				
			var link = $(this).attr("href");
			$("#"+link).show();
			//initBackground();		
				
			var link = $("nav#secondary ul li.current a").attr("href");
			$("#"+link).show();
			eval("Empresas."+link+"('"+link+"')");
			}
    return false;
  });
  
  $("nav#secondary ul li a").live("click",function()	{
		
		if(!$(this).hasClass("current")) {
			$("nav#secondary ul li").removeClass("current");
			$(this).parent().addClass("current");
			$(".tab").hide();
			var link = $(this).attr("href");				
			$("#"+link).show();
			//initBackground();			
			}
		
		eval("Empresas."+link+"('"+link+"')");
			
			
		
	return false;
	});
	
	
	
	
	$("#contenidoEmpresas").on("submit", "#FormregistroEmpresa", function(){
		accion=$("#FormregistroEmpresa").find("input[name='accion']").attr("id");								
		eval("Empresas."+accion+"('VistaPerfil')");
		return false;
     
    });
	
	$("#contenidoEmpresas").on("change", "#imagelogo", function(){
		
		Empresas.UploadImage("Capalogo");
		
		});
	
	$("#contenidoEmpresas").on("click", "#subirLogo", function(){
		
		Empresas.UploadImageFull("Capalogo");
		
		});
	

	
	 
  
	
	
  
		
	
	


  
  
		
});
