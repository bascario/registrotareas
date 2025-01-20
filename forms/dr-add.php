<?php
include '../php/conexion.php';
session_start();
if (isset($_SESSION['id'])) { //verificar que un usuario tiene una sesión activa en la plataforma
	include '../php/inactividad.php';

	expirar(); //verificar que hubo actividad en los ultimos 10 minutos
	include '../php/add.php';
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>.:Agregar Asignatura:.</title>

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style_nav.css" rel="stylesheet">
		<link href="../css/style_ini.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="../../img/icons/PERS_icon.png" />

	</head>


	<body>
		<div class="loader"></div>
		<div class="web-page">
			<div class="content">
				<?php
				/* 
				si lista es igual a 1, el formulario cargará las opciones para agregar un departamento,
				si es igual a 2, el formulario cargará las opciones para agregar un recurso,
				si es igual a algún otro valor, mostrará un mensaje de error
				*/
				$lista = $_GET['lista'];
				if ($lista == 1) {
				?> <h2>Lista de Asignaturas &raquo; Agregar Asignatura</h2>
					<hr />
				<?php
				} else if ($lista == 2) {
				?> <h2>Lista de recursos &raquo; Agregar recurso</h2>
					<hr />
				<?php	} else {
				?>
					<script type="text/javascript">
						alert("Error, No corresponde a algun valor");
						window.location.href = "inicio.php";
					</script>
				<?php
				}

				if (isset($_POST['add'])) {
					$nombre = $con->real_escape_string($_POST["nombre"]); //Escapar caracteres especiales

					if ($lista == 1) {
						//insertar nuevo departamento a la tabla de departamentos
						$sql =  "INSERT INTO `asignaturas`( `nombre`) VALUES (?)";
					} else {
						//agregar nuevo recurso a la tabla de recursos
						$sql = "INSERT INTO `recursos`(`nombre`) VALUES (?)";
					}

					try {
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // para activar reportar error en secuencias simples (query)
						$con->autocommit(FALSE); //preparar una transaccion
						$insert = $con->prepare($sql);
						$insert->bind_param('s', $nombre); //agregar variables a la sentencia preparada
						$insert->execute();
						$fecha = date("Y-m-d");
						date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
						$hora = date("h:i A");
						$nom = $_SESSION['name'];
						if ($lista == 1) {

							//agregar acción de agregar un departamento al historial de acciones de usuarios
							$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`) VALUES ('$nom','Agregó una asignatura','$nombre','$fecha','$hora')");
						} else {
							//agregar acción de agregar un recurso al historial de acciones de usuarios
							$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`) VALUES ('$nom','Agregó un recurso','$nombre','$fecha','$hora')");
						}
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
						$con->commit();
						$insert->close();
					} catch (Exception $e) { //si hay error, revierte la transaccion
						$con->rollback();
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
					}
				}

				?>
				<?php

				if ($lista == 1) { //formulario para departamento
				?>
					<form class="form-horizontal" action="" method="post" onsubmit="return checkSubmit();">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre</label>
							<div class="col-sm-4">
								<input type="text" name="nombre" class="form-control" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-6">
								<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
								<a href="depart.php" class="btn btn-sm btn-danger">Cancelar</a>
							</div>
						</div>
					</form>
				<?php
				} else { //formulario para recurso
				?>
					<form class="form-horizontal" action="" method="post" onsubmit="return checkSubmit();">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre</label>
							<div class="col-sm-4">
								<input type="text" name="nombre" class="form-control" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-6">
								<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
								<a href="recursos.php" class="btn btn-sm btn-danger">Cancelar</a>
							</div>
						</div>
					</form>
				<?php
				}
				?>

			</div>
		</div>
		<?php include 'nav.php'; ?>

		<script type="text/javascript">
			//evitar el envio doble de los formularios
			var statSend = false;

			function checkSubmit() {
				if (!statSend) {
					statSend = true;
					return true;
				} else {
					return false;
				}
			}
			$(document).ready(function() {
				elementos(); // cargar funcionalidades del menu lateral
				//titulo del sitio para agregar departamento o recurso
				if (<?php echo $lista; ?> == 1) {
					document.title = "Agregar Asignatura";
				} else {
					document.title = "Agregar recurso"
				}

				//restringir el tamaño máximo del texto en el input de nombre del recurso o departamento
				$('[name="nombre"]').keypress(function(event) {
					if (this.value.length >= 50) {
						return false;
					}
				});
			});
		</script>

	</body>
<?php
} else {
	//si no hay una sesión activa en la plataforma,redirige al formulario de login
	header("location:../index.php");
}
?>

	</html>