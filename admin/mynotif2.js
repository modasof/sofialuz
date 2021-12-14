$(document).ready(function() {
		checknotif2();
	setInterval(function(){ checknotif2(); }, 30000);
});
function checknotif2() {
	if (!Notification) {
		$('body').append('<h4 style="color:red">*Browser does not support Web Notification</h4>');
		return;
	}
	if (Notification.permission !== "granted")
		Notification.requestPermission();
	else {
		$.ajax(
		{
			url : "notification/ajax2.php",
			type: "POST",
			success: function(data, textStatus, jqXHR)
			{
				var data = jQuery.parseJSON(data);
				if(data.result == true){
					var data_notif = data.notif;
					
					for (var i = data_notif.length - 1; i >= 0; i--) {
						var theurl = data_notif[i]['url'];
						var notifikasi = new Notification(data_notif[i]['title'], {
							icon: data_notif[i]['icon'],
							body: data_notif[i]['msg'],
						});
						notifikasi.onclick = function () {
							window.open(theurl); 
							notifikasi.close();     
						};
						setTimeout(function(){
							notifikasi.close();
						}, 9000);
					};
				}else{

				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{

			}
		});	

	}
};
