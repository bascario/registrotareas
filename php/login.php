<?php
include 'encriptar.php';
include 'conexion.php';

$usuario = $con->real_escape_string(strip_tags($_POST["usuario"])); //usuario recibido por POST
$fecha = date("Y-m-d");
date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
$hora = date('h:i A');

if ($_POST['contraseña']) { //si se recibe un valor de contraseña
	$pass = $con->real_escape_string($encriptar($_POST['contraseña'])); //recibir contraseña por POST y encriptarla
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // activar para reportar error en secuencias simples (query)
	$sql = $con->prepare("SELECT id,usuario from usuarios where usuario=? and contrasena=?"); //consultar usuario 
	$sql->bind_param('ss', $usuario, $pass);
	$sql->execute();
	$result = $sql->get_result();
	$sql->close();
	if ($result->num_rows > 0) {
		try {
			$row = $result->fetch_assoc();
			session_start(); //iniciar una sesion en el navegador				
			$_SESSION['id'] = $row['id']; //guardar id de usuario en la sesion iniciada
			$_SESSION['access'] = time(); //guardar tiempo de actividad
			if ($usuario == 'admin') {
				$nom = 'admin';				
			} else {
				$nom = $row['usuario']; //nombre de usuario en la sesion iniciada 				
			}
			$_SESSION['name'] = $nom; //nombre de usuario en la sesion iniciada de admin
			$con->query("INSERT INTO `historial`(`usuario`, `accion`,  `fecha`, `hora`) VALUES ('$nom','Inició sesión','$fecha','$hora')"); //agregar accion de iniciar sesion al historial de acciones de usuarios		
			
			echo 0; //retornar en caso de exito
		} catch (Exception $e) {
			echo 1; //retornar en caso de no encontrar usuario
		}
	} else {
		echo 1; //retornar en caso de error
	}	
	$con->close();
} else {

	$pass = $encriptar("pers_orinoquia"); //encriptar pers_orinoquia como contraseña por defecto	
	$sql = $con->prepare("SELECT id,nombres,apellidos from usuarios where usuario= ?"); //consultar la existencia del usuario
	$sql->bind_param('s', $usuario);
	$sql->execute();
	$result = $sql->get_result();	
	$sql->close();
	if ($result->num_rows > 0) {
		try {
			$row = $result->fetch_assoc();
			$nom = $row['nombres'] . ' ' . $row['apellidos'];
			$_SESSION['name'] = $nom;
			$nid = $row['id'];
			$con->autocommit(FALSE);
			$con->query("UPDATE `usuarios` SET `contrasena`='$pass' WHERE `id`='$nid'"); //actualizar contraseña de usuario 
			$con->query("INSERT INTO `historial`(`usuario`, `accion`,  `fecha`, `hora`) VALUES ('$nom','Restauró su contraseña','$fecha','$hora')"); //agregar accion de restaurar contraseña al historial de acciones de usuarios
			$con->commit();
			echo 0; //retornar en caso de exito
		} catch (Exception $e) {
			$con->rollback();
			echo 1; //retornar en caso de error
		}
	} else {
		echo 1; //retornar en caso de no encontrar usuario
	}	
	$con->close();
}
