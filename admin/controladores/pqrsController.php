<?php
class PqrsController {
	function __construct() {
		}

	function index() {
		//$id='MARITIMO'; //SERVICIO MARITIMO
		//$servicioIndex = 'MARITIMO';
		
		$campos=Pqrs::obtenerPagina('','');
		
		$exportancionmaritima = Pqrs::obtenerSinleer('Publica tu usado','');
		$importancionmaritima = Pqrs::obtenerSinleer('Viabiliza tu credito','');
		$exportancionaerea = Pqrs::obtenerSinleer('Exportacion Aerea','');
		$importancionaerea = Pqrs::obtenerSinleer('Importacion Aerea','');
		$transporteterrestre = Pqrs::obtenerSinleer('Transporte Terrestre','');
		$aduana = Pqrs::obtenerSinleer('Aduana','');
		$administrativocomercial = Pqrs::obtenerSinleer('Administrativo Comercial','');
		
		$sinleer = Pqrs::obtenerSinleerTodos();
		$leidos = Pqrs::obtenerLeidos();
		$procesados = Pqrs::obtenerProcesando();
		$solucionado = Pqrs::obtenerSolucionado();

		require_once 'vistas/verpqrs/solicitudes.php';
	}

	function indexexport() {
		//$id='MARITIMO'; //SERVICIO MARITIMO
		//$servicioIndex = 'MARITIMO';
	
		$campos=Pqrs::obtenerPagina('','');
		
		$exportancionmaritima = Pqrs::obtenerSinleer('Publica tu usado','');
		$importancionmaritima = Pqrs::obtenerSinleer('Viabiliza tu credito','');
		$exportancionaerea = Pqrs::obtenerSinleer('Exportacion Aerea','');
		$importancionaerea = Pqrs::obtenerSinleer('Importacion Aerea','');
		$transporteterrestre = Pqrs::obtenerSinleer('Transporte Terrestre','');
		$aduana = Pqrs::obtenerSinleer('Aduana','');
		$administrativocomercial = Pqrs::obtenerSinleer('Administrativo Comercial','');
		
		$sinleer = Pqrs::obtenerSinleerTodos();
		$leidos = Pqrs::obtenerLeidos();
		$procesados = Pqrs::obtenerProcesando();
		$solucionado = Pqrs::obtenerSolucionado();

		require_once 'vistas/exportpqrs/solicitudes.php';
	}

	function exportrabaja() {
		//$id='MARITIMO'; //SERVICIO MARITIMO
		//$servicioIndex = 'MARITIMO';
	
		$campos=Pqrs::obtenerPaginatrabaja('','');
		
		$exportancionmaritima = Pqrs::obtenerSinleer('Publica tu usado','');
		$importancionmaritima = Pqrs::obtenerSinleer('Viabiliza tu credito','');
		$exportancionaerea = Pqrs::obtenerSinleer('Exportacion Aerea','');
		$importancionaerea = Pqrs::obtenerSinleer('Importacion Aerea','');
		$transporteterrestre = Pqrs::obtenerSinleer('Transporte Terrestre','');
		$aduana = Pqrs::obtenerSinleer('Aduana','');
		$administrativocomercial = Pqrs::obtenerSinleer('Administrativo Comercial','');
		
		$sinleer = Pqrs::obtenerSinleerTodos();
		$leidos = Pqrs::obtenerLeidos();
		$procesados = Pqrs::obtenerProcesando();
		$solucionado = Pqrs::obtenerSolucionado();

		require_once 'vistas/exportrabaja/solicitudes.php';
	}


	function indexstatus() {
		if (!empty($_GET['status'])){
				
				$status=strtoupper($_GET['status']);
				if($status == 'PROCESANDO'){
					$status = 'GESTIONANDO';
					}
				if($status == 'SINLEER'){
					$status = 'SIN LEER';
					}					
				$servicioIndex = $status;
				$campos=Pqrs::obtenerPaginaStatus($status);
				$exportancionmaritima = Pqrs::obtenerSinleer('Publica tu usado','');
				$importancionmaritima = Pqrs::obtenerSinleer('Viabiliza tu credito','');
				$exportancionaerea = Pqrs::obtenerSinleer('Exportacion Aerea','');
				$importancionaerea = Pqrs::obtenerSinleer('Importacion Aerea','');
				$transporteterrestre = Pqrs::obtenerSinleer('Transporte Terrestre','');
				$aduana = Pqrs::obtenerSinleer('Aduana','');
				$administrativocomercial = Pqrs::obtenerSinleer('Administrativo Comercial','');
				
				$sinleer = Pqrs::obtenerSinleerTodos();
				$leidos = Pqrs::obtenerLeidos();
				$procesados = Pqrs::obtenerProcesando();
				$solucionado = Pqrs::obtenerSolucionado();


				require_once 'vistas/verpqrs/solicitudes2.php';
			}

	}

