<?php

/**
 * @author Teksystem SAS
 * @copyright 2018
 */

/**
* CLASE PARA TRABAJAR CON LOS SLIDER
*/
class Principal
{
    private $id_principal;
    private $fila2_columna1;
    private $fila2_columna2;
    private $fila3;
    private $fila4_columna1;
    private $fila4_columna2;
    private $fila4_columna3;
    private $fila5_columna1;
    private $fila5_columna2;
    private $fila5_columna3;
    private $fila6_columna1;
    private $fila6_columna2;
    private $fila6_columna3;
//NOMBRE Y TEXTO DE LOS SERVICIOS    
    private $servicio1;
    private $tservicio1;
    private $servicio2;
    private $tservicio2;
    private $servicio3;
    private $tservicio3;
    private $servicio4;
    private $tservicio4;
    private $servicio5;
    private $tservicio5;
    private $servicio6;
    private $tservicio6;
    private $servicio7;
    private $tservicio7;
    private $servicio8;
    private $tservicio8;
    private $servicio9;
    private $tservicio9;

    


	function __construct($id_principal,$fila2_columna1,$fila2_columna2,$fila3,$fila4_columna1,$fila4_columna2,$fila4_columna3,$fila5_columna1,$fila5_columna2,$fila5_columna3,$fila6_columna1,$fila6_columna2,$fila6_columna3,$servicio1,$tservicio1,$servicio2,$tservicio2,$servicio3,$tservicio3,$servicio4,$tservicio4,$servicio5,$tservicio5,$servicio6,$tservicio6,$servicio7,$tservicio7,$servicio8,$tservicio8,$servicio9,$tservicio9)
	{
        $this->setIdPrincipal($id_principal);
        $this->setFila2Columna1($fila2_columna1);
        $this->setFila2Columna2($fila2_columna2);
        $this->setFila3($fila3);
        $this->setFila4Columna1($fila4_columna1);
        $this->setFila4Columna2($fila4_columna2);
        $this->setFila4Columna3($fila4_columna3);
        $this->setFila5Columna1($fila5_columna1);
        $this->setFila5Columna2($fila5_columna2);
        $this->setFila5Columna3($fila5_columna3);
        $this->setFila6Columna1($fila6_columna1);
        $this->setFila6Columna2($fila6_columna2);
        $this->setFila6Columna3($fila6_columna3);
        
        $this->setServicio1($servicio1);        
        $this->setTServicio1($tservicio1);
        $this->setServicio2($servicio2);
        $this->setTservicio2($tservicio2);        
        $this->setServicio3($servicio3);
        $this->setTservicio3($tservicio3);
        $this->setServicio4($servicio4);        
        $this->setTservicio4($tservicio4);
        $this->setServicio5($servicio5);
        $this->setTservicio5($tservicio5);        
        $this->setServicio6($servicio6);
        $this->setTservicio6($tservicio6);
        $this->setServicio7($servicio7);        
        $this->setTservicio7($tservicio7);
        $this->setServicio8($servicio8);
        $this->setTservicio8($tservicio8);        
        $this->setServicio9($servicio9);
        $this->setTservicio9($tservicio9);
                        
	}

	/************************************************************************************
	** FUNCIONES PARA ESTABLECER Y OBTENER LAS VARIABLES DE LA TABLA index_principal       ***
	/***********************************************************************************/

	//ESTABLECER Y OBTENER ID 
	public function getIdPrincipal(){
		return $this->id_principal;
	}
	public function setIdPrincipal($id_principal){ //Establece el nuevo valor del campo
		$this->id_principal = $id_principal; 
	}
	//ESTABLECER Y OBTENER IMAGEN COLUMNA1
	public function getFila2Columna1(){
		return $this->fila2_columna1;
	}
	public function setFila2Columna1($fila2_columna1){
		$this->fila2_columna1 = $fila2_columna1;
	}
	//ESTABLECER Y OBTENER 
	public function getFila2Columna2(){
		return $this->fila2_columna2;
	}
	public function setFila2Columna2($fila2_columna2){
		$this->fila2_columna2 = $fila2_columna2;
	}
	//ESTABLECER Y OBTENER 
	public function getFila2Columna3(){
		return $this->fila2_columna3;
	}
	public function setFila2Columna3($fila2_columna3){
		$this->fila2_columna3 = $fila2_columna3;
	}
	//ESTABLECER Y OBTENER
	public function getFila3(){
		return $this->fila3;
	}
	public function setFila3($fila3){
		$this->fila3 = $fila3;
	}
	//ESTABLECER Y OBTENER
	public function getFila4Columna1(){
		return $this->fila4_columna1;
	}
	public function setFila4Columna1($fila4_columna1){
		$this->fila4_columna1 = $fila4_columna1;
	}
	//ESTABLECER Y OBTENER 
	public function getFila4Columna2(){
		return $this->fila4_columna2;
	}
	public function setFila4Columna2($fila4_columna2){
		$this->fila4_columna2 = $fila4_columna2;
	}
	//ESTABLECER Y OBTENER LA POSICION DE LA IMAGEN
	public function getFila4Columna3(){
		return $this->fila4_columna3;
	}
	public function setFila4Columna3($fila4_columna3){
		$this->fila4_columna3 = $fila4_columna3;
	}

