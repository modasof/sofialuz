<?php
include_once '../../controladores/usuariosController.php';
include_once '../../modelos/usuarios.php';
include '../../include/class.conexion.php';

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
  
header("Content-type: text/xml");


echo "<?xml version='1.0' ?>";
echo '<markers>';

  $db=Db::getConnect();
  $select=$db->query("SELECT DISTINCT(usuario_id) FROM estado_conductores WHERE estado_usuario='1' GROUP BY usuario_id DESC");
  $campo=$select->fetchAll();
  $i = 0;
  foreach($campo as $campos){
    $i = $i+1;
    $id = $campos['id'];
    $usuario_id = $campos['usuario_id'];


    $latitud = Usuarios::obtenerultimalat($usuario_id);
    $longitud = Usuarios::obtenerultimalong($usuario_id);
    $marca_temporal = Usuarios::horaultimoreporte($usuario_id);
    $estado_usuario = Usuarios::obtenerultimoestado($usuario_id);

    if ($estado_usuario==1) {
      $labelestado = "Disponible";
    }elseif ($estado_usuario==2) {
      $labelestado = "No Disponible";
    }else{
      $labelestado = "Ausente";
    }

    $nomusuario= Usuarios::obtenerNombreUsuario($usuario_id);

  echo '<marker ';
  echo 'id="' . $id . '" ';
  echo 'usuario_id="' . $nomusuario . '" ';
  echo 'marca_temporal="' . $marca_temporal . '" ';
  echo 'estado_usuario="' . $labelestado . '" ';
  echo 'latitud="' . $latitud . '" ';
  echo 'longitud="' . $longitud. '" ';
  echo '/>';

  }

     $rowCount = $i;
    //Display states list
    if($rowCount > 0){
    }else{
        echo '<label>Valor m3<span>*</span></label><input type="text" name="valor_m3" id="valor_m3" placeholder="Valor M3" class="form-control" value="25">';
    }


echo '</markers>';


?>
