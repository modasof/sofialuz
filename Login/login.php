<?php
session_start();
// include("../Include/display_error.php");
// include("../Administrator/Lib/seguridad.php");
// include ("conexion.php");
$hostname = "localhost";
$username = "u234527735_sofialuz2021";
$password = "Teksystem@80761478";
$database = "u234527735_sofialuz2021";
$conexion = new mysqli($hostname, $username, $password, $database);

// $sql ="SELECT Tiempo FROM T_Config WHERE Desarrollador='TEKSYSTEM S.A.S'";  
// $result = $conexion->query($sql);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {                
// $MyTime=$row['Tiempo'];
//     }
// }

if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}
$username = $_POST['txtNombre'];
$password = $_POST['TxtPass'];
$miip=$_POST['miip'];
$miip=trim($miip);
$sistemaoperativo=$_POST['sistemaoperativo'];
$sistemaoperativo=trim($sistemaoperativo);
$navegador=$_POST['navegador'];
$navegador=trim($navegador);



//////////////////////////////////////////////
//AGREGAR SEGURIDAD A LA  CONTRASEÑA
$Password_encriptado = md5($password);

//////////////////////////////////////////////


if ($username=="" or $password=="") {
    $Valida=header("location:index.php?Mensaje=12");
}
else
{
$sql ="SELECT * FROM usuarios  WHERE username='".$username."'";  
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $MyPass=$row['pass'];
        $IdEstado=$row['estado_usuario'];
        $IdNomUser=$row['username'];
        $IdUserReg=$row['id_usuario'];
        //$_SESSION['id']=$row['id_usuario'];
        $cod_cliente=$row['cod_cliente'];
        $cod_proveedor=$row['cod_proveedor'];
        $IdRol=$row['rol_id_rol'];
    }
}

// echo "Password Encriptado: ".$Password_encriptado;
// echo "<br>";
// echo "Clave guardada en Base de Datos: ".$MyPass;
// echo "<br>";
// echo "Clave guardada en Base de Datos encriptada: ".($IdEstado);
// echo "<br>";
// echo "Rol: ".($IdRol);


$session_id = session_id();
//Usuario Activo
$Activo=1;
if ($Password_encriptado==$MyPass && $IdEstado==$Activo ) {
 

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['nombres'] = $nombres;
    $_SESSION['apellidos'] = $apellidos;
    $_SESSION['start'] = time();
    $_SESSION['IdUser']=$IdUserReg;
    $IdUser=$_SESSION['IdUser'];
    $_SESSION['IdRol']=$IdRol;
    $_SESSION['expire'] = $_SESSION['start'] + (100 * $MyTime);
    $_SESSION['MIIP']=$miip;
    
    $id_usuario=$_SESSION['IdUser'];
    $inicio=$_SESSION['start'];
    $ultimo=$_SESSION['expire'];
    $usuario = $_SESSION['username'];

    $consulta = "SELECT * FROM t_usuarios_activos WHERE Id_Usuario = '".$IdUser."'";
    $MiId = session_id();
    $resultado=$conexion->query($consulta);
    if ($resultado->num_rows >0){
        $row = $resultado->fetch_assoc();
        $update="UPDATE t_usuarios_activos SET codigo='".$MiId."',ip='".$miip."', navegador='".$navegador."','".$sistemaoperativo."' WHERE Id_Usuario='".$IdUser."'";
        $resul=$conexion->query($update); 
        //Echo($update);           
    }else {
        $sql="INSERT INTO t_usuarios_activos (Id_Usuario,codigo,start,expire,otros,ip,navegador,sistemaoperativo) 
        VALUES('".$id_usuario."','".$session_id."','".$inicio."','".$ultimo."','".$usuario."','".$miip."','".$navegador."','".$sistemaoperativo."')";
        //echo($sql);
        $resultado = $conexion->query($sql) or die('Error:'.mysqli_error($conexion));
    }    
    
    //$seguridad = AgregarLog($IdUser,"Logeado como administrador","login.php");
    header("location:../admin/index.php"); 
 }
else { 
   header("location:index.php?Mensaje=14");
    //echo("no son iguales");
}
 mysqli_close($conexion); 
}
 ?>
