<?php
include '../php/conexion.php';

session_start();
if (isset($_SESSION['id'])) { //verificar que un usuario tiene una sesión activa en la plataforma
	include '../php/inactividad.php';
	expirar(); //verificar que hubo actividad en los ultimos 10 minutos
	include '../php/counter.php';

?>
	<!DOCTYPE html>
	<html lang="es">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>.:Seguimiento a tareas.:</title>
		<link rel="icon" type="image/png" href="../../img/icons/user_icon.png" />
		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link href="../css/style_nav.css" rel="stylesheet">
		<link href="../css/style_ini.css" rel="stylesheet">
	</head>

	<body>
		<div class="loader"></div>
		<div class="web-page">
			<div class="container2">
				<div class="row">
					<div class="col-md-4 col-xl-3">
						<div class="card bg-c-red order-card">
							<div class="card-block">
								<div class="card-header text-center">
									Asignaturas
								</div>
								<h2 class="text-center"><?php echo nX($con, "asignaturas") //mostrar cantidad de departamentos  
														?></h2>
								<div class="card-footer text-muted text-center">
									<a href="asignaturas.php" class="btn btn-primary ">Ver Asignaturas</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xl-3">
						<div class="card bg-c-yellow order-card">
							<div class="card-block">
								<div class="card-header text-center">
									Recursos
								</div>
								<h2 class="text-center"><?php echo nX($con, "recursos") //mostrar cantidad de recursos  
														?></h2>
								<div class="card-footer text-muted text-center">
									<a href="recursos.php" class="btn btn-primary ">Ver Recursos</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xl-3">
						<div class="card bg-c-green">
							<div class="card-block">
								<div class="card-header text-center">
									Capas a mostrar
								</div>
								<h2 class="text-center"><?php echo nX($con, "capas") //mostrar cantidad de capas  
														?></h2>
								<div class="card-footer text-muted text-center">
									<a href="capas.php" class="btn btn-primary ">Ver Capas</a>
								</div>
							</div>
						</div>
					</div>
					<?php

					//mostrar tarjeta de usuarios si el id corresponde al del administrador
					if ($_SESSION['id'] == 1) {

					?>
						<div class="col-md-4 col-xl-3">
							<div class="card bg-c-blue">
								<div class="card-block">
									<div class="card-header text-center">
										Usuarios
									</div>
									<h2 class="text-center"><?php echo nX($con, "usuarios") //mostrar cantidad de usuarios 
															?></h2>
									<div class="card-footer text-muted text-center">
										<a href="usuarios.php" class="btn btn-primary ">Ver Usuarios</a>
									</div>
								</div>
							</div>
						</div>
					<?php }  ?>
				</div>

			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				elementos(); // cargar funcionalidades del menu lateral
			});
		</script>
	</body>
	<?php
	include 'nav.php';
	?>

<?php

} else {
	//si no hay una sesión activa en la plataforma,redirige al formulario de login
	header("location:../index.php");
}
?>

	</html>