$(function() {


    // $.ajax({
    //     url: "http://192.190.42.212:3000/vehiculos",
    //     type: "GET",
    //     dataType: 'JSON',
    //     contentType: 'application/json',
    //     beforeSend: function (xhr){ 
    //         xhr.setRequestHeader('Authorization', localStorage.getItem("token")); 
    //     },
    //     success: function (res){
    //         console.log(res)
    //     },
    //     error: function (res){
    //         console.log(res.responseJSON)
    //     }
    // });


	$("#btnCerrarSesion").click(function(){																	
		$(location).attr('href','../index.html');
		localStorage.removeItem('token');					
	});

	// FUNCIONES MENU
	$(".MenuLink").click(function(){
		switch($(this).attr('id')) {
			case "MenuDashboard":
			    cargarVistaIframe("dashboard.html");
			    break;
			case "MenuMapa":
			    cargarVistaIframe("mapa.html");
			    break;
			case "MenuExcesosVelocidad":
			    cargarVistaIframe("excesosVelocidad.html");
			    break;
			case "MenuViajes":
			    cargarVistaIframe("viajes.html");
			    break;
		}
	});

	function cargarVistaIframe(contenido){
		$("#divIframe").html("<iframe src="+contenido+" class='width100porciento height100porciento' frameborder='0' vspace='0' hspace='0' marginwidth='0' marginheight='0'/></iframe>");
	}


});