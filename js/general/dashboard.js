$(function() {

	   $.post( "../c_consultas/jsnCountVencimientosVehiculo", {}, function (data){                                                                             
        $("#divCountVenciVehi").html(data[0].valor + " Vencimientos del Mes");          
    },"json");

    $.post( "../c_consultas/jsnCountViajesPerdidos", {}, function (data){                                                                             
        $("#divCountViajesPerdidos").html(data[0].valor + " Viajes Perdidos");
    },"json");

    $.post( "../c_consultas/jsnCountDescuentosTimbradas", {}, function (data){                                                                             
        $("#divCountDescTim").html(data[0].valor + " Descuentos Timbradas");
    },"json");

    $.post( "../c_consultas/jsnCountRecaudoDiario", {}, function (data){                                                                             
        $("#divCountRecaudoDiario").html(data[0].valor + " Recaudos de Hoy");
    },"json");

    $.post( "../c_graficas/jsnSumTotalTimbradasPorDia", {}, function (data){                                                                             
        var fechas = new Array();
        var tims =  new Array();
        $.each(data, function( index, value ) {
          fechas.push(value.fecha);
          tims.push(value.tim);
        });
        cargarGrafica(fechas, tims);
    },"json");


    function cargarGrafica(pFechas, pTimbradas){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: pFechas,
                datasets: [{
                  label: "Timbradas Totales",
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
                  data: pTimbradas,
                }],
              },
              options: {
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





});