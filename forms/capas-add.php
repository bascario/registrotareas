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
		<title>.:Agregar tarea:.</title>

		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style_nav.css" rel="stylesheet">
		<link href="../css/style_ini.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="../../img/icons/PERS_icon.png" />



	</head>


	<body>
		<div class="loader"></div>
		<div class="web-page">
			<div class="content">



				<h2>Lista de Tareas &raquo; Agregar tarea</h2>
				<hr />
				<?php


				if (isset($_POST['add'])) {

					try {
						$ubicacion = $con->real_escape_string($_POST["ubicacion"]); //Escapar caracteres especiales
						$titulo = $con->real_escape_string($_POST["titulo"]); //Escapar caracteres especiales
						$ttl = $con->real_escape_string($_POST["ttl"]); //Escapar caracteres especiales
						$archivo = $con->real_escape_string($_POST["archivo"]); //Escapar caracteres especiales
						$dep = $con->real_escape_string($_POST["dep"]); //Escapar caracteres especiales
						$rec = $con->real_escape_string($_POST["rec"]); //Escapar caracteres especiales

						//agregar nueva capa a la tabla de capas
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // para activar reportar error en secuencias simples (query)
						$con->autocommit(FALSE); //iniciar transaccion a la base de datos
						$insert = $con->prepare("INSERT INTO `capas`(`ubicacion`, `titulo`, `ttl_lynd`, `url_archivo`, `dep`, `rec`) VALUES (?,?,?,?,?,?)"); //preparar consultar
						$insert->bind_param('ssssii', $ubicacion, $titulo, $ttl, $archivo, $dep, $rec); //agregar variables a la sentencia preparada
						$insert->execute();
						$fecha = date("Y-m-d");
						date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
						$hora = date("h:i A");
						$nom = $_SESSION['name']; //obtener nombre de usuario de la sesión activa
						$recu = getNrec($con, $rec); //obtener nombre de recurso
						$depa = getNdep($con, $dep); //obtener nombre de departamento

						//agregar acción de agregar capa al historial de acciones de usuarios
						$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`) VALUES ('$nom','Agregó una capa al recurso $recu del departamento $depa','- $ubicacion<br>- $titulo','$fecha','$hora')");
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Los datos han sido guardados con éxito.</div>';
						$insert->close();
						$con->commit();
					} catch (Exception $e) { //si hay error, revierte la transaccion
						$con->rollback();
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
					}
				}

				?>
				<form class="form-horizontal" action="" method="post" onsubmit="return checkSubmit();">
					<div class="form-group">
						<label class="col-sm-3 control-label">Fecha de entrega</label>
						<div class="col-sm-4">
							<input type="date" name="ubicacion" class="form-control" placeholder="fecha" title="Debe ingresar la fecha de entrega de la tarea" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Titulo de la Tarea</label>
						<div class="col-sm-4">
							<input type="text" name="titulo" class="form-control" placeholder="Titulo de la tarea" title="Debe ingresar un nombre de la tarea a mostrar" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Descripción de la tarea</label>
						<div class="col-sm-4">
							<input type="text" name="ttl" class="form-control" placeholder="descripción breve a mostrar">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link de material de soporte</label>
						<div class="col-sm-4">
							<input type="text" name="archivo" class="form-control" placeholder="Link del material de ayuda">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Asignatura</label>
						<div class="col-sm-4">
							<select name="dep" class="selectpicker">
								<!--agregar los nombres de todos los departamentos a selector-->
								<?php addDep($con); ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Recurso</label>
						<div class="col-sm-4">
							<select name="rec" class="selectpicker">
								<!--agregar los nombres de todos los recursos a selector-->
								<?php addRec($con); ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">&nbsp;</label>
						<div class="col-sm-6">
							<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
							<a href="capas.php" class="btn btn-sm btn-danger">Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include 'nav.php';

		?>

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
				//restringir el tamaño máximo del texto en el input de ubicación
				$('[name="ubicacion"]').keypress(function(event) {
					if (this.value.length >= 200) {
						return false;
					}
				});
				//restringir el tamaño máximo del texto en el input del titulo de la capa
				$('[name="titulo"]').keypress(function(event) {
					if (this.value.length >= 200) {
						return false;
					}
				});

				//restringir el tamaño máximo del texto en el input del titulo de la leyenda
				$('[name="ttl"]').keypress(function(event) {
					if (this.value.length >= 80) {
						return false;
					}
				});
				//restringir el tamaño máximo del texto en el input de la url del archivo asociado a la capa
				$('[name="archivo"]').keypress(function(event) {
					if (this.value.length >= 200) {
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