	function indexarea() {
		if (!empty($_GET['area'])){
			
				$status=strtoupper($_GET['area']);
				$servicioIndex = $status;
				$campos=Pqrs::obtenerPaginaFiltrada($status);
				$exportancionmaritima = Pqrs::obtenerSinleer('Publica tu usado','');
				$importancionmaritima = Pqrs::obtenerSinleer('Viabiliza tu credito','');
				$exportancionaerea = Pqrs::obtenerSinleer('Exportacion Aerea','');
				$importancionaerea = Pqrs::obtenerSinleer('Importacion Aerea','');
				$transporteterrestre = Pqrs::obtenerSinleer('Transporte Terrestre','');
				$aduana = Pqrs::obtenerSinleer('Aduana','');
				$administrativocomercial = Pqrs::obtenerSinleer('Administrativo Comercial','');
				
				$sinleer = Pqrs::obtenerSinleerTodos();
				$leidos = Pqrs::obtenerLeidos();
				$procesados = Pqrs::obtenerProcesando();
				$solucionado = Pqrs::obtenerSolucionado();


				require_once 'vistas/verpqrs/solicitudes2.php';
			}

	}	

	//FUNCION PARA CAMBIAR EL STATUS  
	function cambiarstatus($id,$status){
		//$id = $_POST['id'];
		//$status = $_POST['status'];
		if (!empty($id)){
				//TRAIGO LA INFORMACIÓN REQUERIDA
				$valor = Pqrs::cambiarstatus($id,$status);
				$devolver="<script>jQuery(function(){Swal.fire(\"¡Excelente!\", \"Se ha cambiado correctamente el status\", \"success\");});</script>";
				echo $devolver;
		}
	}	 

	//FUNCION PARA VER LA SOLICITUD  
	function versolicitud(){
		$id = $_GET['id'];
		if (!empty($id)){
				//TRAIGO LA INFORMACIÓN REQUERIDA
				$campos = Pqrs::versolicitud($id);

				$exportancionmaritima = Pqrs::obtenerSinleer('Publica tu usado','');
				$importancionmaritima = Pqrs::obtenerSinleer('Viabiliza tu credito','');
				$exportancionaerea = Pqrs::obtenerSinleer('Exportacion Aerea','');
				$importancionaerea = Pqrs::obtenerSinleer('Importacion Aerea','');
				$transporteterrestre = Pqrs::obtenerSinleer('Transporte Terrestre','');
				$aduana = Pqrs::obtenerSinleer('Aduana','');
				$administrativocomercial = Pqrs::obtenerSinleer('Administrativo Comercial','');
				
				$sinleer = Pqrs::obtenerSinleerTodos();
				$leidos = Pqrs::obtenerLeidos();
				$procesados = Pqrs::obtenerProcesando();
				$solucionado = Pqrs::obtenerSolucionado();


				require_once 'vistas/verpqrs/leer.php';
			}else{
				echo "<script>jQuery(function(){Swal.fire(\"¡Error!\", \"Se ha encontrado un error al solicitar los datos\", \"error\");});</script>";
				}
		}	 
 


	function subir_fichero($directorio_destino, $nombre_fichero)
	{
		$tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
		//si hemos enviado un directorio que existe realmente y hemos subido el archivo    
		if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
		{
			$img_file = $_FILES[$nombre_fichero]['name'];
			$Aleaotorio=rand(0,99999);
			$img_file=$Aleaotorio.$img_file;
			$img_type = $_FILES[$nombre_fichero]['type'];
			// Si se trata de una imagen   
			if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||strpos($img_type, "jpg")) || strpos($img_type, "png")))
			{
				//¿Tenemos permisos para subir la imágen?
				if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
				{
					$retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
					return $retornar;
				}
			} else {
				if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
				{
					$retornar = $directorio_destino . '/' . $img_file; //RETORNAMOS EL NOMBRE Y RUTA DEL FICHERO
					return $retornar;
				}			
			}
		}
		//Si llegamos hasta aquí es que algo ha fallado
		$vacio ='';
		return $vacio;
	}    
 
 }
