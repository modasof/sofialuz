<?php
class ClientespreciosController
{
    public function __construct()
    {}

/*************************************************************/
/* FUNCION PARA MOSTRAR TODOS LOS EGRESOS DESDE ROUTING.PHP*/
/*************************************************************/

    public function todos()
    {
        $id = $_GET['id_cliente'];
        $campos    = Clientesprecios::obtenerPaginarutas($id);
        require_once 'vistas/clientesprecios/todosruta.php';
    }

     public function todoshora()
    {
        $id = $_GET['id_cliente'];
        $campos    = Clientesprecios::obtenerPaginahoras($id);
        require_once 'vistas/clientesprecios/todoshora.php';
    }

      public function todosproducto()
    {
        $id = $_GET['id_cliente'];
        $campos    = Clientesprecios::obtenerPaginaproductos($id);
        require_once 'vistas/clientesprecios/todosproducto.php';
    }



    # =================================================
    # =           Formularios de Crear nuevo           =
    # =================================================

       public function nuevoValoresRuta()
    {
        require_once 'vistas/clientesprecios/nuevoruta.php';
    }

     public function nuevoValoresHora()
    {
        require_once 'vistas/clientesprecios/nuevo.php';
    }

     public function nuevoValoresProducto()
    {
        require_once 'vistas/clientesprecios/nuevo.php';
    }
    
    # ======  End of Formulario de Crear nuevo  =======
    


    /*=============================================
    =            Editar por canal_venta           =
    =============================================*/
    
    public function editarValoresRuta()
    {
        $id     = $_GET['id'];
        $campos = Clientesprecios::obtenerPaginaPor($id);
        require_once 'vistas/clientesprecios/editar1.php';
    }

    public function editarValoresHora()
    {
        $id     = $_GET['id'];
        $campos = Clientesprecios::obtenerPaginaPor($id);
        require_once 'vistas/clientesprecios/editar1.php';
    }

    public function editarValoresProducto()
    {
        $id     = $_GET['id'];
        $campos = Clientesprecios::obtenerPaginaPor($id);
        require_once 'vistas/clientesprecios/editar2.php';
    }
    
    /*=====  End of Section comment block  ======*/
    
    
    public function eliminar()
    {
        $id      = $_GET['id'];
        $id_cliente = $_GET['id_cliente'];
        $res     = Clientesprecios::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Clientesprecios::obtenerPaginarutas($id_cliente);
        require_once 'vistas/clientesprecios/todosruta.php';
    }

     public function eliminarhora()
    {
        $id      = $_GET['id'];
        $id_cliente = $_GET['id_cliente'];
        $res     = Clientesprecios::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Clientesprecios::obtenerPaginahoras($id_cliente);
        require_once 'vistas/clientesprecios/todoshora.php';
    }

     public function eliminarproducto()
    {
        $id      = $_GET['id'];
        $id_cliente = $_GET['id_cliente'];
        $res     = Clientesprecios::eliminarPor($id);
        if ($res) {
            echo "<script>jQuery(function(){Swal.fire(\"¡Datos eliminados!\", \"Se han eliminado correctamente los datos\", \"success\");});</script>";
        } else {
            echo "<script>jQuery(function(){Swal.fire(\"¡Error al eliminar!\", \"No se han eliminado correctamente los datos\", \"error\");});</script>";
        }
        $campos = Clientesprecios::obtenerPaginaproductos($id_cliente);
        require_once 'vistas/clientesprecios/todosproducto.php';
    }


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardar() {

    $id_cliente = $_GET['id_cliente'];

    $origen_id=$_POST['origen_id'];
    $destino_id=$_POST['destino_id'];

    if ($origen_id==$destino_id) {
        echo "<script>jQuery(function(){Swal.fire(\"¡Error al guardar!\", \" Se seleccionaron origen y destino iguales \", \"warning\");});</script>";
         $this->show();
    }
    else{

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
    $res = Clientesprecios::guardar($campo);
    if ($res){
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos guardados!\", \"Se han guardado correctamente los datos\", \"success\");});</script>";
    }else{
        echo "<script>jQuery(function(){Swal.fire(\"¡Erro al guardar!\", \"No se han guardado correctamente los datos\", \"error\");});</script>";
    }
     $this->show();
 }
}


/*************************************************************/
/* FUNCION PARA GUARDAR NUEVO REGISTRO */
/*************************************************************/
function guardarvalorhora() {

    $id_cliente = $_GET['id_cliente'];
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
    $res = Clientesprecios::guardar($campo);
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

    $id_cliente = $_GET['id_cliente'];
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
    $res = Clientesprecios::guardar($campo);
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
    $id_cliente = $_GET['id_cliente'];
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
    $res = Clientesprecios::actualizar($id,$datosguardar);
    if ($res){
        echo "<script>jQuery(function(){Swal.fire(\"¡Datos actualizados!\", \"Se ha actualizado correctamente la pagina \", \"success\");});</script>";
    }else{
                echo "<script>jQuery(function(){Swal.fire(\"¡Error al actualizar!\", \"Hubo un error al actualizar, comunique con el administrador del sistema\", \"error\");});</script>";
        }
    $this->show($id_cliente);
}

/*************************************************************/
/* FUNCION PARA MOSTRAR LA PAGINA*/
/*************************************************************/
    public function show()
    {
        $id_cliente = $_GET['id_cliente'];
        $campos    = Clientesprecios::obtenerPaginarutas($id_cliente);
        require_once 'vistas/clientesprecios/todosruta.php';
    }

     public function showvalorhora()
    {
        $id_cliente = $_GET['id_cliente'];
        $campos    = Clientesprecios::obtenerPaginahoras($id_cliente);
        require_once 'vistas/clientesprecios/todoshora.php';
    }

     public function showvalorproducto()
    {
        $id_cliente = $_GET['id_cliente'];
        $campos    = Clientesprecios::obtenerPaginaproductos($id_cliente);
        require_once 'vistas/clientesprecios/todosproducto.php';
    }

}
