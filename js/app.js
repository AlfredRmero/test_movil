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
		   		$.post( "index.php/c_app/logout", {}, function (data){																				
					if(data.resultado){
						$(location).attr('href','');					
					}
				},"json");
		  }
		});
	});

	// FUNCIONES MENU
	$(".MenuLink").click(function(){
		switch($(this).attr('id')) {
			case "MenuDashboard":
			    cargarVistaIframe("c_general/vstDashboard");
			    break;
			case "MenuVenciVehiculos":
			    cargarVistaIframe("c_consultas/vstVencimientoVehiculo");
			    break;
			case "MenuViajesPerdidos":
			    cargarVistaIframe("c_consultas/vstViajesPerdidos");
			    break;
			case "MenuRecaudoDiario":
			    cargarVistaIframe("c_consultas/vstRecaudoDiario");
			    break;	
			case "MenuDescuTimbradas":
			    cargarVistaIframe("c_consultas/vstDescuentosTimbradas");
			    break;	
			case "MenuGraficas":
			    cargarVistaIframe("c_general/vstGraficas");
			    break;
			case "MenuIngresos":
			    cargarVistaIframe("c_consultas/vstIngresos");
			    break;
		}
	});


	function cargarVistaIframe(contenido){
		$("#divIframe").html("<iframe src='index.php/"+contenido+"' class='width100porciento height100porciento' frameborder='0' vspace='0' hspace='0' marginwidth='0' marginheight='0'/></iframe>");
	}



});