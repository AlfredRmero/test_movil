$(function() {

	$("#btnlogin").click(function(){
		
		if($("#inputCedula").val()==""){
			swal({
			  title: 'Error!',
			  text: 'Debe digitar una cedula!',
			  type: 'error',
			  confirmButtonText: 'Ok'
			});
		}

		if($("#inputPassword").val()==""){
			swal({
			  title: 'Error!',
			  text: 'Debe digitar una contraseña!',
			  type: 'error',
			  confirmButtonText: 'Ok'
			});
		}

		
		$(location).attr('href','../views/index.html');
			

	});

});