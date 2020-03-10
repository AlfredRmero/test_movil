$(function() {

/*
	  $.post( "jsnCountAlarmasCriticas", {}, function (data){                                                                             
        $("#divAlarmasC").html(data[0].valor + " Alarmas Criticas");          
    },"json");

    $.post( "jsnCountAlarmasNOCriticas", {}, function (data){                                                                             
        $("#divAlarmasB").html(data[0].valor + " Alarmas Basicas");
    },"json");

    $.post( "jsnGraficaTopVehiculos", {}, function (data){                                                                             
        var fechas = new Array();
        var vehiculos =  new Array();
        $.each(data, function(index, value) {
          fechas.push(value.fecha + "\n Veh. " + value.Codigo);
          vehiculos.push(value.valor);
        });
        cargarGrafica(fechas, vehiculos);
    },"json");
*/

  function cargarGrafica(pFechas, pValor){
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';

      var ctx = document.getElementById("myAreaChart");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: pFechas,
          datasets: [{
            label: "Alarmas Totales",
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