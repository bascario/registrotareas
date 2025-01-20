<?php
$user = $_SESSION['id'];
$sql = $con->prepare("SELECT `id`,`nombres`,`apellidos`,`usuario`,`fecha` FROM usuarios WHERE `id`=?"); //consultar información del usuario que inició sesión
$sql->bind_param('i', $user); //agregar variables a la sentencia preparada
$sql->execute();
$result = $sql->get_result();

$row = $result->fetch_assoc();

/** navegador del modulo de administración, presente en todas las paginas de la plataforma */
?>

<div class="main-header">
  <div class="nav navbar-left">



    Vida<b> Nueva
    </b>
  </div>
  <div class="navbar-collapse collapse">


    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown user user-menu pull-right">
        <!-- Menu de perfil de usuario -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

          <img src="../img/icons/user_icon.png" class="user-image" alt="User Image">
          <b>
            MI PERFIL

          </b>
        </a>
        <ul class="dropdown-menu">
          <!-- Mostrar información de cuenta, como nombres y apellidos, usuario y fecha de creación -->
          <li class="user-header">

            <p>
              <?php

              echo $row['nombres'] . ' ' . $row['apellidos'];
              ?> </p>

            <p>
              <?php

              echo 'Usuario: ' . $row['usuario'];
              ?>
            </p>
            <p>
              <?php

              echo 'Registrado: ' . $row['fecha'];
              ?>

            </p>

          </li>

          <li class="user-footer">
            <div class="pull-right">
              <a href="usu-adedit.php?nik=<?php echo $row['id']; ?>" class="btn btn-default btn-flat"> <i class="fa fa-user"></i> Editar perfil</a>
            </div>

          </li>
        </ul>
      </li>

    </ul>
  </div>

</div>

<div class="menu-hide">
  <button id="hide-menu">
    <img src=".\img\icons\menu_ico.png" alt="menu lateral" class="m_icon" alt="Hide menu button">
  </button>

</div>
<div class="navbar nav-header">
  <a href="inicio.php"><img class="avatar" src="../../img/PERS_ori_icon.png" alt="pers icon"></a>
  <div class="navbar navbar-inverse">
    <!-- Barra lateral izquierda -->
    <ul class="nav navbar-nav">
      <li><a href="inicio.php">Inicio</a></li>

      <li><a href="asignaturas.php">Lista de Asignaturas</a></li>


      <li><a href="recursos.php">Lista de recursos</a></li>

      <li><a href="capas.php">Lista de tareas</a></li>

      <?php

      if ($_SESSION['id'] == 1) {

      ?>
        <li><a href="usuarios.php">Lista de usuarios</a></li>

        <li><a href="historial.php">Ver historial</a></li>

      <?php }
      $sql->close();
      $con->close();
      ?>

      <li><a href="../php/salir.php">Salir</a></li>

    </ul>

  </div>
</div>

<footer class="footer">
  <strong>Copyright © 2024
    <a href="http://desarrollodesoftware.com">QuantumPC</a>.
    Todos los derechos reservados.
  </strong>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
  $(window).on('load', function() {
    //desvanecer icono de carga al cargar la página
    $(".loader").fadeOut("slow");
  });

  //funcion para agregar las funcionalidades al menu lateral
  function elementos() {
    /*Funcion para ajustar elementos a la pantalla con zoom alto */
    function ajustar() {
      $('.nav-header').hide();
      $('.content').css("margin-left", "20px");
      $('.footer').css("left", "0px");
      $('.row').css("padding-left", "20px");
      $('.menu-hide').css("left", "20px");
    }
    /*Funcion para ajustar elementos a la pantalla con zoom normal */
    function original() {
      $('.nav-header').show();
      $('.content').css("margin-left", "220px");
      $('.footer').css("left", "190px");
      $('.row').css("padding-left", "200px");
      $('.menu-hide').css("left", "138px");
    }

    /*Si el zoom es alto, ajustar elementos a la pantalla */
    if ($(window).width() < 1000) {
      ajustar();
    }
    /*Si la pantalla cambia de zoom, ajustar elementos a la pantalla segun su configuracion */
    $(window).resize(function() {
      if ($(this).width() < 1000) {
        ajustar();
      } else {
        original();
      }

    });


    /*Mostrar u ocultar el menu lateral, y ajustar elementos a la pantalla*/
    $('#hide-menu').on('click', function() {
      $('.nav-header').toggle();
      if ($('.nav-header').is(":hidden")) {
        ajustar();
      } else {
        original();
      }


    });
  }
</script>