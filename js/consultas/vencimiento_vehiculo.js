$(function() {

	function cargarData(){

		$('#gridDatos').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    { name: 'id'},   
                    { name: 'fechaVencimiento', type:'date'}, 
                    { name: 'fechaVencimientoS', type:'string'}, 
                    { name: 'aseguradora', type:'string'},
                    { name: 'diasVencimiento', type:'int'},
                    { name: 'alertaVencimiento', type:'string'},
                    { name: 'alertar', type:'string'},                                        
                    { name: 'vencidoS', type:'string'},
                    { name: 'documento', type:'string'},
                    { name: 'codvehiculo', type:'string'},
                    { name: 'placa', type:'string'},                                
                ],
                id: 'id',
                url: "jsnVencimientosVehiculo",                                     
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
                            { text: 'Vencidos', datafield: 'vencidoS', width: 100, filtertype:'checkedlist'} ,
                            { text: 'Codigo', datafield: 'codvehiculo', width: 80} ,
                            { text: 'Documento', datafield: 'documento' ,  filtertype:'checkedlist', minwidth: 200} ,
                            { text: 'Aseguradora', datafield: 'aseguradora',  filtertype:'checkedlist' , minwidth: 250} ,   
                            { text: 'F. Vencimiento', datafield: 'fechaVencimiento' ,  width: 150, cellsformat:'dd/MM/yyyy', filtertype:'date'} ,                                
                            { text: 'Dias Faltantes', datafield: 'diasVencimiento', width: 80} ,
                        ]
        });    

	}


	cargarData();

});