<?php 
if ($fechaform2!="") {
      $Barreglo=explode("-", $fechaform2);
      $BFechaIn=$Barreglo[0];
      $BFechaFn=$Barreglo[1];
      $BvectorfechaIn=explode("/", $BFechaIn);
      $BvectorfechaFn=explode("/", $BFechaFn);
      $Barreglofechauno=$BvectorfechaIn[2]."-".$BvectorfechaIn[0]."-".$BvectorfechaIn[1];
      $Barreglofechados=$BvectorfechaFn[2]."-".$BvectorfechaFn[0]."-".$BvectorfechaFn[1];
      $BFechaUno=str_replace(" ", "", $Barreglofechauno);
      $BFechaDos=str_replace(" ", "", $Barreglofechados);
}
// Validación de la fecha en que inicia el Día

if ($BFechaUno=="") {
  $BFechaStart=$BFechaInicioDia;
  $Bdatofechain=$MarcaTemporal;
          }
else
  {
    $BFechaStart=($BFechaUno." 00:00:000");
    $Bdatofechain=$BFechaUno;
  }
// Validación de la fecha en que Termina el Día
if ($BFechaDos=="") {
    $BFechaEnd=$BFechaFinalDia;
    $Bdatofechafinal=$MarcaTemporal;
  }
else
  {
    $BFechaEnd=($BFechaDos." 23:59:000");
    $Blimpiarvariable=str_replace(" ", "", $BFechaDos);
    $Bdatofechafinal=$Blimpiarvariable;
  }


// Ventas Parte A1. (Agregados)
  $B101=ventaAgregadosporfecha($BFechaStart,$BFechaEnd);
  $B102=ventaAsfaltoporfecha($BFechaStart,$BFechaEnd);
  $B103=ventaAlquilerporfecha($BFechaStart,$BFechaEnd);
  $sumaB1=$B101+$B102+$B103;
  if ($sumaB1!=0) {
    $B101P=($B101/$sumaB1)*100;
    $B102P=($B102/$sumaB1)*100;
    $B103P=($B103/$sumaB1)*100;
  }
  else
  {
    $B101P=0;
    $B102P=0;
    $B103P=0;
  }

// Ingresos B2

  $IB1=IngresosPor($BFechaStart,$BFechaEnd,'Anticipo');
  $IB2=IngresosPor($BFechaStart,$BFechaEnd,'Prestamo Bancario');
  $IB3=IngresosPor($BFechaStart,$BFechaEnd,'Prestamo de Socios');
  $IB4=IngresosPor($BFechaStart,$BFechaEnd,'Aporte de Socios');
  $IB5=IngresosPor($BFechaStart,$BFechaEnd,'Factura');
  $IB6=IngresosPor($BFechaStart,$BFechaEnd,'Otros');

  $B201= $IB1+$IB5+$IB6;
  $B202= $IB2;
  $B203= $IB3;
  $B204= $IB4;

  $sumaB2=$B201+$B202+$B203+$B204;

  if ($sumaB2!=0) {
    $B201P=($B201/$sumaB2)*100;
    $B202P=($B202/$sumaB2)*100;
    $B203P=($B203/$sumaB2)*100;
    $B204P=($B204/$sumaB2)*100;
  }
  else
  {
    $B201P=0;
    $B202P=0;
    $B203P=0;
    $B204P=0;
  }

  // Cuentas por Cobrar

  $BAbonosAgregados=AbonosAgregados($BFechaStart,$BFechaEnd);
  $BAbonosAlquiler=AbonosAlquiler($BFechaStart,$BFechaEnd);
  
  $BSumaAbonos=$BAbonosAgregados-$BAbonosAlquiler;
  $B205=$sumaB1-$BSumaAbonos;


  // Módulo Gastos A3

  $GCB1=ComprasContadoRubro($BFechaStart,$BFechaEnd,1);
  $GCB2=ComprasContadoRubro($BFechaStart,$BFechaEnd,2);
  $GCB3=ComprasContadoRubro($BFechaStart,$BFechaEnd,3);
  $GCB4=ComprasContadoRubro($BFechaStart,$BFechaEnd,4);
  $GCB5=ComprasContadoRubro($BFechaStart,$BFechaEnd,5);

  $GCRB1=ComprasCreditoRubro($BFechaStart,$BFechaEnd,1);
  $GCRB2=ComprasCreditoRubro($BFechaStart,$BFechaEnd,2);
  $GCRB3=ComprasCreditoRubro($BFechaStart,$BFechaEnd,3);
  $GCRB4=ComprasCreditoRubro($BFechaStart,$BFechaEnd,4);
  $GCRB5=ComprasCreditoRubro($BFechaStart,$BFechaEnd,5);


  $B301=$GCB2+$GCB3+$GCB5+$GCRB2+$GCRB3+$GCRB5;
  $B302=$GCB4+$GCRB4;
  $B303=$GCB1+$GCRB1;

  $SumaB3=$B301+$B302+$B303;

// Cuentas pagas (Compras a Crédito)
  $B304=$GCRB2+$GCRB3+$GCRB5+$GCRB4+$GCRB1;

// Cuentas pagas (Compras a Contado)
  $B305=$GCB2+$GCB3+$GCB5+$GCB4+$GCB1;

  if ($SumaB3!=0) {
    $B301P=($B301/$SumaB3)*100;
    $B302P=($B302/$SumaB3)*100;
    $B303P=($B303/$SumaB3)*100;
    $B304P=($B304/$SumaB3)*100;
    $B305P=($B305/$SumaB3)*100;
  }
  else
  {
    $B301P=0;
    $B302P=0;
    $B303P=0;
    $B304P=0;
    $B305P=0;
  }
$B306=AbonosCuentasPagar($BFechaStart,$BFechaEnd);

if ($B304!=0) {
  $B306P=($B306/$B304)*100;
}
else
{
 $B306P=0; 
}

 ?>