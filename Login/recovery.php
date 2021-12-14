<?php 
$verificar_email = $_POST['TxtEmail'];

if ($verificar_email!="") {
include("conexion.php");

$sql ="SELECT * FROM usuarios WHERE email='$verificar_email' ";  
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
	
    while ($row = $result->fetch_assoc()) {                
        $email_recuperado=$row['email'];
        $pass_recuperado=$row['pass'];
        $id=$row['id_usuario'];
    }
}

if ($email_recuperado!="") {
	
//$copiacorreo="mediosdigitales@ofigas.com";
/*$to = $email_recuperado;
$redi = "https://sofialuz.net/Login/restablecer.php"
$subject = "Recuperacion de Contraseña";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$message = include("restablecer.php");

 
mail($to, $subject, $message, $headers);
//Email_Personalizado($email_recuperado,$copiacorreo,2,$email_recuperado,$pass_recuperado,0,0);*/

		//check whether user exists in the database
		
				$resetPassLink = 'https://sofialuz.net/Login/restablecer.php?fp_code='.$id;
				
			
				//send reset password email
				$to = $email_recuperado;
				$subject = "Solicitud de Cambio de Contraseña";
				$mailContent = 'Estimad@ '.$email_recuperado.', 
				<br/><br/>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.
				<br/>Para restablecer su contraseña, visite el siguiente enlace: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Saludos,
                <br/>
                <br/>
                <br/>';                ;
                
				//set content-type header for sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				//additional headers
				$headers .= 'From: sofialuz<sender@example.com>' . "\r\n";
				//send email
				mail($to,$subject,$mailContent,$headers);
				
				
$Valida=header("location:index.php?Mensaje=13");
}
else
{
	$Valida=header("location:index.php?Mensaje=14");
}

}

?>