<?php
include 'conexion.php';

try {
	session_start();
	$fecha = date("Y-m-d");
	date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
	$hora = date('h:i A');
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// activar para reportar error en secuencias simples (query)
	
	$usuario = $_SESSION['name'];

	$con->query("INSERT INTO `historial`(`usuario`, `accion`,  `fecha`, `hora`) VALUES ('$usuario','Cerró sesión','$fecha','$hora')"); //agregar accion de cerrar sesion al historial de acciones de usuarios
	session_destroy(); //destruir sesio actual
	unset($_SESSION['id	'], $_SESSION['name']); //vaciar variables = nulas
	$con->commit();
	$con->close();
	header("location:../index.php"); //redirigir a index
} catch (Exception $e) {
	$con->rollback();
	echo 'Error: ',  $e->getMessage(), "\n";
}
