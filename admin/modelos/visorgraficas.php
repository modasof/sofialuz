/**/

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/**
* CLASE PARA TRABAJAR CON LAS MARCAS
*/
class EstadisticaVolqueta
{
    private $id;
    private $campos; //devuelve todos los campos de la tabla


	function __construct($id,$campos)
	{
        $this->setId($id);
        $this->setCampos($campos);
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA       ***
	/***********************************************************************************/
	//ESTABLECER Y OBTENER ID
	public function getId(){
		return $this->id;
	}
	public function setId($id){ //Establece el nuevo valor del campo
		$this->id = $id;
	}

	//ESTABLECER Y OBTENER LOS CAMPOS
	public function getCampos(){
		return $this->campos;
	}
	public function setCampos($campos){ //Establece el nuevo valor del campo
		$this->campos = $campos;
	}



/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();
		
		setlocale(LC_ALL, 'spanish');
		//$fechaActual =  strftime('%d de %B del %Y');
		$fechaActual =  strftime('%d de %B del %Y')."&nbsp&nbsp&nbsp&nbsp&nbsp".date("h").":".date("i")." ".date("A");
		$strHtml='';

		$strHtml='<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>';
		$id_equipo='';

		$contadorx =5;
		$contadory = 0;

		$anio = date("Y");
		$mes=date("m");

		$fechainicial= $anio.'-'.$mes.'-01';
		$fechafinal= $anio.'-'.$mes.'-31';

			$select=$db->query("SELECT DISTINCT(rc.equipo_id_equipo) as id_equipo,eq.nombre_equipo, eq.rend_interno, eq.rend_externo FROM reporte_combustibles rc
				inner join equipos eq ON eq.id_equipo = rc.equipo_id_equipo WHERE fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1' ORDER BY rc.equipo_id_equipo");			
	
		$camposs=$select->fetchAll();
		$campos = new EstadisticaVolqueta('',$camposs);
		$strHtml .= '<h1>'.$fechaActual.'</h1>';
 		$strHtml .= '<div style="width:100%;height:20px;"></div>';
		
		$equipos = $campos->getCampos();
 	 		foreach ($equipos as $equipo){

					if ($id_equipo!=$equipo['id_equipo']){
						$id_equipo = $equipo['id_equipo'];
						$nombre_equipo = $equipo['nombre_equipo'];
						$consumo_interno = $equipo['rend_interno'];
						$consumo_externo = $equipo['rend_externo'];
					}

	                  if ($contadorx==5){
	                      $strHtml .= '<div class="row" style="overflow-y: hidden;">';
	                      $contadorx=1;
	                      
	                  }


			                $strHtml .=  '  <div class="col-md-3">';
			                /********************************************/


			                /*Grafico 2*/

			                $semana_inicial = $anio.'-'.$mes.'-1';
			                $semana_fina = $anio.'-'.$mes.'-7'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as GalonesSemana FROM reporte_combustibles WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_combustibles = $campos2->getCampos();
							foreach ($reportes_combustibles as $reporte_combustible){
								$semana1 = $reporte_combustible['GalonesSemana'];
							}

			                $semana_inicial = $anio.'-'.$mes.'-8';
			                $semana_fina = $anio.'-'.$mes.'-14'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as GalonesSemana FROM reporte_combustibles WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_combustibles = $campos2->getCampos();
							foreach ($reportes_combustibles as $reporte_combustible){
								$semana2 = $reporte_combustible['GalonesSemana'];
							}


			                $semana_inicial = $anio.'-'.$mes.'-15';
			                $semana_fina = $anio.'-'.$mes.'-21'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as GalonesSemana FROM reporte_combustibles WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_combustibles = $campos2->getCampos();
							foreach ($reportes_combustibles as $reporte_combustible){
								$semana3 = $reporte_combustible['GalonesSemana'];
							}


			                $semana_inicial = $anio.'-'.$mes.'-16';
			                $semana_fina = $anio.'-'.$mes.'-31'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as GalonesSemana FROM reporte_combustibles WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_combustibles = $campos2->getCampos();
							foreach ($reportes_combustibles as $reporte_combustible){
								$semana4 = $reporte_combustible['GalonesSemana'];
							}


						  $strHtml .= '<h5>'.$nombre_equipo.'</h5>';
	                	
  						  $strHtml .=    '<canvas id="ACPM'.$id_equipo.'" width="400" height="400"></canvas>';

						  $strHtml .="<script>
							var ctx = document.getElementById('ACPM".$id_equipo."');
							var myChart = new Chart(ctx, {
							    type: 'line',
							    data: {
							        labels: ['','Semana1', 'Semana2', 'Semana3', 'Semana4'],
							        datasets: [{
							            label: 'Consumo ACPM',
							            data: [,".$semana1.", ".$semana2.", ".$semana3.", ".$semana4."],
							           backgroundColor: [
							                'rgba(0, 0, 0, 0)',
							                'rgba(54, 100, 235, 0.2)',
							                'rgba(0, 206, 86, 0.2)',
							                'rgba(75, 192, 192, 0.2)',
							                'rgba(153, 255, 255, 0.2)',
							                'rgba(255, 80, 64, 0.2)'
							            ],
							            borderColor: [
							                'rgba(255, 80, 10, 2)',
							                'rgba(54, 100, 235, 1)',
							                'rgba(10, 206, 86, 1)',
							                'rgba(75, 192, 192, 1)',
							                'rgba(153, 255, 255, 1)',
							                'rgba(255, 80, 64, 1)'
							            ],
							            borderWidth: 1
							        }]
							    },
							    options: {
							        scales: {
							            yAxes: [{
							                ticks: {
							                    beginAtZero: true
							                }
							            }]
							        }
							    }
							});
							</script>";




			                $strHtml .=   '  </div>';

                      if ($contadorx==4){
                          $strHtml .= '</div>';
                          $contadory=$contadory+1;
                          $strHtml .= '<div style="width:100%;height:50px;"></div>';
                      }


					 if ($contadory==2){
						break;
					  }
	                    
	                $contadorx=$contadorx+1;
	                  


	 		}
	
		return $strHtml;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




}

?>
