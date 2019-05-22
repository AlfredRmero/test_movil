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
			case "MenuMapa":
			    cargarVistaIframe("c_general/vstMapa");
			    break;
			case "MenuPuntosVirtuales":
			    cargarVistaIframe("c_general/vstPuntosVirtuales");
			    break;
			case "MenuAlarmas":
			    cargarVistaIframe("c_general/vstAlarmas");
			    break;
			    
		}
	});


	function cargarVistaIframe(contenido){
		$("#divIframe").html("<iframe src='index.php/"+contenido+"' class='width100porciento height100porciento' frameborder='0' vspace='0' hspace='0' marginwidth='0' marginheight='0'/></iframe>");
	}



});