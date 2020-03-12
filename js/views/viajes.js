$(function() {
/*
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    toast({
      type: 'info',
      title: 'Doble click para ver la ubicacion!'
    });
*/

 $('#inpFecha').val(dateNow());

        function cargarData(datos){
        var source = {
            localData: datos,
            dataType: "array"
        };
        dataAdapter = new $.jqx.dataAdapter(source); 
        $("#gridConsolidados").jqxGrid({
            width: '99.5%',
            theme: 'material', 
            source: dataAdapter,
            sortable: false,
            pageable: true,
            pageSize: 20,
            pagerButtonsCount: 5,
            enableHover: false,
            selectionMode: 'none',
            columns: [
                  {
                      text: 'Ventas', align: 'left', dataField: 'model',
                      cellsRenderer: function (row, column, value, rowData) {

                          var punto = rowData.val;


                          var container = "<div>";
                          for (var i = 0; i < punto.length; i++) {
                              var punto = punto[i];
                              var item = "<div style='width: 100%; overflow: hidden; white-space: nowrap;'>";
                              var info = "<div style='background: #E9ECEF; margin: 5px; margin-left: 10px; margin-bottom: 3px; padding: 10px 15px; border-radius: 10pt; font-style: italic; font-size: 15px'>";
                              info += "<div class='row'><div class='col-6 col-sm-3'>Fecha: dfechadia</div><div class='col-6 col-sm-3'>Recaudado: rfecharecaudo</div><div class='col-6 col-sm-3'>Vehiculo: codigo</div><div class='col-6 col-sm-3'>Factura: factura</div><div class='col-6 col-sm-3' style='background: white; color: #039be5; font-weight: bold; border-radius: 5pt 5pt 5pt 5pt;'>Bruto: bruto</div><div class='col-6 col-sm-3' style='background: white; color: #039be5; font-weight: bold; border-radius: 5pt 5pt 5pt 5pt;'>Timbs: timbradas</div></div>";
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
        cargarData();
    });


    //cargarData();



});
