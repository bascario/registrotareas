<?php
session_start();
if (isset($_SESSION['id'])) { //verificar que un usuario tiene una sesión activa en la plataforma
	header("location:forms/inicio.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Instituto Vida Nueva</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="../img/icons/user_icon.png" />
</head>

<body>
	<br><br><br>
	<div class="container">
		<div class="panel panel-primary">
			<div id="titulo" class="panel panel-heading">Instituto Vida Nueva
			</div>
			<div class="panel panel-body">
				<div id="imagen" style="text-align: center;">
					<img src="../img/vn.png">
				</div>
				<p id="mensaje"></p>
				<label id="tusu">Usuario</label>
				<input type="text" id="usuario" class="form-control input-sm" required pattern=".{,20}" title="El usuario debe tener máximo 20 caracteres">
				<div id="pp">
					<label id="contra">Contraseña</label>
					<input type="password" id="contraseña" class="form-control input-sm" required pattern=".{,15}" title="La contraseña debe tener máximo 15 caracteres">
				</div>

				<p></p>
				<div id="botones">
					<span class="btn btn-primary" id="entrarSistema">Entrar</span>
					<span class="btn btn-danger" id="olvidar">¿Olvió su contraseña?</span>
					<span class="btn btn-primary" id="restaurar">Restaurar contraseña</span>
					<span class="btn btn-danger" id="volver">Volver</span>
				</div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		
		//mostrar y ocultar elementos para iniciar sesión en la plataforma
		function inicio() {

			$("#tusu").text("Usuario");
			$("#restaurar").hide();
			$("#volver").hide();
			$("#entrarSistema").show();
			$("#olvidar").show();
			$('#contra').show();
			$('#contraseña').show();
			$("#titulo").text("Instituto Vida Nueva");
		}
		//mostrar y ocultar elementos para restablecer contraseña de un usuario
		function restablecer() {

			$("#entrarSistema").hide();
			$("#olvidar").hide();
			$('#contra').hide();
			$('#contraseña').hide();
			$("#tusu").text("Ingresar el usuario");
			$("#titulo").text("Restaurar contraseña de usuario");

			$('#restaurar').show();
			$('#volver').show();

		}


		$(document).on("click", "#olvidar", function() {

			restablecer();
		});
		$(document).on("click", "#volver", function() {
			inicio();

		});

		
		$('[id="usuario"]').keypress(function(event) {

			//restringir el tamaño máximo del texto en el input de usuario
			if (this.value.length >= 20) {
				return false;
			}
//activar funcion de entrar si se presiona enter y el input de contraseña es visible
			if (event.charCode == 13 && ($("#contraseña").is(":visible"))) {
				aentrar();
//activar funcion de restaurar si se presiona enter y el input de contraseña esta oculto
			}else if (event.charCode == 13 && ($("#contraseña").is(":hidden"))){
				restaurar();
			} 


		});

		$('[id="contraseña"]').keypress(function(event) {
			//restringir el tamaño máximo del texto en el input de contraseña
			if (this.value.length >= 15 ) {
				return false;
			}
			//activar funcion de entrar si se presiona enter
			if (event.charCode == 13) {
				aentrar();

			}
		});


		function restaurar() {

			var usu = $('#usuario').val();
			//mostrar mensaje de error si se intenta restaurar la contraseña del administrador
			if (usu == "admin") {
				Swal.fire({
					icon: 'error',
					title: 'No puede restaurar la contraseña del administrador',
					showConfirmButton: false,
					timer: 1500
				})
				return false;

			}
			//confirmar el restaurar la contraseña de un usuario
			Swal.fire({
				title: 'Esta seguro?',
				html: "<h4>Esto reiniciará la contraseña del usuario '" + usu + "' y no es reversible!</h4>",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, restaurar!',
				cancelButtonText: 'No, cancelar!'

			}).then((result) => {
				if (result.isConfirmed) {
					//enviar usuario a restaurar mediante ajax
					var cadena = "usuario=" + $('#usuario').val();

					$.ajax({
						type: "POST",
						url: "php/login.php",
						data: cadena,
						success: function(r) {

							if (r == 0) {
								//Mostrar mensaje de éxito de la restauración	

								Swal.fire({
									icon: 'success',
									title: 'Contraseña del usuario ' + usu + ' restaurada con éxito',
									showConfirmButton: false,
									timer: 1700
								});
								
							} else {
								//Mostrar mensaje de error de la restauración
								Swal.fire({
									icon: 'error',
									title: 'ERROR',
									showConfirmButton: false,
									title: 'Ha ocurrido un error con el proceso, verifique el usuario ingresado',
									
									timer: 2000
								})
							}
						}
					});

				}
			})



		}

		//realizar login a la plataforma
		function aentrar() {
			//validar que se ingresó un usuario
			if ($('#usuario').val() == "") {
				Swal.fire({
					icon: 'error',
					title: 'Debe ingresar el usuario',

				});
				return false;
			} else if ($('#contraseña').val() == "") {
				//validar que se ingresó una contraseña
				Swal.fire({
					icon: 'error',
					title: 'Debe ingresar un contraseña',

				});
				return false;
			}
			//usuario y contraseña a enviar mediante ajax
			cadena = "usuario=" + $('#usuario').val().toLowerCase() +
				"&contraseña=" + $('#contraseña').val();

			$.ajax({
				type: "POST",
				url: "php/login.php",
				data: cadena,
				success: function(r) {					
					//verificar la existenca del usuario indicado
					if (r == 0) {
						window.location = "forms/inicio.php";
					} else {
						//Mostrar mensaje de error al iniciar sesión
						Swal.fire({
							icon: 'error',
							title: 'Ha ocurrido un error con el proceso, verifique el usuario ingresado',

						})

					}
				}
			});
		}

		$(document).on("click", "#restaurar", function() {
			restaurar();
		});

		$(document).on("click", "#entrarSistema", function() {
			aentrar();
		});


	});
</script>
