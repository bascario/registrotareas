<?php

function expirar(){
    /*verificar que hubo actividad en el sitio desde hace 10 minutos
    de lo contrario cierra la sesión y redirige al formulario de login
    */
    if (time() - $_SESSION['access'] > 600) {
        session_destroy();
        header("location:../index.php");
        die();  
    }else{
    $_SESSION['access']=time();
}
}

?>

