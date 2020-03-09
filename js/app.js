$(function() {

	const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

	toast({
      type: 'success',
      title: 'Bienvenido Sr(a). ' + $("#spanPropietario").html()
    });

	$("#btnCerrarSesion").click(function(){
		swal({
		  title: 'Seguro?',
		  text: "Desea cerrar sesion!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Cerrar Sesion',
		  cancelButtonText: 'Cancelar',
		}).then((result) => {
		  if (result.value) {																		
			
			$(location).attr('href','../views/login.html');					
				
				
		  }
		});
	});

	// FUNCIONES MENU
	$(".MenuLink").click(function(){
		switch($(this).attr('id')) {
			case "MenuDashboard":
			    cargarVistaIframe("../views/dashboard.html");
			    break;
			case "MenuMapa":
			    cargarVistaIframe("../views/mapa.html");
			    break;
			case "MenuExcesosVelocidad":
			    cargarVistaIframe("../views/excesosVelocidad.html");
			    break;
		}
	});


	function cargarVistaIframe(contenido){
		$("#divIframe").html("<iframe src="+contenido+" class='width100porciento height100porciento' frameborder='0' vspace='0' hspace='0' marginwidth='0' marginheight='0'/></iframe>");
	}



});