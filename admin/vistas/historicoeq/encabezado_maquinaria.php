<?php

$CMV   = CM_Volquetapormes($getequipo, $table_mes, $anoactual);
$INSV  = Insumosvolquetapormes($getequipo, $table_mes, $anoactual);
$PCV   = Comisionvolquetapormes($getequipo, $table_mes, $anoactual);
$ACPMV = AcpmfechaVolquetames($getequipo, $table_mes, $anoactual);

$A1 = Facturacionhorasmqporfecha($getequipo, $table_mes, $anoactual);
$A2 = Facturacionpromediomaquinames($getequipo, $table_mes, $anoactual);
$A3 = $CMV + $INSV + $PCV + $ACPMV;
$A4 = $A1 - $A3;
$A5 = metroscubicosvolquetames($getequipo, $table_mes, $anoactual);

$B1  = Totalhorasmqporfecha($getequipo, $table_mes, $anoactual);
$B2  = Totalmaximoporfecha($getequipo, $table_mes, $anoactual);
$B22 = Totalpromedioporfecha($getequipo, $table_mes, $anoactual);

$C1  = Diaslaboradosmaquinames($getequipo, $table_mes, $anoactual);
$C21 = AcpmmesEquipo($getequipo, $table_mes, $anoactual);
$C22 = AcpmconteoEquipo($getequipo, $table_mes, $anoactual);
$C23 = AcpmpromediotanqueoEquipo($getequipo, $table_mes, $anoactual);
$C4  = $C21 / $B1;


?>

<div class="row invoice-info">
<div class="col-sm-3 invoice-col">

<address>
<strong>Facturación: $<?php echo utf8_decode(number_format($A1, 0)) ?></strong><br>
Fact. Promedio : $<?php echo utf8_decode(number_format($A2, 0)) ?><br>
Total Gastos: $<?php echo utf8_decode(number_format($A3, 0)) ?><br>
<strong>Utilidad Neta: $<?php echo utf8_decode(number_format($A4, 0)) ?></strong><br>

</address>
</div>

<div class="col-sm-5 invoice-col">
<address>
<strong>Nº Horas : <?php echo utf8_decode(round($B1, 0)); ?> </strong><br>
Día Máximo: <?php echo utf8_decode(round($B2, 1)); ?> || Promedio Mes: <?php echo utf8_decode(round($B22, 1)); ?> <br>
<!--Km Efectivo: 1654 / GPS : 1876 / Km Muerto : 45 km <br>-->
Gasto ACPM: $<?php echo utf8_decode(number_format($ACPMV, 0)) ?><br>
Acpm: <?php echo utf8_decode(round($C21, 1)); ?> Gl / <?php echo utf8_decode(round($C22, 1)); ?> Tanqueos / Promedio <?php echo utf8_decode(round($C23, 1)); ?> Gl<br>
Rendimiento: <?php echo utf8_decode(round($C4, 1)); ?> Hr. por Gl<br>

</address>
</div>

<div class="col-sm-4 invoice-col">
<b>Días Operativos : <?php echo utf8_decode($C1); ?></b><br>
Días con falla: 0<br>
Ordenes de Trabajo: 0<br>
<b>Mto. Aceite-Filtros:</b> 0 <br>
<b>Cambio Llantas:</b> 0
</div>

</div>