	public function getFila5Columna1(){
		return $this->fila5_columna1;
	}
	public function setFila5Columna1($fila5_columna1){
		$this->fila5_columna1 = $fila5_columna1;
	}
	//ESTABLECER Y OBTENER 
	public function getFila5Columna2(){
		return $this->fila5_columna2;
	}
	public function setFila5Columna2($fila5_columna2){
		$this->fila5_columna2 = $fila5_columna2;
	}
	//ESTABLECER Y OBTENER
	public function getFila5Columna3(){
		return $this->fila5_columna3;
	}
	public function setFila5Columna3($fila5_columna3){
		$this->fila5_columna3 = $fila5_columna3;
	}
	//ESTABLECER Y OBTENER 
	public function getFila6Columna1(){
		return $this->fila6_columna1;
	}
	public function setFila6Columna1($fila6_columna1){
		$this->fila6_columna1 = $fila6_columna1;
	}

	//ESTABLECER Y OBTENER 
	public function getFila6Columna2(){
		return $this->fila6_columna2;
	}
	public function setFila6Columna2($fila6_columna2){
		$this->fila6_columna2 = $fila6_columna2;
	}
	//ESTABLECER Y OBTENER 
	public function getFila6Columna3(){
		return $this->fila6_columna3;
	}
	public function setFila6Columna3($fila6_columna3){
		$this->fila6_columna3 = $fila6_columna3;
	}
    //////////////////////////////////////////////////////////
    ////////////////SERVICIOS **********************//////////
	//ESTABLECER Y OBTENER TITULO SERVICIOS 
     
	public function getServicio1(){
		return $this->servicio1;
	}
	public function setServicio1($servicio1){
		$this->servicio1 = $servicio1;
	}

	public function getServicio2(){
		return $this->servicio2;
	}
	public function setServicio2($servicio2){
		$this->servicio2 = $servicio2;
	}

	public function getServicio3(){
		return $this->servicio3;
	}
	public function setServicio3($servicio3){
		$this->servicio3 = $servicio3;
	}

	public function getServicio4(){
		return $this->servicio4;
	}
	public function setServicio4($servicio4){
		$this->servicio4 = $servicio4;
	}

	public function getServicio5(){
		return $this->servicio5;
	}
	public function setServicio5($servicio5){
		$this->servicio5 = $servicio5;
	}

	public function getServicio6(){
		return $this->servicio6;
	}
	public function setServicio6($servicio6){
		$this->servicio6 = $servicio6;
	}

	public function getServicio7(){
		return $this->servicio7;
	}
	public function setServicio7($servicio7){
		$this->servicio7 = $servicio7;
	}

	public function getServicio8(){
		return $this->servicio8;
	}
	public function setServicio8($servicio8){
		$this->servicio8 = $servicio8;
	}

	public function getServicio9(){
		return $this->servicio9;
	}
	public function setServicio9($servicio9){
		$this->servicio9 = $servicio9;
	}
    //////////////////////////////////////////////////////////
    ////////////////SERVICIOS **********************//////////
	//ESTABLECER Y OBTENER TEXTO DE SERVICIOS 
     
	public function getTservicio1(){
		return $this->tservicio1;
	}
	public function setTservicio1($tservicio1){
		$this->tservicio1 = $tservicio1;
	}

	public function getTservicio2(){
		return $this->tservicio2;
	}
	public function setTservicio2($tservicio2){
		$this->tservicio2 = $tservicio2;
	}
	public function getTservicio3(){
		return $this->tservicio3;
	}
	public function setTservicio3($tservicio3){
		$this->tservicio3 = $tservicio3;
	}
	public function getTservicio4(){
		return $this->tservicio4;
	}
	public function setTservicio4($tservicio4){
		$this->tservicio4 = $tservicio4;
	}

	public function getTservicio5(){
		return $this->tservicio5;
	}
	public function setTservicio5($tservicio5){
		$this->tservicio5 = $tservicio5;
	}
	public function getTservicio6(){
		return $this->tservicio6;
	}
	public function setTservicio6($tservicio6){
		$this->tservicio6 = $tservicio6;
	}
	public function getTservicio7(){
		return $this->tservicio7;
	}
	public function setTservicio7($tservicio7){
		$this->tservicio7 = $tservicio7;
	}

	public function getTservicio8(){
		return $this->tservicio8;
	}
	public function setTservicio8($tservicio8){
		$this->tservicio8 = $tservicio8;
	}

