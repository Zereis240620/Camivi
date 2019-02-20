  	function onSuccess(imageURI) {
		var image = document.getElementById('viewimagem');
		image.src = imageURI;
	}

	function onFail(message) {
		alert('Failed because: ' + message);
	}

   function myTimer() {
	setTimeout(function(){
		$("#pagina-load").toggle("");
		$("#pagina-postagem").fadetoggle("");


	 }, 3000);

} myTimer();
  

  
  $(document).ready(function() {
    $("#inserirImagem").on('click',function() {
		navigator.camera.getPicture(onSuccess, onFail, { quality: 50,
			destinationType: Camera.DestinationType.FILE_URI,sourceType: Camera.PictureSourceType.PHOTOLIBRARY });


	});
    $("#tirarFoto").on('click',function() {
		   navigator.camera.getPicture(onSuccess, onFail, { quality: 50,
			destinationType: Camera.DestinationType.FILE_URI });

		});

   
     M.AutoInit();

	
	 $('#entreaqui').on('click',function(){
	 	$("#registrar").addClass("hide");
	 	$("#pagina-login").removeClass("hide");
	 });

	$('#insc').on("click",function(){
		$("#pagina-login").addClass("hide");
		$("#registrar").removeClass("hide");
	});

	$('#btfoto').on("click",function(){
		$('#viewimagem').removeClass("hide");
		$('#iconMidia').removeClass("hide");

	});
	$('#btentrar').on('click',function(){
		$("#pagina-login").addClass("hide");
		$("#pagina-load").removeClass("hide");

	});


    $('input#input_text, input#nome').characterCounter();
		
    $('input#input_text, input#email').characterCounter();
  	
	$('input#input_text, input#senha').characterCounter();

		  document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.input-field');
	    	var instances = M.FloatingActionButton.close(elems, {
	    	direction: 'low',

	    	});
	  });



	 





			

});
 
	var senha = $('#senha');
	var olho= $("#mostrasenha");

	olho.on('click',function() {
	  senha.attr("type", "text");
	});

	olho.mouseout(function() {
	  senha.attr("type", "password");
	});
	$( "#mostrasenha" ).mousedown(function() { 
	  $("#senha").attr("type", "password");
	});



 


