<?php 

   if (!isset($_SESSION)) 
   {
	   session_start();
   }
  
  /*
 function fatal_error_handler($buffer) {
  if (ereg("(error</b>:)(.+)(<br)", $buffer, $regs) ) {
    $err = preg_replace("/<.*?>/","",$regs[2]);
    error_log($err,1,'tu.email@de.alertas.com');
    return 'Mensaje de error personalizado para el usuario';
  }
  return $buffer;
}
*/





		
?>
<!DOCTYPE HTML>
<html>
<head>
<script src="libs/js/jquery/jquery-1.7.2.js"></script>   
<script src="libs/js/jquery.json/jquery.json-1.3.min.js"></script>   

   
<!--loader-->
    <link href="libs/css/loader/jquery.loader.css" rel="stylesheet" />
    <script src="libs/js/loader/jquery.loader.js"></script>
    <!-- -->
<!-- jAlert-->
    <script type="text/javascript" src="libs/js/jquery.alerts/jquery.alerts.js"></script>
    <link href="libs/css/jquery.alerts/jquery.alerts.css" rel="stylesheet" type="text/css" />
    <!-- -->
      <script src="libs/js/transaccionesPostGet.class.js"></script>
       <script src="mod_login/libs/js/FuncionesLogin.js"></script>
 
 <meta http-equiv="content-type" content="text/html;" charset="utf-8" />
  <meta http-equiv="content-language" content="en" />    

<title>Lungo Empresas</title>
</head>
<body>

<header align="center"><img src="images/logo_lungo.png" /></header>

<div id="cuerpo">
<?php
error_reporting(E_ALL); 
include('class.AdminError.php'); 
$error = new AdminError; 
if(isset($_SESSION['login']))
{   
   
	require_once("sistema/class.php");
	$sistema=new sistema();
	$sistema->registrado();	
	}
	else
	{
require_once("AnteFrontController.php");
	}
	
	
	

	
	
?> 
</div>
</body>
</html>