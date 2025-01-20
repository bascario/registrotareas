<?php
include '../php/conexion.php';

session_start();
if (isset($_SESSION['id']) && ($_SESSION['id'] == 1)) { //verificar que un usuario tiene una sesión activa en la plataforma y que sea el id del administrador
	include '../php/inactividad.php';
	expirar(); //verificar que hubo actividad en los ultimos 10 minutos
	include '../php/counter.php';
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>

		<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Historial de acciones</title>


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
				<h2>Historial de acciones</h2>
				<a id="importar" title="Importar" class="btn btn-primary btn-lg">Descargar historial <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
				<button id="limpiar" title="Limpiar" class="btn btn-danger btn-lg">Limpiar historial <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button>

				<hr />
				<!--
					<input type="text" class="form-control" style="width:100%" id="search" placeholder="Filtrar...">
				-->
				<p>
					<?php
					//procesa los datos y los divide en antiguos y nuevos en columnas
					function tabla($tipo, $texto)
					{
						if ($tipo == 1) {

							$spl = explode(";;", $texto);

							$viejo = "Antiguos:";
							$nuevo = "Nuevos:";

							for ($i = 0; $i < count($spl); $i = $i + 2) {



								$viejo = $viejo . "<br>" . $spl[$i];
								$nuevo = $nuevo . "<br>" . $spl[$i + 1];
							}
							echo '<td>' . $viejo . '</td><td>' . $nuevo . '</td>';
						} else {
							echo '<td>' . $texto . '</td><td></td>';
						}
					}
					//operacion para vaciar tabla historial
					if (($_GET['del']) == 'clean') {
						if (nX($con, "historial") > 0) {
							$con->query("TRUNCATE TABLE historial"); //vaciar tabla						
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Historial eliminado correctamente.</div>';
						}
					}
					?>

				<div class="table-responsive">
					<table id="bitac" class="table table-striped display">
						<thead>


							<tr>
								<th>Usuario</th>
								<th>Acción</th>
								<th colspan="2" style='text-align: center;'>Valores</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$sql = $con->query("SELECT * FROM historial ORDER BY id ASC"); //consultar tabla de historial de acciones de usuarios

							if ($sql->num_rows == 0) {
								echo '<tr><td colspan="5">No hay datos.</td></tr>';
							} else {

								while ($row = $sql->fetch_assoc()) { //colspan="2" 
									echo '


									<tr>

										<td>  ' . $row['usuario'] . '</td>
										<td>' . $row['accion'] . '</td>
										';


									tabla($row['tipo'], $row['valor']);

									echo '<td>' . $row['fecha'] . ' ' . $row['hora'] . '</td></tr>
									';
								}
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php include 'nav.php'; ?>



		<script type="text/javascript">
			$(document).ready(function() {
				elementos(); // cargar funcionalidades del menu lateral
				$(".btn-danger").click(function() {
					//confirmar el eliminar todo el historial
					Swal.fire({
						title: 'Esta seguro?',
						html: "<h4>Esto eliminará todos los datos y no es reversible!</h4>",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Si, eliminar!',
						cancelButtonText: 'No, cancelar!'

					}).then((result) => {
						if (result.isConfirmed) {
							window.location = "historial.php?del=clean";
						}

					});

				});

				//aplicar plugin datatables a la tabla para filtrar, paginar y ordenarla
				$(".table").DataTable({
					"pagingType": "simple_numbers",
					"autoWidth": false,
					"ordering": false

				});
				//funcion para exportar tabla a excel
				function exportTableToExcel(tabla) {


					var htmlExport = tabla.prop('outerHTML');
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf("MSIE ");

					//other browser not tested on IE 11
					// If Internet Explorer
					if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
						$('body').append("<iframe id=\"iframeExport\" style=\"display:none\"></iframe>");
						iframeExport.document.open("txt/html", "replace");
						iframeExport.document.write(htmlExport);
						iframeExport.document.close();
						iframeExport.focus();
						sa = iframeExport.document.execCommand("SaveAs", true, "Historial.xls");
					} else {
						var link = document.createElement('a');

						document.body.appendChild(link); // Firefox requires the link to be in the body
						link.download = "Historial.xls";
						link.href = 'data:application/vnd.ms-excel,' + escape(htmlExport);
						link.click();
						document.body.removeChild(link);
					}
				}

				$("#importar").click(function() {
					//exportar tabla html a excel
					exportTableToExcel($('#bitac'));

				});

				$("#search").keyup(function() {
					_this = this;

					$.each($("#bitac tbody tr:not(:first)"), function() {
						if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
							$(this).hide();
						} else {
							$(this).show();
						}
					});
				});

			});
		</script>
	</body>

	</html>
<?php
} else {
	//si no hay una sesión activa en la plataforma,redirige al formulario de login
	header("location:../index.php");
}
?>