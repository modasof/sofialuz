<script>
// Incio Tercera Gráfica 
  var dataPoints = [];
  var stockChart3 = new CanvasJS.StockChart("grafica_3", {
    //exportEnabled: true,
    title: {
      //text:"StockChart with Line using JSON Data"
    },
    subtitles: [{
      //text:"Historial Terraje Obinco"
    }],
    charts: [{
      axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "YYYY MMM DD"
        }
      },
      axisY: {
        title: "Consumo ACPM",
        prefix: "",
        suffix: "gl",
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "#,###.00gl",
        }
      },
      data: [{
        type: "line",
        color: "#FB8E00",
        xValueFormatString: "YYYY MMM DD",
        yValueFormatString: "#,###.##gl",
        dataPoints : dataPoints
      }]
    }],
    navigator: {
      slider: {
        minimum: new Date(2021, 01, 01),
        maximum: new Date(2021, 12, 31)
      }
    },
     rangeSelector: {
      buttons: []
    }
  });

    <?php 
$res=Reportes::GraficaHistorialConsumoAcpm();
$campos = $res->getCampos();
foreach($campos as $campo){
   $fechaterraje = $campo['fecha_reporte'];
   $cantidadm3 = $campo['totales'];
   $fechagraficada=date("Y-m-d",strtotime($fechaterraje."+ 1 day")); 
     ?> 
    dataPoints.push({x: new Date("<?php echo($fechagraficada) ?>"), y: Number(<?php echo($cantidadm3) ?>)});
     <?php 
   }
      ?>
   
    stockChart3.render();
  ;

  // Incio Cuarta Gráfica 
</script>