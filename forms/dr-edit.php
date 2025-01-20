<?php
include '../php/conexion.php';
session_start();
if (isset($_SESSION['id'])) { //verificar que un usuario tiene una sesión activa en la plataforma
	include '../php/inactividad.php';
	expirar(); //verificar que hubo actividad en los ultimos 10 minutos
	include '../php/edit.php';
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Editar registros</title>
		<link rel="icon" type="image/png" href="../../img/icons/PERS_icon.png" />

		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style_nav.css" rel="stylesheet">
		<link href="../css/style_ini.css" rel="stylesheet">

	</head>
	<?php

	?>

	<body>
		<div class="loader"></div>

		<div class="web-page">
			<div class="content">


				<?php
				$lista =  $con->real_escape_string($_GET["lista"]);
				$nik =  $con->real_escape_string($_GET["nik"]);
				/* 
				si lista es igual a 1, el formulario cargará las opciones para actualizar un departamento,
				si es igual a 2, el formulario cargará las opciones para actualizar un recurso,
				si es igual a algún otro valor, mostrará un mensaje de error
				*/

				if ($lista == 1) {

					$sql = $con->prepare("SELECT * FROM departamentos WHERE id=?"); //consultar la existencia de un departamento con el id recibido
				?> <h2>Lista de departamentos &raquo; Editar departamentos</h2>
					<hr />

				<?php
				} else if ($lista == 2) {

					$sql = $con->prepare("SELECT * FROM recursos WHERE id=?"); //consultar la existencia de un recurso con el id recibido

				?>
					<h2>Lista de recursos &raquo; Editar recursos</h2>
					<hr />
				<?php
				}
				$sql->bind_param('i', $nik);
				$sql->execute();
				$result = $sql->get_result();

				if ($result->num_rows == 0) {
				?>
					<script type="text/javascript">
						alert("Error, No corresponde a algun valor");
						window.location.href = "inicio.php";
					</script>
				<?php

				} else {
					$row = $result->fetch_assoc();
				}

				if (isset($_POST['save'])) {

					/* los cambios son anidados con ";;", para luego organizarlos en columnas
					diferentes con los antiguos valores a la izquierda y los nuevos a la derecha
					 */

					$nombre = $con->real_escape_string($_POST["nombre"]); // Escapar caracteres especiales 
					$old1 = $row['nombre'];

					if ($lista == 1) {

						//actualizar departamento según su id
						$qry = "UPDATE `departamentos` SET `nombre`=? WHERE `id`=?";
					} else {

						//actualizar recurso según su id
						$qry = "UPDATE `recursos` SET `nombre`=? WHERE `id`=?";
					}

					try {
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // para activar reportar error en secuencias simples (query)
						$con->autocommit(FALSE); //preparar una transaccion
						$update = $con->prepare($qry);
						$update->bind_param('si', $nombre, $nik); //agregar variables a la sentencia preparada
						$update->execute();
						$fecha = date("Y-m-d");
						date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
						$hora = date('h:i A');
						$nom = $_SESSION['name'];

						$n = "";  //variable para almacenar los cambios respecto a la información anterior
						$n = cambios($old1, $nombre, $n); //comparar los cambios de los valores
						if ($lista == 1) {
							//agregar acción de modificar un departamento al historial de acciones de usuarios
							$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`,`tipo`) VALUES ('$nom','Modificó un departamento $old1','$n','$fecha','$hora',1)");
						} else {
							//agregar acción de modificar un recurso al historial de acciones de usuarios
							$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`,`tipo`) VALUES ('$nom','Modificó un recurso','$n','$fecha','$hora',1)");
						}
						$con->commit();
						$update->close();
						$sql->close();
						//recargar información para enviar mensaje de éxito
						header("Location: dr-edit.php?lista=" . $lista . "&nik=" . $nik . "&ops=succ");
					} catch (Exception $e) { //si hay error, revierte la transaccion
						$con->rollback();
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
					}
				}

				if (($_GET['ops']) == 'succ') {
					//mostrar mensaje de éxito
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
				}

				if ($lista == 1) {
				?>
					<form class="form-horizontal text-left" action="" method="post" onsubmit="return checkSubmit();">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre</label>
							<div class="col-sm-4">
								<input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="Nombre" title="Debe ingresar un nombre para el departamento" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-6">
								<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
								<a href="depart.php" class="btn btn-sm btn-danger">Cancelar</a>

							<?php
						} else {
							?>
								<form class="form-horizontal text-left" action="" method="post" onsubmit="return checkSubmit();">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nombre</label>
										<div class="col-sm-4">
											<input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="Nombre" title="Debe ingresar un nombre para el departamento" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">&nbsp;</label>
										<div class="col-sm-6">
											<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
											<a href="recursos.php" class="btn btn-sm btn-danger">Cancelar</a>
										<?php
									}
										?>

										</div>
									</div>

								</form>
							</div>
						</div>
						<?php

						include 'nav.php';
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
								//titulo del sitio para agregar departamento o recurso
								if (<?php echo $lista; ?> == 1) {
									document.title = "Editar departamento";
								} else {
									document.title = "Editar recurso"
								}

								//restringir el tamaño máximo del texto en el input de nombre del recurso o departamento
								$('[name="nombre"]').keypress(function(event) {
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