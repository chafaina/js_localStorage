<?php
$servidor="sd-1479920-h00001.ferozo.net"; //localhost
$db = "meeting";
$usuario = "admin";
$clave = "meeting";
$conn = mysqli_connect($servidor,$usuario,$clave,$db) or die("Error en la conexión a la base de datos");
?>