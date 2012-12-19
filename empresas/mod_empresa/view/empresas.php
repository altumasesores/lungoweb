<!DOCTYPE html>
<html><head>
    <meta charset="utf-8" />

    <title>Admin Control Panel</title>

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/visualize.css" />
    <link rel="stylesheet" href="css/datatables.css" />
    <link rel="stylesheet" href="css/buttons.css" />
    <link rel="stylesheet" href="css/checkboxes.css" />
    <link rel="stylesheet" href="css/inputtags.css" />
    <link rel="stylesheet" href="css/main.css" />
    
    <script src="libs/js/jquery/jquery-1.7.2.js"></script>
    
    <!--CALENDARIO NARANJA-->

<!--<script type="text/javascript"
	src="../js/calendarioNaranja/jquery-1.4.2.js"></script>-->
<script type="text/javascript"	src="libs/js/calendarioNaranja/jquery.ui.core.js"></script>
<script type="text/javascript"	src="libs/js/calendarioNaranja/jquery.ui.widget.js"></script>
<script type="text/javascript"	src="libs/js/calendarioNaranja/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript"	src="libs/js/calendarioNaranja/jquery.ui.datepicker.js"></script>

<link type="text/css"	href="libs/js/calendarioNaranja/jquery-ui-1.8.4.custom.css"	rel="stylesheet" />
<link type="text/css" href="libs/js/calendarioNaranja/demos.css"	rel="stylesheet" />



<script type="text/javascript">
	function calendarioNaranja(fecha) {
				var f = '#' + fecha;
				
			 $(function() {
				$(f).datepicker({
					showOn: 'both', //Parametro para que se vea el icono del calendario
					buttonImageOnly: true, //Indicamos si queremos que solo se vea el icono y no el botón
					buttonImage: 'img/calendar.gif', //Indicamos el icono del botón
					firstDay: 1, //El primer día será el 1
					changeMonth: true, //Si se pueden cambiar los meses
					changeYear: true //Si se pueden cambiar los años
				});
			}); 
	}		
</script>
<!--TERMINA CALENDARIO NARANJA--->

    
    <!--loader-->
    <link href="libs/css/loader/jquery.loader.css" rel="stylesheet" />
    <script src="libs/js/loader/jquery.loader.js"></script>
    <!-- -->
    <!-- jAlert-->
    <script type="text/javascript" src="libs/js/jquery.alerts/jquery.alerts.js"></script>
    <link href="libs/css/jquery.alerts/jquery.alerts.css" rel="stylesheet" type="text/css" />
    <!-- -->
    <script src="libs/js/transaccionesPostGet.class.js"></script>
    
    <script src="mod_empresa/libs/js/FuncionesEmpresa.js"></script>
    <script src="mod_empresa/libs/js/empresa.js"></script>
    
    <script src="mod_usuario/libs/js/FuncionesUsuario.js"></script>
    <script src="mod_usuario/libs/js/usuario.js"></script>
    
    
    <script src="mod_promocion/libs/js/FuncionesPromocion.js"></script>
    <script src="mod_promocion/libs/js/promocion.js"></script>

    
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" />
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
  <input type="text" style="display:none" value="<?php echo $id_usuario?>" id="idUsuario" name="idUsuario" />
    <div id="gradient">
      <div id="stars">
        <div id="container">
        
          <header>
          
            <!-- Logo -->
            <h1 id="logo">Panel Administradores</h1>
          
            <!-- User info -->
            <div id="userinfo">
              <img src="img/avatar.png" alt="Bram Jetten" />
              <div class="intro">
                Welcome Bram<br />               
              </div>
            </div>
          
          </header>
        
          <!-- The application "window" -->
          <div id="application">
          
            <!-- Primary navigation -->
            <nav id="primary">
              <ul>
               <!--
               <li class="current">
                  <a href="perfil">
                    <span class="icon dashboard"></span>
                    Perfil
                  </a>
                </li>
                -->               
              </ul>
            
             <!-- <input type="text" id="search" placeholder="Realtime search..." />-->
            </nav>
            
            
          
            <!-- Secondary navigation -->
            <nav id="secondary">
              <ul>
              <!--
                <li class="current">
                    <a href="Pperfil">
                       Main tab
                    </a>
                </li>               
                -->
              </ul>
              
            </nav>
          
            <!-- The content -->
            <section id="contenidoEmpresas">
            
            <section id="perfil" class="contenidoMenu">
             <div class="tab" id="VistaPerfil">            
             </div>
             <div class="tab" id="VistaPerfilUsuario">            
             </div>
             </section>
            
             <section id="promociones" class="contenidoMenu">
             <div class="tab" id="VistaPromociones">
             promociones       
             </div>
             </section>
            
             </section>
             
             
          </div>
        
          <footer id="copyright"></footer>
        </div>
      </div>
    </div>

    <!-- JavaScript 
    <script src="js/excanvas.js"></script>
    
    <script src="js/jquery.livesearch.js"></script>
    <script src="js/jquery.visualize.js"></script>
    <script src="js/jquery.datatables.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.selectskin.js"></script>
    <script src="js/jquery.checkboxes.js"></script>
    <script src="js/jquery.wymeditor.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.inputtags.js"></script>
    <script src="js/notifications.js"></script>
    <script src="js/application.js"></script>-->
  </body>
</html>

