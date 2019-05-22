$(function() {

	const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

	var markers = {};

    var latMapa = "10.95996";
    var lonMapa = "-74.77578";
	var zoom = 14;
	var mapProp = {center: new google.maps.LatLng(latMapa, lonMapa), zoom: zoom, mapTypeId: google.maps.MapTypeId.ROADMAP};
	map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
	var infowindow = new google.maps.InfoWindow({
	    content: ''
	});

	function loadDatosVehiculos() {
	    $.ajax({
	        url: "jsnlistPosiciones",
	        type: "POST",
	        contentType: "application/json ; charset=UTF-8",
	        dataType: "JSON",
	        success: function (response) {
	            $.each(response, function (i, item) {
                    createMarker(parseFloat(item.Latitude), parseFloat(item.longitude), item.codigo, parseInt(item.Rumbo), parseInt(item.VelocidadKPH), item.FechaHora, item.placa, parseInt(item.idruta)); //SUJETA A CAMBIO 
                });
	            refreshVehiculos();
	            return false;
	        },
	        error: function (xhr) {
	            return false;
	        }
	    });
	}

	function refreshVehiculos() {
	    $.ajax({
	        url: "jsnlistPosiciones",
	        type: "POST",
	        contentType: "application/json ; charset=UTF-8",
	        dataType: "JSON",
	        success: function (response) {
		        $.each(response, function (i, item) {
		         	RefreshMarker(markers[item.codigo], parseFloat(item.Latitude), parseFloat(item.longitude), parseInt(item.Rumbo), item.IDEvento, item.codigo, parseInt(item.idruta),item.VelocidadKPH);
		    	});

				window.setTimeout(refreshVehiculos, 3000);
				return false;
			},
			error: function (xhr) {
			    return false;
			}
		});
	}
  	
  	function createMarker(lat, longi, codigo, rumbo, velocidad, hora, placa, ruta) {
        var marker = new MarkerWithLabel({
            position: {lat: lat, lng: longi},
            draggable: false,
            map: map,
            labelContent: codigo,
            labelAnchor: new google.maps.Point(22, 0),
            labelClass: "labels", // the CSS class for the label
            icon: imagenRumbo(rumbo, 2,true,ruta, velocidad),
            labelStyle: {opacity: 0.95},
            title: codigo, 
            ruta: ruta
        });
        markers[codigo] = markers[codigo] || marker;

    }

    function RefreshMarker(marker, lat, longi, rumbo, evento, codigo, ruta, velocidad) {
	    marker.setPosition(new google.maps.LatLng(lat, longi));
	    marker.setIcon(imagenRumbo(rumbo, evento, true, ruta, velocidad));
	    marker.ruta=ruta;
    }

    function Buscar(codigo) {
        marker = markers[codigo];
        if (marker == null) {
        	toast({
		      type: 'error',
		      title: 'No se encontro el vehiculo'
		    });
            return;
        }
        map.setCenter(marker.position);
        map.setZoom(16);
    }

    $("#btnBusqueda").click(function () {
        Buscar($("#inpVehiculo").val());
    });

    

    loadDatosVehiculos();
});