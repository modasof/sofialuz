<?php
class PropietariostarifasController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LOS EGRESOS DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $id = $_GET['id_propietario'];
        $campos    = Propietariostarifas::obtenerPaginatarifas($id);
        require_once 'vistas/propietariostarifas/todosruta.php';
    }

     public function todoshora()
    {
        $id = $_GET['id_propietario'];
        $campos    = Propietariostarifas::obtenerPaginahoras($id);
        require_once 'vistas/propietariostarifas/todoshora.php';
    }

      public function todosproducto()
    {
        $id = $_GET['id_propietario'];
        $campos    = Propietariostarifas::obtenerPaginaproductos($id);
        require_once 'vistas/propietariostarifas/todosproducto.php';
    }



    # =================================================
    # =           Formularios de Crear nuevo           =
    # =================================================

       public function nuevoValoresRuta()
    {
        require_once 'vistas/propietariostarifas/nuevoruta.php';
    }

     public function nuevoValoresHora()
    {
        require_once 'vistas/propietariostarifas/nuevo.php';
    }

     public function nuevoValoresProducto()
    {
        require_once 'vistas/propietariostarifas/nuevo.php';
    }
    
    # ======  End of Formulario de Crear nuevo  =======
    


    /*=============================================
    =            Editar por canal_venta           =
    =============================================*/
    
    public function editarValoresRuta()
    {
        $id     = $_GET['id'];
        $campos = Propietariostarifas::obtenerPaginaPor($id);
        require_once 'vistas/propietariostarifas/editar1.php';
    }

    public function editarValoresHora()
    {
        $id     = $_GET['id'];
        $campos = Propietariostarifas::obtenerPaginaPor($id);
        require_once 'vistas/propietariostarifas/editar1.php';
    }

    public function editarValoresProducto()
    {
        $id     = $_GET['id'];
        $campos = Propietariostarifas::obtenerPaginaPor($id);
        require_once 'vistas/propietariostarifas/editar2.php';
    }
    
    /*=====  End of Section comment block  ======*/
    
    
    public function eliminar()
    {
        $id      = $_GET['id'];
        $id_propietario = $_GET['id_propietario'];
        $res     = Propietariostarifas::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Propietariostarifas::obtenerPaginatarifas($id_propietario);
        require_once 'vistas/propietariostarifas/todosruta.php';
    }

     public function eliminarhora()
    {
        $id      = $_GET['id'];
        $id_propietario = $_GET['id_propietario'];
        $res     = Propietariostarifas::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Propietariostarifas::obtenerPaginahoras($id_propietario);
        require_once 'vistas/propietariostarifas/todoshora.php';
    }

     public function eliminarproducto()
    {
        $id      = $_GET['id'];
        $id_propietario = $_GET['id_propietario'];
        $res     = Propietariostarifas::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Propietariostarifas::obtenerPaginaproductos($id_propietario);
        require_once 'vistas/propietariostarifas/todosproducto.php';
    }


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {

    $id_propietario = $_GET['id_propietario'];
    $variable = $_POST;
    $nuevoarreglo = array();
    extract($variable);
    foreach ($variable as $campo => $valor){
        //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
        $campo = strip_tags(trim($campo));
        $campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

        $valor = strip_tags(trim($valor));
        $valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
        if ($campo=="imagen2"){
            $nuevoarreglo[$campo]=$ruta_imagen;
        }else{
            $nuevoarreglo[$campo]=$valor;
        }
    }

    $equipo_id=$_POST['equipo_id'];

    $validarduplicado=Propietariostarifas::validacionpor($equipo_id);

    if ($validarduplicado>0) {

        echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado los datos, el equipo seleccionado ya tiene una tarifa\", \"info\");});</script>";
    }else{

    $campo = new Propietariostarifas('',$nuevoarreglo);
    $res = Propietariostarifas::guardar($campo);
    if ($res){
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
    }else{
        echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
    }
}
     $this->show();
 
}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarvalorhora() {

    $id_propietario = $_GET['id_propietario'];
    $variable = $_POST;
    $nuevoarreglo = array();
    extract($variable);
    foreach ($variable as $campo => $valor){
        //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
        $campo = strip_tags(trim($campo));
        $campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

        $valor = strip_tags(trim($valor));
        $valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
        if ($campo=="imagen2"){
            $nuevoarreglo[$campo]=$ruta_imagen;
        }else{
            $nuevoarreglo[$campo]=$valor;
        }
    }
    $campo = new Clientesprecios('',$nuevoarreglo);
    $res = Propietariostarifas::guardar($campo);
    if ($res){
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
    }else{
        echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
    }
     $this->showvalorhora();
 
}

/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarvalorproducto() {

    $id_propietario = $_GET['id_propietario'];
    $variable = $_POST;
    $nuevoarreglo = array();
    extract($variable);
    foreach ($variable as $campo => $valor){
        //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
        $campo = strip_tags(trim($campo));
        $campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

        $valor = strip_tags(trim($valor));
        $valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
        if ($campo=="imagen2"){
            $nuevoarreglo[$campo]=$ruta_imagen;
        }else{
            $nuevoarreglo[$campo]=$valor;
        }
    }
    $campo = new Clientesprecios('',$nuevoarreglo);
    $res = Propietariostarifas::guardar($campo);
    if ($res){
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
    }else{
        echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
    }
     $this->showvalorproducto();
 
}


/*************************************************************/
/* FUNCION PARA ACTUALIZAR*/
/*************************************************************/
function actualizar(){
    $id = $_GET['id'];
    $id_propietario = $_GET['id_propietario'];
    $variable = $_POST;
    $nuevoarreglo = array();
    extract($variable);
    foreach ($variable as $campo => $valor){
        //ELIMINAR CUALQUIER ETIQUETA <> PARA INYECCION SCRIPT
        $campo = strip_tags(trim($campo));
        $campo  = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');

        $valor = strip_tags(trim($valor));
        $valor  = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
        if ($campo=="imagen"){
            $nuevoarreglo[$campo]=$ruta_imagen;
        }else{
            $nuevoarreglo[$campo]=$valor;
        }

    }
    $datosguardar = new Clientesprecios($id,$nuevoarreglo);
    $res = Propietariostarifas::actualizar($id,$datosguardar);
    if ($res){
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
    }else{
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
    $this->show($id_propietario);
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function show()
    {
        $id_propietario = $_GET['id_propietario'];
        $campos    = Propietariostarifas::obtenerPaginatarifas($id_propietario);
        require_once 'vistas/propietariostarifas/todosruta.php';
    }

   

}
