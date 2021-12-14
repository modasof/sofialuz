<?php 
if ($fechaform!="") {
      $arreglo=explode("-", $fechaform);
      $FechaIn=$arreglo[0];
      $FechaFn=$arreglo[1];
      $vectorfechaIn=explode("/", $FechaIn);
      $vectorfechaFn=explode("/", $FechaFn);
      $arreglofechauno=$vectorfechaIn[2]."-".$vectorfechaIn[0]."-".$vectorfechaIn[1];
      $arreglofechados=$vectorfechaFn[2]."-".$vectorfechaFn[0]."-".$vectorfechaFn[1];
      $FechaUno=str_replace(" ", "", $arreglofechauno);
      $FechaDos=str_replace(" ", "", $arreglofechados);
}
// Validación de la fecha en que inicia el Día

if ($FechaUno=="") {
  $FechaStart=$FechaInicioDia;
  $datofechain=$MarcaTemporal;
          }
else
  {
    $FechaStart=($FechaUno." 00:00:000");
    $datofechain=$FechaUno;
  }
// Validación de la fecha en que Termina el Día
if ($FechaDos=="") {
    $FechaEnd=$FechaFinalDia;
    $datofechafinal=$MarcaTemporal;
  }
else
  {
    $FechaEnd=($FechaDos." 23:59:000");
    $limpiarvariable=str_replace(" ", "", $FechaDos);
    $datofechafinal=$limpiarvariable;
  }


// Ventas Parte A1. (Agregados)
  $A101=ventaAgregadosporfecha($FechaStart,$FechaEnd);
  $A102=ventaAsfaltoporfecha($FechaStart,$FechaEnd);
  $A103=ventaAlquilerporfecha($FechaStart,$FechaEnd);
  $sumaA1=$A101+$A102+$A103;
  if ($sumaA1!=0) {
    $A101P=($A101/$sumaA1)*100;
    $A102P=($A102/$sumaA1)*100;
    $A103P=($A103/$sumaA1)*100;
  }
  else
  {
    $A101P=0;
    $A102P=0;
    $A103P=0;
  }

// Ingresos A2

  $IA1=IngresosPor($FechaStart,$FechaEnd,'Anticipo');
  $IA2=IngresosPor($FechaStart,$FechaEnd,'Prestamo Bancario');
  $IA3=IngresosPor($FechaStart,$FechaEnd,'Prestamo de Socios');
  $IA4=IngresosPor($FechaStart,$FechaEnd,'Aporte de Socios');
  $IA5=IngresosPor($FechaStart,$FechaEnd,'Factura');
  $IA6=IngresosPor($FechaStart,$FechaEnd,'Otros');

  $A201= $IA1+$IA5+$IA6;
  $A202= $IA2;
  $A203= $IA3;
  $A204= $IA4;

  $sumaA2=$A201+$A202+$A203+$A204;

  if ($sumaA2!=0) {
    $A201P=($A201/$sumaA2)*100;
    $A202P=($A202/$sumaA2)*100;
    $A203P=($A203/$sumaA2)*100;
    $A204P=($A204/$sumaA2)*100;
  }
  else
  {
    $A201P=0;
    $A202P=0;
    $A203P=0;
    $A204P=0;
  }

// Cuentas por Cobrar

  $AbonosAgregados=AbonosAgregados($FechaStart,$FechaEnd);
  $AbonosAlquiler=AbonosAlquiler($FechaStart,$FechaEnd);
  $SumaAbonos=$AbonosAgregados-$AbonosAlquiler;
  $A205=$sumaA1-$SumaAbonos;


// Módulo Gastos A3

  $GCA1=ComprasContadoRubro($FechaStart,$FechaEnd,1);
  $GCA2=ComprasContadoRubro($FechaStart,$FechaEnd,2);
  $GCA3=ComprasContadoRubro($FechaStart,$FechaEnd,3);
  $GCA4=ComprasContadoRubro($FechaStart,$FechaEnd,4);
  $GCA5=ComprasContadoRubro($FechaStart,$FechaEnd,5);

  $GCRA1=ComprasCreditoRubro($FechaStart,$FechaEnd,1);
  $GCRA2=ComprasCreditoRubro($FechaStart,$FechaEnd,2);
  $GCRA3=ComprasCreditoRubro($FechaStart,$FechaEnd,3);
  $GCRA4=ComprasCreditoRubro($FechaStart,$FechaEnd,4);
  $GCRA5=ComprasCreditoRubro($FechaStart,$FechaEnd,5);


  $A301=$GCA2+$GCA3+$GCA5+$GCRA2+$GCRA3+$GCRA5;
  $A302=$GCA4+$GCRA4;
  $A303=$GCA1+$GCRA1;

  $SumaA3=$A301+$A302+$A303;

// Cuentas pagas (Compras a Crédito)
  $A304=$GCRA2+$GCRA3+$GCRA5+$GCRA4+$GCRA1;

// Cuentas pagas (Compras a Contado)
  $A305=$GCA2+$GCA3+$GCA5+$GCA4+$GCA1;

if ($SumaA3!=0) {
    $A301P=($A301/$SumaA3)*100;
    $A302P=($A302/$SumaA3)*100;
    $A303P=($A303/$SumaA3)*100;
    $A304P=($A304/$SumaA3)*100;
    $A305P=($A305/$SumaA3)*100;
  }
  else
  {
    $A301P=0;
    $A302P=0;
    $A303P=0;
    $A304P=0;
    $A305P=0;
  }

$A306=AbonosCuentasPagar($FechaStart,$FechaEnd);

if ($A304!=0) {
  $A306P=($A306/$A304)*100;
}
else
{
 $A306P=0; 
}

 ?>