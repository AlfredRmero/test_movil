$(function() {

    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    toast({
      type: 'warning',
      title: 'Por la cantidad de informacion y los complejos calculos esta vista puede presentar minimas demoras, Porfavor Espere!'
    });

	function cargarData(pFecha1, pFecha2, pVehiculo){

		$('#gridDatos').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'id', type: 'string'},
                    {name: 'idRuta', type: 'string'},
                    {name: 'Fecha', type: 'string'},
                    {name: 'idPropietario', type: 'string'},
                    {name: 'valCartulina', type: 'float'},
                    {name: 'viajes', type: 'string'},
                    {name: 'trimbadas', type: 'string'},
                    {name: 'descuento', type: 'string'},
                    {name: 'factura', type: 'float'},
                    {name: 'anticipo', type: 'float'},
                    {name: 'salario', type: 'float'},
                    {name: 'valdescuento', type: 'float'},
                    {name: 'rtica', type: 'float'},
                    {name: 'admon', type: 'float'},
                    {name: 'liquido', type: 'float'},
                    {name: 'idVehiculo', type: 'string'},
                    {name: 'pasaje', type: 'float'},
                    {name: 'bruto', type: 'float'},
                    {name: 'Combustiblesb', type: 'float'},
                    {name: 'Combustiblesc', type: 'float'},
                    {name: 'datosCartulina', type: 'string'},
                    {name: 'bruto', type: 'float'},
                ],
                data: {
                    fecha1: pFecha1,
                    fecha2: pFecha2,
                    idVehiculo: pVehiculo
                },
                url: "jsnIngresosbyFechasAndVehiculo",     
                type: 'POST'                                
            };  
        dataAdapter = new $.jqx.dataAdapter(data);         
		$("#gridDatos").jqxGrid({
                        width: '99.5%',
                        height: '99.5%',
                        theme: 'material',              
                        filterable: false,  
                        sortable: true,
                        showfilterrow: false,
                        columnsresize: true,        
                        groupable:true,                              
                        altrows: true,                                 
                        source: dataAdapter,  
                        showstatusbar: true,
                        showaggregates: true,                                            
                        columns: [   
                            {
                              text: '#', sortable: false, filterable: false, editable: false,
                              groupable: false, draggable: false, resizable: false,
                              datafield: '', columntype: 'number', width: 50,
                              cellsrenderer: function (row, column, value) {
                                  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                              }
                            },
                            {text: 'Fecha', datafield: 'Fecha', width: 100},
                            {text: 'Viajes', datafield: 'viajes',width: 80, aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Timb.', datafield: 'trimbadas', width: 80, aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Pasaje', datafield: 'pasaje', width: 100, cellsformat: 'c0', cellsalign: 'right'},
                            {text: 'Bruto', datafield: 'bruto' , width: 100, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Admon', datafield: 'admon' , width: 100, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Cartulina', datafield: 'valCartulina' , width: 100, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Comb. SC', datafield: 'Combustiblesc' , width: 100, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Comb. SB', datafield: 'Combustiblesb' , width: 100, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Factura', datafield: 'factura' , width: 100, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                            {text: 'Liquido', datafield: 'liquido' , width: 120, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                        ]
        });    

	}

    function cargarDataCartulina(pData){

        $('#gridDatosCartulina').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'name', type: 'string'},
                    {name: 'value', type: 'float'},
                ],
                localdata: pData                               
            };  
        dataAdapter = new $.jqx.dataAdapter(data);         
        $("#gridDatosCartulina").jqxGrid({
                        width: '99.5%',
                        height: '300px',
                        theme: 'material',              
                        filterable: false,  
                        sortable: true,
                        showfilterrow: false,
                        columnsresize: true,        
                        groupable:false,                              
                        altrows: true,                                 
                        source: dataAdapter,  
                        showstatusbar: true,
                        showaggregates: true,                                            
                        columns: [   
                            {
                              text: '#', sortable: false, filterable: false, editable: false,
                              groupable: false, draggable: false, resizable: false,
                              datafield: '', columntype: 'number', width: 50,
                              cellsrenderer: function (row, column, value) {
                                  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                              }
                            },
                            {text: 'Nombre', datafield: 'name', width: 277},
                            {text: 'Valor', datafield: 'value' , width: 120, cellsformat: 'c0', cellsalign: 'right', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                        ]
        });    

    }

    $("#btnCargar").click(function(){
        cargarData($("#inpDate1").val(), $("#inpDate2").val(), $("#inpVehiculo").val());
        toast({
          type: 'info',
          title: 'Doble click para el detalle de la cartulina!'
        });
    });

    $('#gridDatos').on('rowdoubleclick', function (event) { 
        var row = event.args.row;
        var data = row.bounddata
        cargarDataCartulina(data.datosCartulina);
        $("#modalCartulina").modal();
    });


});