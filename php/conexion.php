<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost"; //servidor
$db_user = "root"; //usuario
$db_pass = ""; //contraseña
$db_name = "pers_re"; //base de datos


try {
    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $con->set_charset("utf8");
} catch (mysqli_sql_exception $e) {
    
}


?>