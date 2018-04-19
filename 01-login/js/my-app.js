var usuario, clave;
//AJAX DE JQUERY
$(function(){
	//Envia verificación del login, desde el boton
	$("#envia").click(function(){
		usuario = $("#usuario").val();
		clave = $("#clave").val();
		//
		$.ajax({type:"POST",
				//url:"E:/xampp/htdocs/php/login.php",
				url:"http://sd-1479920-h00001.ferozo.net/public_html/login.php", //http://localhost/php/login.php",
				data:({usuario:usuario, clave:clave}),
				cache: false,
				datatype: "text",
				crossDomain: true,
				//ANTES QUE INICIE EL ENVIO
 				beforeSend: function(){ $("#mensaje").text('Espere, por favor...');},
				success: continua,
				error: noConexion
		});

	});
});
/**********************************************/
function continua(datos){
	//SI NO ENCUENTRA LOS DATOS
	if(datos=="ERROR"){
		document.getElementById("usuario").value = "";
		document.getElementById("clave").value = "";
		alert("Tu usuario o tu clave de acceso son erróneas *");
		return;
	}
	//ENCONTRO LOS DATOS
	alert("Bienvenido: "+ datos);
	//CAMBIAR LA PAGINA
	$.mobile.changePage($("#pag2"),"none");
}
/*****************************************/
//ERROR
function noConexion(){
	alert("No hay conexión	");
}