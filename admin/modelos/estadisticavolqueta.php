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


/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS CONSULTA	  **
********************************************************/
public static function obtenerPagina(){
	try {
		$db=Db::getConnect();
		$strHtmlAnio='';
		$select=$db->query("SELECT DISTINCT(YEAR(fecha_reporte)) as anio FROM `reporte_combustibles` WHERE reporte_publicado='1' ORDER BY fecha_reporte");
    	$camposs=$select->fetchAll();
		$campos2 = new EstadisticaVolqueta('',$camposs);
		$reportes_combustibles = $campos2->getCampos();
		foreach ($reportes_combustibles as $reporte_combustible){
			$strHtmlAnio .= '<option value="'.$reporte_combustible['anio'].'">'.$reporte_combustible['anio'].'</option>';
		}
		$_SESSION['htmlAnio']='';
		$_SESSION['htmlMes']='';
		$strHtml='';
		return $strHtmlAnio;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}




/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerReporteVolquetas($anio,$mes){
	try {
		$db=Db::getConnect();
		
		$strHtml='';
		$select=$db->query("SELECT DISTINCT(YEAR(fecha_reporte)) as anio FROM `reporte_combustibles` WHERE reporte_publicado='1' ORDER BY fecha_reporte");
    	$camposs=$select->fetchAll();
		$campos2 = new EstadisticaVolqueta('',$camposs);
		$reportes_combustibles = $campos2->getCampos();
		foreach ($reportes_combustibles as $reporte_combustible){
			if ($reporte_combustible['anio']==$anio){
				$strHtml .= '<option value="'.$reporte_combustible['anio'].'" selected>'.$reporte_combustible['anio'].'</option>';
			}else{
				$strHtml .= '<option value="'.$reporte_combustible['anio'].'">'.$reporte_combustible['anio'].'</option>';
			}
			
		}

		$_SESSION['htmlAnio']=$strHtml;

		$strHtml='';

		$arrayBase=array('Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		$num='';
		for ($i=1;$i<=12;$i++){
			if ($i>=10){
				$num=$i;
			}else{
				$num='0'.$i;
			}
			
			if($num==$mes){
				$strHtml .='<option value="'.$num.'" selected>'.$arrayBase[$i-1].'</option>';
			}else{
				$strHtml .='<option value="'.$num.'" >'.$arrayBase[$i-1].'</option>';
			}	


		}

		$_SESSION['htmlMes']=$strHtml;
		$strHtml='';

		$strHtml='<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>';
		$id_equipo='';

		$contador = 4;
		/*Se crea array de equipos*/





		$fechainicial= $anio.'-'.$mes.'-01';
		$fechafinal= $anio.'-'.$mes.'-31';

		if ($_SESSION['id_equipo']!=''){
			$select=$db->query("SELECT DISTINCT(rc.equipo_id_equipo) as id_equipo,eq.nombre_equipo, eq.rend_interno, eq.rend_externo FROM reporte_combustibles rc
				inner join equipos eq ON eq.id_equipo = rc.equipo_id_equipo WHERE fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1' and eq.sn_ver_estadistica = 1 AND eq.id_equipo = ".$_SESSION['id_equipo']);
		}else{
			$select=$db->query("SELECT DISTINCT(rc.equipo_id_equipo) as id_equipo,eq.nombre_equipo, eq.rend_interno, eq.rend_externo FROM reporte_combustibles rc
				inner join equipos eq ON eq.id_equipo = rc.equipo_id_equipo WHERE fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1' and eq.sn_ver_estadistica = 1 ORDER BY rc.equipo_id_equipo");			
		}

	
		$camposs=$select->fetchAll();
		$campos = new EstadisticaVolqueta('',$camposs);

		$equipos = $campos->getCampos();
 	 		foreach ($equipos as $equipo){
					if ($id_equipo!=$equipo['id_equipo']){
						$id_equipo = $equipo['id_equipo'];
						$nombre_equipo = $equipo['nombre_equipo'];
						$consumo_interno = $equipo['rend_interno'];
						$consumo_externo = $equipo['rend_externo'];
					}

	                  if ($contador==4){
	                      $strHtml .= '<div class="row" style="overflow-y: hidden;">';
	                      $contador=1;
	                  }


			                $strHtml .=  '  <div class="col-sm-4">';
			                /********************************************/
			                if ($_SESSION['id_equipo']==''){
				                $strHtml .=  '    <div class="row">';
				                $strHtml .=  '        <div class="col-sm-12">';			                	
			                }
			                /**********************************************/
			                

			                /*reporte_combustibles*/
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as Galones FROM reporte_combustibles WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_combustibles = $campos2->getCampos();
							foreach ($reportes_combustibles as $reporte_combustible){
								$reporte_tanqueo_acpm = $reporte_combustible['Galones'];
							}

			                /*reporte_horas*/
							$select=$db->query("SELECT ROUND(IFNULL(sum(indicador),0),2) as Horas, ROUND(IFNULL(sum(cantidad),0),2) as Km, ROUND(IFNULL(sum(hora_inactiva),0),2) as HrInactiva FROM reporte_horas WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_horas = $campos2->getCampos();
							foreach ($reportes_horas as $reporte_hora){
								$reporte_horas_interno = $reporte_hora['Horas'];
								$reporte_km_externo = $reporte_hora['Km'];
								$reporte_horas_inactiva = $reporte_hora['HrInactiva'];
							}



							/*Extraer cantidad de horas para calcular con el combustible*/
							$select=$db->query("SELECT indicador as Horas, cantidad as Km FROM reporte_horas WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_horas = $campos2->getCampos();

							$arreglo_horas = [];
							$arreglo_km = [];
							foreach ($reportes_horas as $reporte_hora){
								array_push($arreglo_horas , $reporte_hora['Horas']);
								array_push($arreglo_km , $reporte_hora['Km']);
							}

							
							
							
							/*Varianza Consumo Interno*/
							/*$consumo_reportado_interno=0;
							if ($reporte_horas_interno!=0){
								$combustible_c_interno = round(($reporte_tanqueo_acpm/$reporte_horas_interno),2);

								$sum=0;
								for($i=0;$i<count($arreglo_horas);$i++){
									$sum+=$arreglo_horas[$i];
								}
								$media2 = count($arreglo_horas);
								$media = $sum/count($arreglo_horas);
								$sum2=0;
								for($i=0;$i<count($arreglo_horas);$i++){
									$sum2+=($arreglo_horas[$i]-$media)*($arreglo_horas[$i]-$media);
								}
								$vari = $sum2/count($arreglo_horas);							
								$sq = sqrt($vari);
								$consumo_reportado_interno = round(($sq*$combustible_c_interno),1);
							}*/
							if ($reporte_tanqueo_acpm==0 || $reporte_horas_interno==0){
								$consumo_reportado_interno=0;
							}else{
								$consumo_reportado_interno = round(($reporte_tanqueo_acpm/$reporte_horas_interno),2);
							}

							

							/*Varianza Consumo Externo*/
							/*$consumo_reportado_externo=0;
							if ($reporte_km_externo!=0){
								$combustible_c_externo = round(($reporte_tanqueo_acpm/$reporte_km_externo),1);
								$sum=0;
								for($i=0;$i<count($arreglo_km);$i++){
									$sum+=$arreglo_km[$i];
								}
								$media = $sum/count($arreglo_km);
								$sum2=0;
								for($i=0;$i<count($arreglo_km);$i++){
									$sum2+=($arreglo_km[$i]-$media)*($arreglo_km[$i]-$media);
								}
								$vari = $sum2/count($arreglo_km);							
								$sq = sqrt($vari);
								$consumo_reportado_externo = round(($sq*$combustible_c_externo),1);
							}*/
							if ($reporte_tanqueo_acpm==0 || $reporte_km_externo==0){
								$consumo_reportado_externo=0;
							}else{
								$consumo_reportado_externo = round(($reporte_tanqueo_acpm/$reporte_km_externo),1);
							}

							



			                /*reporte_despachosclientes*/
							$select=$db->query("SELECT ROUND(IFNULL(AVG(cantidad),0),2) as totales, ROUND(IFNULL(MAX(cantidad),0),2) as Maxtotales, ROUND(IFNULL(MIN(cantidad),0),2) as Mintotales FROM reporte_despachosclientes WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_despachosclientes = $campos2->getCampos();
							foreach ($reportes_despachosclientes as $reporte_despachocliente){
								$cargue_promediom3 = $reporte_despachocliente['totales'];
								$cargue_max_m3 = $reporte_despachocliente['Maxtotales'];
								$cargue_min_m3 = $reporte_despachocliente['Mintotales'];
							}



			                /*reporte_despachos_trituradora*/
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as ViajesTrituradora FROM reporte_despachos WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1' and tipo_despacho='Trituradora'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_despachos = $campos2->getCampos();
							foreach ($reportes_despachos as $reporte_despacho){
								$viajes_trituradora = $reporte_despacho['ViajesTrituradora'];
							}


			                /*reporte_despachos_Terraje*/
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as ViajesTerraje FROM reporte_despachos WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1' and tipo_despacho='A patio'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_despachos = $campos2->getCampos();
							foreach ($reportes_despachos as $reporte_despacho){
								$viajes_terraje = $reporte_despacho['ViajesTerraje'];
							}


			                /*reporte_despachos_Terraje*/
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as ViajesCliente FROM reporte_despachosclientes WHERE equipo_id_equipo =".$id_equipo." AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' and reporte_publicado='1'");
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_despachos = $campos2->getCampos();
							foreach ($reportes_despachos as $reporte_despacho){
								$viajes_cliente = $reporte_despacho['ViajesCliente'];
							}



			                /*Grafico 1*/

			                $semana_inicial = $anio.'-'.$mes.'-1';
			                $semana_fina = $anio.'-'.$mes.'-7'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as KilometroSemana FROM reporte_horas WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_horas = $campos2->getCampos();
							foreach ($reportes_horas as $reporte_hora){
								$semana1_rend = $reporte_hora['KilometroSemana'];
							}


			                $semana_inicial = $anio.'-'.$mes.'-8';
			                $semana_fina = $anio.'-'.$mes.'-14'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as KilometroSemana FROM reporte_horas WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_horas = $campos2->getCampos();
							foreach ($reportes_horas as $reporte_hora){
								$semana2_rend = $reporte_hora['KilometroSemana'];
							}


			                $semana_inicial = $anio.'-'.$mes.'-15';
			                $semana_fina = $anio.'-'.$mes.'-21'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as KilometroSemana FROM reporte_horas WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_horas = $campos2->getCampos();
							foreach ($reportes_horas as $reporte_hora){
								$semana3_rend = $reporte_hora['KilometroSemana'];
							}							


			                $semana_inicial = $anio.'-'.$mes.'-16';
			                $semana_fina = $anio.'-'.$mes.'-31'; 
							$select=$db->query("SELECT ROUND(IFNULL(sum(cantidad),0),2) as KilometroSemana FROM reporte_horas WHERE fecha_reporte between '".$semana_inicial."' and '".$semana_fina."' and reporte_publicado='1' and equipo_id_equipo=".$id_equipo);
							$camposs=$select->fetchAll();
							$campos2 = new EstadisticaVolqueta('',$camposs);
							$reportes_horas = $campos2->getCampos();
							foreach ($reportes_horas as $reporte_hora){
								$semana4_rend = $reporte_hora['KilometroSemana'];
							}


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


						  $strHtml .= '<h4>'.$nombre_equipo.'</h4>';
   	              	      $strHtml .= ' <table class="table table-bordered" style="font-size:13px;">
                          <!-- Table body -->
                          <tbody>
                            <tr>
                              <td style="font-weight:bold;">Consumo Interno Estándar x hora</td>
                              <td style="font-weight:bold;">'.$consumo_interno.' gl.</td>
                            </tr>
                            <tr>
                              <td>Consumo Externo Estándar x hm esta ataddafd</td>
                              <td>'.$consumo_externo.' gl.</td>
                            </tr>
                            <tr>
                              <td>Reporte Tanqueo ACPM</td>
                              <td>'.$reporte_tanqueo_acpm.' gl</td>
                            </tr>
                            <tr>
                              <td>Reporte Horas (Interno)</td>
                              <td>'.$reporte_horas_interno.' hr.</td>
                            </tr>   
                            <tr>
                              <td>Reporte Km (Externo)</td>
                              <td>'.$reporte_km_externo.' km.</td>
                            </tr>  
                            <tr>
                              <td>Reporte horas Inactiva</td>
                              <td>'.$reporte_horas_inactiva.' </td>
                            </tr> 
                            <tr>
                              <td>Consumo Reportado Interno</td>
                              <td>'.$consumo_reportado_interno.' gl</td>
                            </tr>  
                            <tr>
                              <td>Consumo Reportado Externo</td>
                              <td>'.$consumo_reportado_externo.' gl</td>
                            </tr>
                            <tr>
                              <td>Cargue promedio m3</td>
                              <td>'.$cargue_promediom3.' m3</td>
                            </tr> 
                            <tr>
                              <td>Cargue Máximo m3</td>
                              <td>'.$cargue_max_m3.' m3</td>
                            </tr>
                            <tr>
                              <td>Cargue Mínimo en m3</td>
                              <td>'.$cargue_min_m3.' m3</td>
                            </tr>
                            <tr>
                              <td>Viajes a Trituradora</td>
                              <td>'.$viajes_trituradora.' m3</td>
                            </tr>                                                                                                      
                            <tr>
                              <td>Viajes Terraje</td>
                              <td>'.$viajes_terraje.' m3</td>
                            </tr> 
                            <tr>
                              <td>Viajes a Cliente</td>
                              <td>'.$viajes_cliente.' m3</td>
                            </tr> 
                            <tr>
                              <td>Viajes Insumos Cantera</td>
                              <td>360 gl</td>
                            </tr> 
                            <tr>
                              <td>Gastos Reparaciones</td>
                              <td>360 gl</td>
                            </tr>                                                
                          </tbody>
                          <!-- Table body -->
                        </table>';			                	

			                if ($_SESSION['id_equipo']==''){
				                $strHtml .=   '        </div>';
				               
			                }
			                 $strHtml .=   '    </div>';

							if ($_SESSION['id_equipo']==''){
								$strHtml .=    '<div class="row">';
								$strHtml .=    '<div class="col-sm-12">';
							}else{
								$strHtml .=    '<div class="col-sm-4">';
							}
							$strHtml .=    '<canvas id="REN'.$id_equipo.'" width="400" height="400"></canvas>';
							if ($_SESSION['id_equipo']==''){
								$strHtml .=    '</div>';
							}
							$strHtml .=    '</div>';


							$strHtml .="<script>
							var ctx = document.getElementById('REN".$id_equipo."');
							var myChart = new Chart(ctx, {
							    type: 'line',
							    data: {
							        labels: ['','Semana1', 'Semana2', 'Semana3', 'Semana4'],
							        datasets: [{
							            label: 'Rendimiento Semanal',
							            data: [,".$semana1_rend.", ".$semana2_rend.", ".$semana3_rend.", ".$semana4_rend."],
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


							if ($_SESSION['id_equipo']==''){
								$strHtml .=    '<div class="row">';
								$strHtml .=    '<div class="col-sm-12">';
							}else{
								$strHtml .=    '<div class="col-sm-4">';
							}								
							$strHtml .=    '<canvas id="ACPM'.$id_equipo.'" width="400" height="400"></canvas>';
							if ($_SESSION['id_equipo']==''){
								$strHtml .=    '</div>';
							}
							$strHtml .=    '</div>';


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

                      if ($contador==3){
                          $strHtml .= '</div>';
                      }



	                    $contador=$contador+1;
	                  







	 		}

		return $strHtml;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}



/*Función para crear tabla con los datos*/
function CrearTabla(){





}


/*public static function obtenerPaginaPor($fechainicial,$fechafinal){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM reporte_combustibles WHERE  reporte_publicado='1'  AND fecha_reporte between '".$fechainicial."' and '".$fechafinal."' order by equipo_id_equipo");
		$camposs=$select->fetchAll();
		$reporte_combustibles = new EstadisticaVolqueta('',$camposs);
		
		$select=$db->query("SELECT * FROM reporte_horas WHERE  reporte_publicado='1'  AND fecha_reporte between '".$fechainicial."' AND '".$fechafinal."' order by equipo_id_equipo");
		$camposs=$select->fetchAll();
		$reporte_horas = new EstadisticaVolqueta('',$camposs);

		$campos =$reporte_horas.'|'.$reporte_combustibles;

		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}*/





























/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function ListaEquipos(){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM equipos WHERE equipo_publicado='1' order by nombre_equipo");
		$camposs=$select->fetchAll();
		$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE FILTRADOS POR ID  **
***************************************************************/
public static function obtenerMenupor($id,$rol){
	try {
		$db=Db::getConnect();
		$select=$db->query("SELECT * FROM menu WHERE id_usuario='".$id."' and id_rol='".$rol."'");
		$camposs=$select->fetchAll();
		$campos = new Usuarios('',$camposs);
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/***************************************************************
** FUNCION PARA ELIINAR POR ID  **
***************************************************************/
public static function eliminarPor($id){
	try {
		$db=Db::getConnect();
		$select=$db->query("UPDATE usuarios SET estado_usuario='0' WHERE id_usuario='".$id."'");
		if ($select){
			return true;
			}else{return false;}
	}
	catch(PDOException $e) {
		echo '{"error en obtener la pagina":{"text":'. $e->getMessage() .'}}';
	}
}


/********************************************************************
*** FUNCION PARA MODIFICAR ****
********************************************************************/
public static function actualizar($id,$campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$update=$db->prepare('UPDATE usuarios SET
								imagen=:imagen,
								nombre_usuario=:nombre_usuario,
								telefono=:telefono,
								documento=:documento
								WHERE id_usuario=:id_usuario');

		$update->bindValue('imagen',$imagen);
		$update->bindValue('nombre_usuario',$nombre_usuario);
		$update->bindValue('telefono',$telefono);
		$update->bindValue('documento',$documento);
		$update->bindValue('id_usuario',$id);
		$update->execute();
		return true;
	}
	catch(PDOException $e) {
		echo '{"error al guardar la configuración ":{"text":'. $e->getMessage() .'}}';
	}
}

/***************************************************************
*** FUNCION PARA GUARDAR **
id_usuario, imagen, nombre_usuario, telefono, email, celular, documento, rol_id_rol, username, pass, estado_usuario
***************************************************************/
public static function guardar($campos,$imagen){
	try {
		$db=Db::getConnect();
		$campostraidos = $campos->getCampos();
		extract($campostraidos);

		$insert=$db->prepare('INSERT INTO marcasu VALUES (NULL,:imagen, :nombre_usuario, :telefono, :email, :documento, :rol_id_rol,:estado_usuario)');

		$insert->bindValue('imagen',$imagen);
		$insert->bindValue('nombre_usuario',$nombre_usuario);
		$insert->bindValue('telefono',$telefono);
		$insert->bindValue('email',$email);
		$insert->bindValue('documento',$documento);
		$insert->bindValue('rol_id_rol',$rol_id_rol);
		$insert->bindValue('estado_usuario',$estado_usuario);
		$insert->execute();

		return true;
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

}

?>
