$(document).ready(function(){
    $.ajax({
      url: "../controllers/historial/ventas.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var valor = [];
        var fecha = [];
  
        for(var i in data) {
          valor.push("Player " + data[i].valtot);
          fecha.push(data[i].date);
        }
  
        var chartdata = {
          labels: player,
          datasets : [
            {
              label: 'Player Score',
              backgroundColor: 'rgba(200, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: score
            }
          ]
        };
  
        var ctx = $("#compras");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });