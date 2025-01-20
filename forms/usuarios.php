<?php
include '../php/conexion.php';

session_start();
if (isset($_SESSION['id']) && $_SESSION['id'] == 1) { //verificar que un usuario tiene una sesión activa en la plataforma y que sea el id del administrador

include '../php/inactividad.php';
expirar(); //verificar que hubo actividad en los ultimos 10 minutos
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de Usuarios</title>

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
				<h2>Lista de usuarios</h2>
				<a  href="usu-adedit.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar un usuario</a>

				<hr />
				<?php
				if (isset($_GET['del']) && $_GET['del'] == 'y') {

					$nik = $con->real_escape_string( $_GET["nik"]);//guardar valor del id recibido
					$sql1 = $con->prepare("SELECT * FROM usuarios WHERE id=?"); //consultar la existencia de un usuario con el id recibido
					$sql1->bind_param('i', $nik);
					$sql1->execute();
					$result = $sql1->get_result();
					if ($result->num_rows == 0) {
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
					} else {

						try {
							mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // para activar reportar error en secuencias simples (query)
							$con->autocommit(FALSE); //preparar una transaccion
							$row = $result->fetch_assoc();
							$delete = $con->prepare("DELETE FROM usuarios WHERE id=?"); //eliminar el usuario con el id recibido
							$delete->bind_param('i', $nik);
							$delete->execute();	
							//guardar los valores eliminados para el historial							
							$fecha = date("Y-m-d");
							date_default_timezone_set("America/Bogota"); //ajustar horario de reloj a Colombia
							$hora = date('h:i A');
							$user=$row['usuario'];
							//agregar acción de eliminar capa al historial de acciones de usuarios
							$con->query("INSERT INTO `historial`(`usuario`, `accion`, `valor`, `fecha`, `hora`) VALUES ('admin','Eliminó un usuario','$user','$fecha','$hora')");
							$con->commit();
							$sql1->close();
							$delete->close();
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminados correctamente.</div>';
						} catch (Exception $e) {
							$con->rollback();
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
						}						
					}
				}
				?>

				<div class="table-responsive">
					<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Usuario</th>
							<th>Fecha de creacion</th>
							<th style="text-align: center;">Acciones</th>

						</tr>
			</thead>
						<?php
						$sql2 = $con->query("SELECT * FROM `usuarios` WHERE `usuario`!='admin' ORDER BY `id` ASC"); //consultar la tabla de usuarios, excepto el usuario administrador
						if ($sql2->num_rows == 0) {
							echo '<tr><td colspan="5">No hay datos.</td></tr>';
						} else {
							//agregar información a la tabla
							while ($row = $sql2->fetch_assoc()) {
								echo '
						<tr>
							
							<td>' . $row['nombres'] . '</td>
							<td>' . $row['apellidos'] . '</td>
							<td>' . $row['usuario'] . '</td>
							<td>' . $row['fecha'] . '</td>

							<td style="text-align: center;">

							<button value="' . $row['id'] . ';;' . $row['usuario'] . '" title="Eliminar" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
				$(".btn-danger").click(function() {
					let texto = $(this).val().split(";;");
					//confirmar el eliminar un usuario
					Swal.fire({
						title: 'Esta seguro?',
						html: "<h4>Esto eliminará la cuenta de usuario de '" + texto[1] + "' y no es reversible!</h4>",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Si, eliminar!',
						cancelButtonText: 'No, cancelar!'

					}).then((result) => {
						if (result.isConfirmed) {
							//mensaje de éxito
							window.location = "usuarios.php?del=y&nik=" + texto[0];

						}

					})
				});
				//aplicar plugin datatables a la tabla para filtrar, paginar y ordenarla
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
	header("location:../index.php");
	}
 ?>

</html>