	public function getTservicio9(){
		return $this->tservicio9;
	}
	public function setTservicio9($tservicio9){
		$this->tservicio9 = $tservicio9;
	}

/********************************************************************
*** FUNCION PARA MODIFICAR LA CONSIGURACIÓN PAGINA PRINCIPAL     ****
********************************************************************/
public static function actualizarprincipal($pagina){
	try {
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE index_principal SET 
                                fila2_columna1=:fila2_columna1, 
                                fila2_columna2=:fila2_columna2,
                                fila3=:fila3,
                                fila4_columna1=:fila4_columna1,
                                fila4_columna2=:fila4_columna2,
                                fila4_columna3=:fila4_columna3,
                                fila5_columna1=:fila5_columna1,
                                fila5_columna2=:fila5_columna2,
                                fila5_columna3=:fila5_columna3,
                                fila6_columna1=:fila6_columna1,
                                fila6_columna2=:fila6_columna2,
                                fila6_columna3=:fila6_columna3,
                                servicio1=:servicio1,
                                servicio2=:servicio2,
                                servicio3=:servicio3,
                                servicio4=:servicio4,
                                servicio5=:servicio5,
                                servicio6=:servicio6,
                                servicio7=:servicio7,
                                servicio8=:servicio8,
                                servicio9=:servicio9,
                                tservicio1=:tservicio1,
                                tservicio2=:tservicio2,
                                tservicio3=:tservicio3,
                                tservicio4=:tservicio4,
                                tservicio5=:tservicio5,
                                tservicio6=:tservicio6,
                                tservicio7=:tservicio7,
                                tservicio8=:tservicio8,
                                tservicio9=:tservicio9 
                                WHERE id_principal=:id_principal');


        $update->bindValue('fila2_columna1',$pagina->getFila2Columna1());
        $update->bindValue('fila2_columna2',$pagina->getFila2Columna2());
        $update->bindValue('fila3',$pagina->getFila3());
        $update->bindValue('fila4_columna1',$pagina->getFila4Columna1());
        $update->bindValue('fila4_columna2',$pagina->getFila4Columna2());
        $update->bindValue('fila4_columna3',$pagina->getFila4Columna3());
        $update->bindValue('fila5_columna1',$pagina->getFila5Columna1());
        $update->bindValue('fila5_columna2',$pagina->getFila5Columna2());
        $update->bindValue('fila5_columna3',$pagina->getFila5Columna3());
        $update->bindValue('fila6_columna1',$pagina->getFila6Columna1());
        $update->bindValue('fila6_columna2',$pagina->getFila6Columna2());
        $update->bindValue('fila6_columna3',$pagina->getFila6Columna3());

        $update->bindValue('servicio1',$pagina->getServicio1());
        $update->bindValue('servicio2',$pagina->getServicio2());
        $update->bindValue('servicio3',$pagina->getServicio3());
        $update->bindValue('servicio4',$pagina->getServicio4());
        $update->bindValue('servicio5',$pagina->getServicio5());
        $update->bindValue('servicio6',$pagina->getServicio6());
        $update->bindValue('servicio7',$pagina->getServicio7());
        $update->bindValue('servicio8',$pagina->getServicio8());
        $update->bindValue('servicio9',$pagina->getServicio9());
        
        $update->bindValue('tservicio1',$pagina->getTservicio1());        
        $update->bindValue('tservicio2',$pagina->getTservicio2());
        $update->bindValue('tservicio3',$pagina->getTservicio3());
        $update->bindValue('tservicio4',$pagina->getTservicio4());
        $update->bindValue('tservicio5',$pagina->getTservicio5());
        $update->bindValue('tservicio6',$pagina->getTservicio6());
        $update->bindValue('tservicio7',$pagina->getTservicio7());
        $update->bindValue('tservicio8',$pagina->getTservicio8());
        $update->bindValue('tservicio9',$pagina->getTservicio9());
        
		$update->bindValue('id_principal',1);
		$update->execute();
	}
	catch(PDOException $e) {
		echo '{"error en function actualizarprincipal":{"Error":'. $e->getMessage() .'}}';
	}
}

/*******************************************************
** FUNCION PARA MOSTRAR TODOS LOS CAMPOS DE LA PAGINA **
********************************************************/
public static function obtenerPagina(){
	try {		
		$db=Db::getConnect();
		$campos=[];

		$select=$db->query('SELECT * FROM index_principal');

		foreach($select->fetchAll() as $campo){
			$campos[]=new Principal($campo['id_principal'],$campo['fila2_columna1'],$campo['fila2_columna2'],
            $campo['fila3'],$campo['fila4_columna1'],$campo['fila4_columna2'],$campo['fila4_columna3'],
            $campo['fila5_columna1'],$campo['fila5_columna2'],$campo['fila5_columna3'],$campo['fila6_columna1'],
            $campo['fila6_columna2'],$campo['fila6_columna3'],$campo['servicio1'],$campo['tservicio1'],
            $campo['servicio2'],$campo['tservicio2'],$campo['servicio3'],$campo['tservicio3'],
            $campo['servicio4'],$campo['tservicio4'],$campo['servicio5'],$campo['tservicio5'],
            $campo['servicio6'],$campo['tservicio6'],$campo['servicio7'],$campo['tservicio7'],
            $campo['servicio8'],$campo['tservicio8'],$campo['servicio9'],$campo['tservicio9']
            );
		}
		return $campos;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}	
}
}
?>