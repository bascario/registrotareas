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
		<title>Editar capa</title>
		<link rel="icon" type="image/png" href="../../img/icons/PERS_icon.png" />

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style_nav.css" rel="stylesheet">
		<link href="../css/style_ini.css" rel="stylesheet">

	</head>

	<body>
		<div class="loader"></div>

		<div class="web-page">
			<div class="content">
				<?php

				$nik = $con->real_escape_string($_GET["nik"]); //guardar valor del id recibido
				?>

				<h2>Capas a mostrar &raquo; Editar capas</h2>
				<hr />

				<?php

				$sql1 = $con->prepare("SELECT * FROM capas WHERE id=?"); //consultar la existencia de una capa con el id recibido
				$sql1->bind_param('i', $nik);
				$sql1->execute();
				$result = $sql1->get_result();
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
					try {
						//antiguos valores de la capa
						$old_ubi = $row['ubicacion'];
						$old_titulo = $row['titulo'];
						$old_ttl = $row['ttl_lynd'];
						$old_archivo = $row['url_archivo'];
						$old_dep = $row['dep'];
						$old_rec = $row['rec'];

						//nuevos valores de la capa recibidos
						$ubicacion = $con->real_escape_string($_POST["ubicacion"]); //Escapar caracteres especiales
						$titulo = $con->real_escape_string($_POST["titulo"]);  //Escapar caracteres especiales
						$ttl = $con->real_escape_string($_POST["ttl"]);  //Escapar caracteres especiales
						$archivo = $con->real_escape_string($_POST["archivo"]);  //Escapar caracteres especiales
						$dep = $_POST["sdep"];
						$rec = $_POST["srec"];
						//actualizar capa según su id
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // para activar reportar error en secuencias simples (query)
						$con->autocommit(FALSE); //iniciar transaccion a la base de datos
						$update = $con->prepare("UPDATE `capas` SET `ubicacion`=?,`titulo`=?,`ttl_lynd`=?,`url_archivo`=?,`dep`=?,`rec`=?  WHERE `id`=?");
						$update->bind_param('ssssiii', $ubicacion, $titulo, $ttl, $archivo, $dep, $rec, $nik); //agregar variables a la sentencia preparada
						$update->execute();
						$fecha = date("Y-m-d");
						date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
						$hora = date('h:i A');
						$nom = $_SESSION['name'];
						$n = ""; //variable para almacenar los cambios respecto a la información anterior

						/* los cambios son anidados con ";;", para luego organizarlos en columnas
						diferentes con los antiguos valores a la izquierda y los nuevos a la derecha
						 */
						$n = cambios($old_ubi, $ubicacion, $n);
						$n = cambios($old_titulo, $titulo, $n);
						$n = cambios($old_ttl, $ttl, $n);
						$n = cambios($old_archivo, $archivo, $n);

						/** comparar los cambios de los valores */
						$recu = getNrec($con, $old_rec); //recurso nuevo
						$depa = getNdep($con, $old_dep); //departamento nuevo

						$n = cambios($depa, getNdep($con, $dep), $n); //comparar recurso nuevo
						$n = cambios($recu, getNrec($con, $rec), $n); //comparar departamento nuevo

						//agregar acción de actualizar capa al historial de acciones de usuarios
						$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`,`tipo`) VALUES ('$nom','Modificó una capa del recurso $recu del departamento $depa','$n','$fecha','$hora',1)");
						$update->close();
						$con->commit();
						//recargar información para enviar mensaje de éxito
						header("Location: capas-edit.php?nik=" . $nik . "&ops=succ");
					} catch (Exception $e) { //si hay error, revierte la transaccion
						$con->rollback();
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
					}
				}
				if (isset($_GET['ops']) && ($_GET['ops']) == 'succ') {
					//mostrar mensaje de éxito
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
				}

				?>
				<form class="form-horizontal text-left" action="" method="post" onsubmit="return checkSubmit();">




					<div class="form-group">
						<label class="col-sm-3 control-label">Ubicacion</label>
						<div class="col-sm-4">
							<input type="text" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" class="form-control" placeholder="Ubicacion" title="Debe ingresar la localizacion de la capa en Geoserver del espacio PERS" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Titulo de la capa</label>
						<div class="col-sm-4">
							<input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" class="form-control" placeholder="Titulo de la capa" title="Debe ingresar un titulo de la capa a mostrar" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Titulo de la leyenda</label>
						<div class="col-sm-4">
							<input type="text" name="ttl" value="<?php echo $row['ttl_lynd']; ?>" class="form-control" placeholder="Titulo de la leyenda" title="Debe ingresar un titulo para la leyenda" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Archivo asociado</label>
						<div class="col-sm-4">
							<input type="text" name="archivo" value="<?php echo $row['url_archivo']; ?>" class="form-control" placeholder="Archivo">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Departamento</label>
						<div class="col-sm-4">
							<select class="selectpicker" name="sdep">
								<!--agregar los nombres de todos los departamentos a selector-->
								<?php getNdeps($con, $row['dep']); ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Recurso</label>
						<div class="col-sm-4">
							<select class="selectpicker" name="srec">
								<!--agregar los nombres de todos los recursos a selector-->
								<?php getNrecs($con, $row['rec']); ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">&nbsp;</label>
						<div class="col-sm-6">
							<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
							<a href="capas.php" class="btn btn-sm btn-danger">Cancelar</a>
						</div>
					</div>




				</form>
			</div>
		</div>
		<?php
		$sql1->close();
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
				//restringir el tamaño máximo del texto en el input de ubicación
				$('[name="ubicacion"]').keypress(function(event) {
					if (this.value.length >= 200) {
						return false;
					}
				});
				//restringir el tamaño máximo del texto en el input de celda
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
	//si no hay una sesión activa en la plataforma,redirige el formulario de login
	header("location:../index.php");
}
?>

	</html>