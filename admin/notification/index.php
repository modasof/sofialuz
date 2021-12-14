<?php
SESSION_START();
include "isLogin.php";
include "dbconn.php";
include "sql.php";
$sql = new sql();
$user = $sql->listUser();
?>
<!DOCTYPE html>
<html>
<head>
	<title>test web browser notifikasi</title>

<script>
						function prueba_notificacion(){
							if (Notification) {
								if (Notification.permission !== "granted") {
									Notification.requestPermission()
								}

								var title = "Xitrus"
								var extra = {
									icon: "http://xitrus.es/imgs/logo_claro.png",
									body: "Notificación de prueba en Xitrus"
								}

								// Generamos la notificación
							    var noti = new Notification( title, extra);

							    noti.onshow=function(){
							    	console.log('Notificación: show')
							    }
							    noti.onclick=function(){
							    	console.log('Notificación: click')
							    }
							    noti.onerror=function(){
							    	console.log('Notificación: error')
							    }
							    noti.onclose=function(){
							    	console.log('Notificación: close')
							    }

							    // Se cierra a los 10s
							    setTimeout(function() {noti.close()}, 10000);
							}
						}
						function prueba_notificacion2(){
							if (Notification) {
								if (Notification.permission !== "granted") {
									Notification.requestPermission()
								}

								if(typeof noti2 != 'undefined'){
									noti2.onclose=null;
									noti2.close()
								}

								var title = "Xitrus"
								var extra = {
									icon: "http://xitrus.es/imgs/logo_claro.png",
									body: "Cierra o pulsa la notificación"
								}

								// Generamos la notificación
							    noti2 = new Notification( title, extra);

							    noti2.onclick=function(){
									noti2.onclose=null;
							    	document.getElementById('XITRUS_act_perm2').value='click'
							    	setTimeout(function(){document.getElementById('XITRUS_act_perm2').value=''}, 2000)
							    }
							    noti2.onclose=function(){
							    	document.getElementById('XITRUS_act_perm2').value='close'
							    	setTimeout(function(){document.getElementById('XITRUS_act_perm2').value=''}, 2000)
							    }
							}
						}
					</script>	
	
</head>
<body>
	<h2>Dashboard </h2>
	<?php 
		if($_SESSION['username'] == 'admin')
		{
			?>
				<a href="broadcast.php">Notification Menu</a> | 
			<?php
		}

	 ?>
	 <a href="logout.php">Logout</a>
	<hr>
	<h4>Welcome back <strong><?php echo $_SESSION['username'] ?></strong></h4>
	<p>This is example web push notification from <a href="http://seegatesite.com">seegatesite.com</a>, wait your notify please :)</p>
	<div class="XITRUS_noti">
<input type="button" value='Notificación' onclick='var noti = new Notification( "Notificación" );setTimeout( function() { noti.close() }, 1000)'>
</div>
	<div class="XITRUS_noti">
<input value="Notificación" onclick="prueba_notificacion()" type="button">
</div>
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Notifikasi Script -->
	<script src="mynotif.js"></script>
	
	
</body>
</html>
