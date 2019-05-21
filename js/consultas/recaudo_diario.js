$(function() {

	function cargarData(paFecha){

		$('#gridDatos').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'codigo', type: 'string'},
                    {name: 'fechaViaje', type: 'string'},
                    {name: 'despacho', type: 'string'},
                    {name: 'conductor', type: 'string'},
                    {name: 'viaje', type: 'string'},
                    {name: 'fechaRecaudo', type: 'string'},
                    {name: 'timbradas', type: 'string'},
                ],
                data: {fecha: paFecha},
                url: "jsnRecaudoDiariobyFecha",     
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
                            {text: 'Codigo', datafield: 'codigo', width: 90},
                            {text: 'Fecha Viaje', datafield: 'fechaViaje',width: 100},
                            {text: 'Despacho', datafield: 'despacho', width: 100},
                            {text: 'Conductor', datafield: 'conductor', width: 350},
                            {text: 'Viaje', datafield: 'viaje' , width: 100},
                            {text: 'Fecha Recaudo', datafield: 'fechaRecaudo' , width: 160},
                            {text: 'Timbradas', datafield: 'timbradas' , width: 100, aggregates: ['sum'], aggregatesrenderer: aggregatesRender},
                        ]
        });    

	}

    $("#btnCargar").click(function(){
        cargarData($("#inpDate").val());
    });

	cargarData($("#inpDate").val());

});