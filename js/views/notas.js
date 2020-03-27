
    function cargarData(){
        $('#gridDatos').jqxGrid('clearfilters');
        var data;
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'fecha', type: 'string'},
                    {name: 'longi', type: 'string'},
                    {name: 'lati', type: 'string'},
                    {name: 'velocidad', type: 'string'},
                    {name: 'codigo', type: 'string'},
                ],
                data: {
                    fecha: $("#inpFecha").val(),
                    codigo: $("#inpVehiculo").val(),
                    velocidad: $("#inpVelocidad").val()
                },
                url: "jsnGetVelocidades",     
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
              altrows: true,                                 
              source: dataAdapter,                                         
              columns: [   
                  {
                    text: '#', sortable: false, filterable: false, editable: false,
                    groupable: false, draggable: false, resizable: false,
                    datafield: '', columntype: 'number', width: 50,
                    cellsrenderer: function (row, column, value) {
                        return "<div style='margin:4px;'>" + (value + 1) + "</div>";
                    }
                  },
                  {text: 'Fecha', datafield: 'fecha', minwidth: 150},
                  {text: 'Velocidad', datafield: 'velocidad', width: 100},
              ]
        });    

    }

    $("#btnCargar").click(function(){
        cargarData();
    });


    


    $('#gridDatos').on('rowdoubleclick', function (event) { 
        var row = event.args.row;
        var data = row.bounddata
        LatandLong = {lat: parseFloat(data.lati), lng: parseFloat(data.longi)};
        marker.setMap(null);
        marker.setMap(map);
        marker.setPosition(LatandLong);
        map.setCenter(LatandLong); 
        $.get("https://maps.googleapis.com/maps/api/geocode/json?latlng="+data.lati+","+data.longi+"&key=AIzaSyCTmzPsi_V7wWDAqSsT_59EEH0jYghx8zU",{},  function (geoData){   
            $("#lblDireccion").text(geoData.results[0].formatted_address);
        });
        $("#modalUbicar").modal();
    });

    //cargarData();

    $('#modalUbicar').on('shown.bs.modal', function (e) {
      $(".jqx-scrollbar-mobile").css("display", "none");
    })

    $('#modalUbicar').on('hidden.bs.modal', function (e) {
      $(".jqx-scrollbar-mobile").css("display", "block");
    })