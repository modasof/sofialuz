<?php 

function VentasFleteporMes($mes,$ano){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function VentasFleteporAnual($ano){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function VentasLineanegocioAnual($ano,$lineanegocio){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_material*cantidad),0) as totales FROM reporte_despachosclientes as A, productos AS B WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and A.producto_id_producto=B.id_producto and B.linea_id='".$lineanegocio."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function VentasLineanegocioMes($ano,$mes,$lineanegocio){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_material*cantidad),0) as totales FROM reporte_despachosclientes as A, productos AS B WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and A.producto_id_producto=B.id_producto and B.linea_id='".$lineanegocio."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }


  function VentasConcretoAnual($ano,$lineanegocio){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_material*cantidad),0) as totales FROM reporte_despachosconcreto as A, productos AS B WHERE YEAR(fecha_reporte)='".$ano."' and reporte_publicado='1' and A.producto_id_producto=B.id_producto and B.linea_id='".$lineanegocio."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function VentasConcretoMes($ano,$mes,$lineanegocio){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_material*cantidad),0) as totales FROM reporte_despachosconcreto as A, productos AS B WHERE YEAR(fecha_reporte)='".$ano."' and MONTH(fecha_reporte)='".$mes."' and reporte_publicado='1' and A.producto_id_producto=B.id_producto and B.linea_id='".$lineanegocio."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }
  
  function Despachosrangofechaproducto($FechaStart,$FechaEnd,$producto){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosclientes WHERE  fecha_reporte >='".$FechaStart."' and fecha_reporte<='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto='".$producto."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function Despachosrangofechaproductocrto($FechaStart,$FechaEnd,$producto){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(cantidad),0) as totales FROM reporte_despachosconcreto WHERE  fecha_reporte >='".$FechaStart."' and fecha_reporte<='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto='".$producto."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function Pvprangofechaproducto($FechaStart,$FechaEnd,$producto){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(AVG(valor_material),0) as totales FROM reporte_despachosclientes WHERE  fecha_reporte >='".$FechaStart."' and fecha_reporte<='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto='".$producto."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function Pvprangofechaproductocrto($FechaStart,$FechaEnd,$producto){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(AVG(valor_material),0) as totales FROM reporte_despachosconcreto WHERE  fecha_reporte >='".$FechaStart."' and fecha_reporte<='".$FechaEnd."' and reporte_publicado='1' and producto_id_producto='".$producto."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }


  function Costoproducto($producto){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(SUM(costo_insumo),0) as totales FROM productosinsumos WHERE  estado='1' and producto_id_producto='".$producto."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }


  function VentasFleteCliente($cliente){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_m3),0) as totales FROM reporte_despachosclientes WHERE cliente_id_cliente='".$cliente."' and reporte_publicado='1'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function VentasMaterialCliente($cliente){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_material*cantidad),0) as totales FROM reporte_despachosclientes WHERE reporte_publicado='1' and  cliente_id_cliente='".$cliente."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function VentasConcretoCliente($cliente){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_material*cantidad),0) as totales FROM reporte_despachosconcreto WHERE reporte_publicado='1' and cliente_id_cliente='".$cliente."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }

  function AbonosCliente($cliente){
  $db = Db::getConnect();
  //$mesactual = date("n");
  $sql="SELECT IFNULL(sum(valor_ingreso),0) as totales FROM ingresos_cuenta WHERE ingreso_publicado='1' and  cliente_id_cliente='".$cliente."'";
  //echo $sql;
  $select = $db->prepare($sql);
  $select->execute();
  $valor = $select->fetchAll(); 
  foreach($valor as $campo){
    $total = $campo['totales'];
    }
  return $total;
  }


  

 ?>

