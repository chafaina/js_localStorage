<?php
//LEVANTAR UN SERVICIO POST EN PHP
if (isset($_SERVER['HTTP_ORIGIN'])) {  
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
    header('Access-Control-Allow-Credentials: true');  
    header('Access-Control-Max-Age: 86400');   
}  
  
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {  
  
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))  
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  
  
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))  
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");  
}

// CONECION A LA BASE DE DATOS
include "conn.php";

$usuario = "";
$clave = "";
if(isset($_POST["usuario"])){
	$usuario = $_POST["usuario"];
}
if(isset($_POST["pass"])){
	$clave = $_POST["pass"];
}
$q = "SELECT * FROM usuario WHERE usuario='".$usuario."' AND pass='".$clave."'";
if($r=mysqli_query($conn, $q)){
	if(mysqli_num_rows($r)>0){
		$d = mysqli_fetch_array($r,MYSQLI_ASSOC);
		$data = $d["usuario"]; 
	} else {
		$data = "ERROR";
	}
} else {
	$data = "ERROR";
}
print $data;
?>