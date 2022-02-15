 <script>  
  var dataPoints1 = [], dataPoints2 = [];
  var stockChart4 = new CanvasJS.StockChart("grafica_4",{
    theme: "light1",
    animationEnabled: true,
    title:{
      //text:"Multi-Series StockChart with Navigator"
    },
    subtitles: [{
      //text: "No of Trades: BTC/USD vs BTC/EUR"
    }],
    charts: [{
       axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "YYYY MMM DD",
          includeZero: true
        }
      },
      axisY: {
        title: "Contado  - Crédito",
        includeZero: true,
      },
      toolTip: {
        shared: true
      },
      legend: {
            cursor: "pointer",
            itemclick: function (e) {
              if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible)
                e.dataSeries.visible = false;
              else
                e.dataSeries.visible = true;
              e.chart.render();
            }
        },
      data: [{
        showInLegend: true,
        name: "Contado $",
        color: "#cfa712",
        yValueFormatString: "#,##0",
        xValueType: "dateTime",
        dataPoints : dataPoints1
      },{
        showInLegend: true,
        name: "Crédito $",
        color: "#274350",
        yValueFormatString: "#,##0",
        dataPoints : dataPoints2
      }]
    }],
    rangeSelector: {
      enabled: false
    },
    navigator: {
      data: [{
        dataPoints: dataPoints1
      }],
      slider: {
        minimum: new Date(2018, 00, 15),
        maximum: new Date(2018, 02, 01)
      }
    }
  });
  
<?php 
$res=Reportes::GraficaHistorialComprasContado();
$campos = $res->getCampos();
foreach($campos as $campo){
   $fechaterraje = $campo['fecha_reporte'];
   $cantidadm2 = $campo['totales'];
   $fechagraficada=date("Y-m-d",strtotime($fechaterraje."+ 1 day")); 
     ?> 
    dataPoints1.push({x: new Date("<?php echo($fechagraficada) ?>"), y: Number(<?php echo($cantidadm2) ?>)});
     <?php 
   }
?>

<?php 
$res=Reportes::GraficaHistorialComprasCredito();
$campos = $res->getCampos();
foreach($campos as $campo){
   $fechaterraje = $campo['fecha_reporte'];
   $cantidadm2 = $campo['totales'];
   $fechagraficada=date("Y-m-d",strtotime($fechaterraje."+ 1 day")); 
     ?> 
    dataPoints2.push({x: new Date("<?php echo($fechagraficada) ?>"), y: Number(<?php echo($cantidadm2) ?>)});
     <?php 
   }
?>

    stockChart4.render();
  ;
  

</script>