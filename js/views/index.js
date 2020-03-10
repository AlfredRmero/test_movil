$(function() {

	$("#btnlogin").click(function(){
		if($("#inputCedula").val()==""){
			alert("Debe ingresar una cedula");
			return false;
		}

		if($("#inputPassword").val()==""){
			alert("Debe ingresar una contraseña");
			return false;
		}

		$(location).attr('href','views/app.html');
			
	});





});