$(function() {

    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    function AjaxDatosGrilla(pFecha, pVehiculo) {  // AJAX QUE LLENA GRILLA
         $.ajax({
            url: "jsnlistPuntos",
            type: "POST",
            dataType: "JSON",
            data: {fecha: pFecha, vehiculo: pVehiculo},
            success: function (response) {
                var rtn = [];
                $.each(response, function(key, value) {
                    rtn.push({val:[{hora: value.hora, PuntoVirtual: value.PuntoVirtual, PasajerosDia: value.PasajerosDia, subidas: value.subidas, bajadas: value.bajadas, bloqueo: value.bloqueo, Registradora: value.Registradora}]});
                });
                cargarData(rtn);
                return false;
            },
            error: function (xhr) {
                return false;
            }
        });
    }        

	function cargarData(datos){
        var source =
        {
            localData: datos,
            dataType: "array"
        };
        dataAdapter = new $.jqx.dataAdapter(source); 
        $("#gridDatos").jqxDataTable({
                width: '99.5%',
                height: '99%',
                theme: 'material', 
                source: dataAdapter,
                sortable: false,
                pageable: true,
                pagerButtonsCount: 3,
                enableHover: false,
                selectionMode: 'none',
                columns: [
                      {
                          text: 'Puntos', align: 'left', dataField: 'model',
                          cellsRenderer: function (row, column, value, rowData) {
                              var punto = rowData.val;
                              var container = "<div>";
                              for (var i = 0; i < punto.length; i++) {
                                  var punto = punto[i];
                                  var item = "<div style='width: 100%; overflow: hidden; white-space: nowrap;'>";
                                  var info = "<div style='background: #E9ECEF; margin: 5px; margin-left: 10px; margin-bottom: 3px; padding: 15px; border-radius: 10pt; font-style: italic; font-size: 15px'>";
                                  info += "<div class='row'><div class='col-sm-6'>Hora: "+punto.hora+"</div><div class='col-sm-6' style='background: white; color: #039be5; font-weight: bold'>Punto: "+punto.PuntoVirtual+"</div></div>";
                                  info += "<div class='row' style='margin-top: 5px'><div class='col-sm-3 col-6'>Pasajeros: "+punto.PasajerosDia+"</div><div class='col-sm-3 col-6'>Registr.: "+punto.Registradora+"</div><div class='col-sm-3 col-6'>Bloqueos: "+punto.bloqueo+"</div><div class='col-sm-3 col-6'>Sub / Baj: "+punto.subidas+ " / " +punto.bajadas+"</div></div>";
                                  info += "</div>";
                                  item += info;
                                  item += "</div>";
                                  container += item;
                              }
                              container += "</div>";
                              return container;
                          }
                      }
                ]
            });       
	}

    $("#btnCargar").click(function(){
        AjaxDatosGrilla($("#inpDate").val(), $("#inpVehiculo").val());
    });



});
