<?php

//Conexion a la base de datos
$host="localhost";
$bd="sitio";
$usuario="root";
$contrasenia="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia); //PDO realiza una conexion con la base de datos
    
} catch (Exception $ex) {
    echo $ex->getMessage(); //getMessage sirve para mostrar el mensaje de error que se produjo
}

/////////////////////////////////////////////////////////////////////////////

?>




