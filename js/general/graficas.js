$(function() {
	
	var myLineChart;
    

	$("#btnCargar").click(function(){
		removeData(myLineChart);
		
		switch($("#inpGrafica").val()) {
			case "RecauDiario":
			    cargarDataGraficaRecaudo($("#inpVehiculo").val());
			    break;
			case "Combustible":
			    cargarDataGraficaCombustible($("#inpVehiculo").val());
			    break;
			case "PromDiario":
			    cargarDataGraficaPromedio($("#inpVehiculo").val());
			    break;
			case "TipoRecaudo":
			    cargarDataGraficaTipoRecaudo($("#inpVehiculo").val());
			    cargarGrillaTipoRecaudo($("#inpVehiculo").val());
			    break;
		}
	});

	function cargarDataGraficaRecaudo(pIdVehiculo){
		$.post( "../c_graficas/jsnSumBrutoPorDiaAndVehiculo", {idVehiculo: pIdVehiculo}, function (data){                                                                             
	        var keys = new Array();
	        var datos =  new Array();
	        $.each(data, function( index, value ) {
	          keys.push(value.fecha);
	          datos.push(value.bruto);
	        });
	        cargarGraficaRecaudo(keys, datos);
	    },"json");
	}

	function cargarDataGraficaCombustible(pIdVehiculo){
		$.post( "../c_graficas/jsnSumCombustiblePorDiaAndVehiculo", {idVehiculo: pIdVehiculo}, function (data){                                                                             
	        var keys = new Array();
	        var datos =  new Array();
	        $.each(data, function( index, value ) {
	          keys.push(value.fecha);
	          datos.push(value.valor);
	        });
	        cargarGraficaCombustible(keys, datos);
	    },"json");
	}

	function cargarDataGraficaPromedio(pIdVehiculo){
		var keys = new Array();
	    var datosV =  new Array();
	    var datosR =  new Array();

	    $.post( "../c_graficas/jsnPromRuta", {idVehiculo: pIdVehiculo}, function (data){                                                                             
	        $.each(data, function( index, value ) {
	          keys.push(value.fecha);
	          datosR.push(value.prom);
	        });
	        $.post( "../c_graficas/jsnPromVehiculo", {idVehiculo: pIdVehiculo}, function (data){                                                                             
		        $.each(keys, function(indexK, valueK) {
		        	var x = false;
		        	$.each(data, function(index, value) {
		        		if(valueK == value.fecha){
		        			x = true;
		        			datosV.push(value.prom);
		        		}
			        });
			        if(!x){
			        	datosV.push(0);	
			        }
		        });
		        cargarGraficaPromedios(keys,datosV,datosR);	
		    },"json");
	    },"json");
	}

	function cargarDataGraficaTipoRecaudo(pIdVehiculo){
	    $.post( "../c_graficas/jsnTipoRecaudo", {idVehiculo: pIdVehiculo}, function (data){                                                                             
	    	var keys = new Array("AUTOMATICO", "MANUAL");
		    var datos =  new Array();
		    var manual = 0;
		    var auto = 0;
	        $.each(data, function( index, value ) {
	          if(value.tipo=="AUTOMATICO"){
	          	auto += parseFloat(value.valor);
	          }else if (value.tipo=="MANUAL"){
	          	manual += parseFloat(value.valor);
	          }
	        });
	        datos.push(auto);
			datos.push(manual);
			cargarGraficaTipoRecaudo(keys, datos);
	    },"json");
	}


    function cargarGraficaRecaudo(pFechas, pBruto){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            var ctx = document.getElementById("myAreaChart");
            myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: pFechas,
                datasets: [{
                  label: "Bruto",
                  lineTension: 0.3,
                  backgroundColor: "rgba(2,117,216,0.2)",
                  borderColor: "rgba(2,117,216,1)",
                  pointRadius: 5,
                  pointBackgroundColor: "rgba(2,117,216,1)",
                  pointBorderColor: "rgba(255,255,255,0.8)",
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(2,117,216,1)",
                  pointHitRadius: 50,
                  pointBorderWidth: 2,
                  data: pBruto,
                }],
              },
              options: {
              	title: {
					display: true,
					text: 'Grafica bruto recaudado en los ultimos 15 dias',
					fontSize: 15,
					fontStyle: 500,
					padding: 20
				},
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false
                    },
                    ticks: {
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      min: 0
                    },
                    gridLines: {
                      color: "rgba(0, 0, 0, .125)",
                    }
                  }],
                },
                legend: {
                  display: true
                }
              }
            });
            
    }

    function cargarGraficaCombustible(pFechas, pValor){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            var ctx = document.getElementById("myAreaChart");
            myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: pFechas,
                datasets: [{
                  label: "Combustible",
                  lineTension: 0.3,
                  backgroundColor: "rgba(2,117,216,0.2)",
                  borderColor: "rgba(2,117,216,1)",
                  pointRadius: 5,
                  pointBackgroundColor: "rgba(2,117,216,1)",
                  pointBorderColor: "rgba(255,255,255,0.8)",
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(2,117,216,1)",
                  pointHitRadius: 50,
                  pointBorderWidth: 2,
                  data: pValor,
                }],
              },
              options: {
              	title: {
					display: true,
					text: 'Grafica gasto de combustible en los ultimos 15 dias',
					fontSize: 15,
					fontStyle: 500,
					padding: 20
				},
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false
                    },
                    ticks: {
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      min: 0
                    },
                    gridLines: {
                      color: "rgba(0, 0, 0, .125)",
                    }
                  }],
                },
                legend: {
                  display: true
                }
              }
            });
    }

    function cargarGraficaPromedios(pFechas, pValorV, pValorR){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            var ctx = document.getElementById("myAreaChart");
            myLineChart = Chart.Line(ctx, {
				data: {
					labels: pFechas,
					datasets: [{
						label: 'Prom. Vehiculo',
						borderColor: "#0275D8",
						backgroundColor: "#0275D8",
						fill: false,
						data: pValorV,
						yAxisID: 'y-axis-1',
					}, {
						label: 'Prom. Ruta',
						borderColor: "#f44336",
						backgroundColor: "#f44336",
						fill: false,
						data: pValorR,
						yAxisID: 'y-axis-2'
					}]
				},
				options: {
					responsive: true,
					hoverMode: 'index',
					stacked: false,
					title: {
						display: true,
						text: 'Grafica promedio vehiculo vs ruta en los ultimos 15 dias',
						fontSize: 15,
						fontStyle: 500,
						padding: 20
					},
					scales: {
						yAxes: [{
							type: 'linear',
							display: true,
							position: 'left',
							id: 'y-axis-1',
						}, {
							type: 'linear',
							display: true,
							position: 'right',
							id: 'y-axis-2',
							gridLines: {
								drawOnChartArea: false,
							},
						}],
					}
				}
			});
    }

    function cargarGraficaTipoRecaudo(pTipo, pValor){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            var ctx = document.getElementById("myAreaChart");
            myLineChart = new Chart(ctx, {
              type: 'pie',
				data: {
				datasets: [{
						data: pValor,
						backgroundColor: ["#0275D8", "#f44336"],
						label: 'Tipo Recaudo'
					}],
					labels: pTipo
				},
				options: {
					title: {
						display: true,
						text: 'Grafica detallando los tipos de recaudo en los ultimos 15 dias',
						fontSize: 15,
						fontStyle: 500,
						padding: 20
					},
					responsive: true
				}
            });
    }

    function cargarGrillaTipoRecaudo(pIdVehiculo){

		$('#gridDatos').jqxGrid('clearfilters');
        var data;
                    
        data =
            {
                datatype: "json",
                datafields: [   
                    {name: 'fecha', type: 'string'},
                    {name: 'tipo', type: 'string'},
                    {name: 'valor', type: 'string'},            
                ],
                data: {idVehiculo: pIdVehiculo},
                url: "../c_graficas/jsnTipoRecaudo",     
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
                            {text: 'Fecha', datafield: 'fecha', width: '100'},
                            {text: 'Tipo', datafield: 'tipo', minwidth: '300'},
                            {text: 'Valor', datafield: 'valor', width: '100', aggregates: ['sum'], aggregatesrenderer: aggregatesRender},                        
                        ]
        });  
        $("#divGrilla").css("display", "block");  
	}

    function removeData(chart) {
    	if(chart === undefined){
		}else{
			chart.data.labels.pop();
		    chart.data.datasets.pop();
		    chart.data.datasets.pop();
		    chart.update();
		}
		$('#gridDatos').jqxGrid('clear');
		$("#divGrilla").css("display", "none");
	}



});