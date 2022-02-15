         <script>

var dataPoints = [];
  var stockChart = new CanvasJS.StockChart("grafica_1", {
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
        title: "Despachos General",
        prefix: "",
        suffix: "m3",
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "#,###.00m3",
        }
      },
      data: [{
        type: "area",
        color: "#FB8E00",
        xValueFormatString: "YYYY MMM DD",
        yValueFormatString: "#,###.##m3",
        dataPoints : dataPoints
      }]
    }],
    navigator: {
      slider: {
        minimum: new Date( <?php echo($anoactual); ?>, <?php echo($mesanterior-1); ?>, <?php echo($ayer); ?>),
        maximum: new Date( <?php echo($anoactual); ?>, <?php echo($mesactual); ?>, <?php echo($ayer); ?>),
      }
    },
     rangeSelector: {
      buttons: []
    }
  });

    <?php 
$res=Reportes::GraficaHistorialDespachos();
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
   
    stockChart.render();
  ;


</script>