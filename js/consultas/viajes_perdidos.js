$(function() {

	function cargarData(paFecha){

		$('#gridDatos').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'Fecha', type: 'string'},
                    {name: 'HoraDespacho', type: 'string'},
                    {name: 'Codigo', type: 'string'},
                    {name: 'Placa', type: 'string'},
                    {name: 'Conductor', type: 'string'},
                    {name: 'Turno', type: 'string'},
                    {name: 'Viaje', type: 'string'},
                    {name: 'Ruta', type: 'string'},
                    {name: 'Novedad', type: 'string'}                      
                ],
                data: {fecha: paFecha},
                url: "jsnViajesPerdidosbyFecha",     
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
                            {text: 'H. Despacho', datafield: 'HoraDespacho', width: '90'},
                            {text: 'Codigo', datafield: 'Codigo', width: '80'},
                            {text: 'Conductor', datafield: 'Conductor', minwidth: '200',  filtertype:'checkedlist'},
                            {text: 'Novedad', datafield: 'Novedad', width: '200',  filtertype:'checkedlist'},
                            {text: 'Turno', datafield: 'Turno', width: '80',  filtertype:'checkedlist'},
                            {text: 'Viaje', datafield: 'Viaje', width: '80',  filtertype:'checkedlist'},
                            {text: 'Ruta', datafield: 'Ruta', width: '150',  filtertype:'checkedlist'},
                            
                        ]
        });    

	}

    $("#btnCargar").click(function(){
        cargarData($("#inpDate").val());
    });

	cargarData($("#inpDate").val());

});