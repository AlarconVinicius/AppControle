<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_usuario'])) {
    header("Location: ../public/index.php?erro=3");
}


?>