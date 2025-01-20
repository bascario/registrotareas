<?php
include '../php/conexion.php';
session_start();
if (isset($_SESSION['id'])) {//verificar que un usuario tiene una sesión activa en la plataforma

	include '../php/inactividad.php';
	expirar(); //verificar que hubo actividad en los ultimos 10 minutos
	
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>.:Datos de la Asignatura:.</title>

		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link href="../css/style_nav.css" rel="stylesheet">
		<link href="../css/style_ini.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="../../img/icons/PERS_icon.png" />
	</head>

	<body>
	<div class="loader"></div>
		<div class="web-page">
			<div class="content">
				<h2>Lista de Asignaturas</h2>
				<a href="dr-add.php?lista=1" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar una Asignatura </a>
				<hr />
				<?php
				if (isset($_GET['del']) &&($_GET['del']) == 'y') {
					$nik = $con->real_escape_string($_GET["nik"]); //guardar valor del id recibido
					$sql1 = $con->prepare( "SELECT * FROM asignaturas WHERE id=?"); //consultar la existencia de un departamento con el id recibido
					$sql1->bind_param('i', $nik);
					$sql1->execute();
					$result = $sql1->get_result();

					if ($result->num_rows == 0) {
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se encontraron datos.</div>';
					} else {
						try {
							mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// para activar reportar error en secuencias simples (query)
							$con->autocommit(FALSE); //preparar una transaccion
							$row = $result->fetch_assoc();						
							$delete = $con->prepare( "DELETE FROM asignaturas WHERE id=?"); //eliminar el departamento con el id recibido
							$delete->bind_param('i', $nik);
							$delete->execute();

							//guardar los valores eliminados para el historial
							$nombre = $row['nombre'];
							$fecha = date("Y-m-d");
							date_default_timezone_set("America/Bogota");
							$hora = date('h:i A');
							$nom = $_SESSION['name'];
							//agregar acción de eliminar departamento al historial de acciones de usuarios
							$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`) VALUES ('$nom','Eliminó una asignatura:','$nombre','$fecha','$hora')");
							$con->commit();
							$sql1->close();
							$delete->close();							
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminados correctamente.</div>';
						} catch (Exception $e) {
							$con->rollback();
							//mensaje de error
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';

						}
						
						
					}
				}
				?>



				<div class="table-responsive">
					<table class="table table-striped">

						<thead>
							<tr>
								<th>Código</th>
								<th>Acciones</th>

							</tr>
						</thead>
						<?php
						$sql2 = $con->query( "SELECT * FROM asignaturas ORDER BY id ASC"); //consultar la tabla de capas
						if ($sql2->num_rows == 0) {
							echo '<tr><td colspan="8">No hay datos.</td></tr>';
						} else {
							//agregar información a la tabla
							while ($row = $sql2->fetch_assoc()) {
								echo '
						<tr>
							
							
							<td>' . $row['nombre'] . '</td>
                          
							
							<td>

								<a href="dr-edit.php?lista=1&nik=' . $row['id'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<button value="' . $row['id'] . ';;' . $row['nombre'] . '" title="Eliminar" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
							</td>
						</tr>
						';
							}
						}
						$sql2->close();
						?>
					</table>
				</div>
			</div>
		</div>
		<?php include 'nav.php'; ?>


		<script type="text/javascript">
			
			$(document).ready(function() {
				elementos(); // cargar funcionalidades del menu lateral

				$(".btn-danger").click(function() {
					let texto = $(this).val().split(";;");
					//confirmar el eliminar un departamento
					Swal.fire({
						title: 'Esta seguro?',
						html: "<h4>Esto eliminará la asignatura '" + texto[1] + "' y no es reversible!</h4>",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Si, eliminar!',
						cancelButtonText: 'No, cancelar!'

					}).then((result) => {
						if (result.isConfirmed) {
							//mensaje de éxito
							window.location = "asignaturas.php?del=y&nik=" + texto[0];

						}

					})
				});


				$(".table").DataTable({
					"pagingType": "simple_numbers",
					"autoWidth": false,
					"ordering": false

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
	