$(function() {

	function cargarData(paFecha){

		$('#gridDatos').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'fecha', type: 'string'},
                    {name: 'descuento', type: 'string'},
                    {name: 'Observacion', type: 'string'},
                    {name: 'nombre', type: 'string'},
                    {name: 'Codigo', type: 'string'},
                    {name: 'Placa', type: 'string'},
                    {name: 'Viaje', type: 'string'},
                    {name: 'cajero', type: 'string'},
                    {name: 'FechaViaje', type: 'string'}                    
                ],
                data: {fecha: paFecha},
                url: "jsnDescuentosTimbradasbyFecha",     
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
                        columns: [   
                            {text: 'Desc', datafield: 'descuento', width: '80'},
                            {text: 'Observacion', datafield: 'Observacion', minwidth: '200'},
                            {text: 'Tipo', datafield: 'nombre', minwidth: '200'},
                            {text: 'Codigo', datafield: 'Codigo', width: '80'},
                            {text: 'Viaje', datafield: 'Viaje', width: '80'},
                            {text: 'Fecha Viaje', datafield: 'FechaViaje', width: '120'},                           
                        ]
        });    

	}

    $("#btnCargar").click(function(){
        cargarData($("#inpDate").val());
    });

	cargarData($("#inpDate").val());

});