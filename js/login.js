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

		$.post( "index.php/c_app/login", {cedula:$("#inputCedula").val(),pass: $("#inputPassword").val()}, function (data){																
			if(data.resultado){
				$(location).attr('href','');
			}else{						
				swal({
				  title: 'Error!',
				  text: data.message,
				  type: 'error',
				  confirmButtonText: 'Ok'
				});
			}
		},"json");

	});

});