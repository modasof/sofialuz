<?php
//Include database configuration file
include '../../include/class.conexion.php';

$field_lista=$_POST['field_lista'];
$field_listacantidades=$_POST['field_listacantidades'];

if(isset($_POST["field_lista"]) && !empty($_POST["field_lista"])){

$Cadena=explode(",", $field_lista);
//Split al Arreglo
$longitud = count($Cadena);
$min = $min=$longitud-1;

for($i=0; $i<$min; $i++)
		{

			$db=Db::getConnect();
	
	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$Cadena[$i]."'");
	$campo=$select->fetchAll();
	$x = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$x = $x+1;
		$valor_cot = $campos['valor_cot'];
		$sumasubtotalajax += $valor_cot;
	}

    $rowCount = $x;
    //Display states list
    if($rowCount > 0){
    }else{
        echo 'No llego nada';
    }

		}

	echo ("$".number_format($sumasubtotalajax,0));
	echo("<td><input disabled  class='input-sm' type='text' name='valor_subtotal' value='$".number_format($sumasubtotalajax,0)."'></td>");
	echo("<td><input id='camposubtotal' class='input-sm' type='hidden' name='valor_subtotal_txt' value='".$sumasubtotalajax."'></td>");
	
}


if(isset($_POST["field_listacantidades"]) && !empty($_POST["field_listacantidades"])){

$Cadena=explode(",", $field_listacantidades);
//Split al Arreglo
$longitud = count($Cadena);
$min = $min=$longitud-1;

for($i=0; $i<$min; $i++)
		{

			$db=Db::getConnect();
	
	$select=$db->query("SELECT * FROM cotizaciones_item WHERE id = '".$Cadena[$i]."'");
	$campo=$select->fetchAll();
	$x = 0;
	//echo("<option value'0'>Seleccionar Subrubro</option>");
	foreach($campo as $campos){
		$x = $x+1;
		$valor_cot = $campos['valor_cot'];
		$sumasubtotalajax += $valor_cot;
	}

    $rowCount = $x;
    //Display states list
    if($rowCount > 0){
    }else{
        echo 'No llego nada';
    }

		}

	echo ("$".number_format($sumasubtotalajax,0));
	echo("<td><input disabled  class='input-sm' type='text' name='valor_subtotal' value='$".number_format($sumasubtotalajax,0)."'></td>");
	echo("<td><input id='camposubtotal' class='input-sm' type='hidden' name='valor_subtotal_txt' value='".$sumasubtotalajax."'></td>");
	
}



?>
