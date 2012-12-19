$(document).ready(function(e) {
	
	
	$('#Formlogin').bind("submit",function(e) {
		Login.login();
		return false;
		});
	
	
	


 /**
   * Functional secondary menu using tabs
   */
  
  $(".tab").hide();
  
  if($("nav#secondary ul li.current").length < 1) {
    $("nav#secondary ul li:first-child").addClass("current");    
  }
  
  var link = $("nav#secondary ul li.current a").attr("href");
  $(link).show();
  
  $("nav#secondary ul li a").click(function() {
    if(!$(this).hasClass("current")) {
      $("nav#secondary ul li").removeClass("current");
      $(this).parent().addClass("current");
      $(".tab").hide();
      var link = $(this).attr("href");
	  $(link+" input").each(function(){
		  $(this+":text").val("");
		  $(this+"[type='email']").val("");
		  $(this+":password").val("");
		  });
      $(link).show();
      initBackground();
    }
    return false;
  });
  
  function initBackground() {
    if($('#container').height() < window.innerHeight) {
      $('#container').height(window.innerHeight);
    }
  }
  
  initBackground();
  
  });