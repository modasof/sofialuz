<script>
 // Incio Segunda Gráfica 
  var dataPoints = [];
  var stockChart2 = new CanvasJS.StockChart("grafica_2", {
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
        title: "Total Horas MQ",
        prefix: "",
        suffix: "hr",
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "#,###.00hr",
        }
      },
      data: [{
        type: "line",
        color: "#FB8E00",
        xValueFormatString: "YYYY MMM DD",
        yValueFormatString: "#,###.##hr",
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
$res=Reportes::GraficaHistorialRegistroHoras();
$campos = $res->getCampos();
foreach($campos as $campo){
   $fechaterraje = $campo['fecha_reporte'];
   $cantidadm2 = $campo['totales'];
   $fechagraficada=date("Y-m-d",strtotime($fechaterraje."+ 1 day")); 
     ?> 
    dataPoints.push({x: new Date("<?php echo($fechagraficada) ?>"), y: Number(<?php echo($cantidadm2) ?>)});
     <?php 
   }
      ?>
   
    stockChart2.render();
  ;
</script>