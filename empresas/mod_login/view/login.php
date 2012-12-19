<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <title>Admin Control Panel – Login</title>

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/visualize.css" />
    <link rel="stylesheet" href="css/datatables.css" />
    <link rel="stylesheet" href="css/buttons.css" />
    <link rel="stylesheet" href="css/checkboxes.css" />
    <link rel="stylesheet" href="css/inputtags.css" />
    <link rel="stylesheet" href="css/main.css" />
    
    <script src="mod_login/libs/js/FuncionesLogin.js"></script>
    <script src="mod_login/libs/js/login.js"></script>  
    <script src="mod_registro/libs/js/FuncionesRegistro.js"></script>
    <script src="mod_registro/libs/js/registro.js"></script>
   
    
    
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" />
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>  
 
    <div id="gradient">
      <div id="stars">
        <div id="container" class="logincontainer">
        
          <header>
          
            <!-- Logo -->
            <h1 id="logo"></h1>
          
          </header>
        
          <!-- The application "window" -->
          <div id="application">
            
           <nav id="secondary">
              <ul>
                <li class="current"><a href="#content">Login</a></li>
                <li ><a id="registro" href="#content2">Registro</a></li>
                <!--<li><a href="#">Forgot password</a></li>-->
              </ul>
            </nav>
          
            <!-- The content -->
            <section id="content" class="tab">

              <br /><br />
              <form id="Formlogin" >
                <section>
                  <label for="usuario">Mail</label>

                  <div>
                    <input type="email" id="usuario" name="usuario" placeholder="Usuario" required  />
                  </div>
                </section>
                

                <section>
                  <label for="password">Password</label>

                  <div>
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <br /><br /><input type="submit" value="Login" class="button primary" id="ingresar" />
                  </div>
                </section>
              </form>
              

            </section>
            
            <section id="content2" class="tab">
            <br /><br />
            <form id="Formregistro">
            
      
           
             <section>
             <label>Nombre completo</label>
             <div>
             <input id="nombre" name="nombre" type="text" required />
             </div>
             </section>
             
            
             
             <section>
             <label for="usuario">Usuario</label>
             <div>
             <input type="email" id="usr" name="usuario" placeholder="correo" required/>
             </div>
             </section>
             
             <section>
             <label for="password">Contraseña<small>M&iacute;nimo 6 caracteres</small></label>
             <div>
             <input placeholder="mínimo 6 caracteres" name="pass" id="pass" type="password" required />
             <input name="confirm_password" id="confirm_password" type="password" placeholder="Confirmar Contraseña" required />
             </div>
             </section>
             
             <br />
             <br />
           
             
            <input type="submit" class="button primary submit" value="Registarme" id="registrar" />            
            </form>
            </section>
            </div>
          </div>
        
          <footer id="copyright"></footer>
        </div>
      </div>
    </div> 
   
    
     
  </body>
</html>