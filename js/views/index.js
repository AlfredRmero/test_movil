$(function() {

	$("#btnlogin").click(function(){
		if($("#inputCedula").val()==""){
			swal({
			  title: 'Error!',
			  text: 'Debe digitar una cedula!',
			  type: 'error',
			  confirmButtonText: 'Ok'
			});
			return false;
		}

		if($("#inputPassword").val()==""){
			swal({
			  title: 'Error!',
			  text: 'Debe digitar una contraseña!',
			  type: 'error',
			  confirmButtonText: 'Ok'
			});
			return false;
		}

		$(location).attr('href','views/app.html');
			
	});





});