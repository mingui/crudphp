<?php
    @session_start();
    session_destroy();
    @session_start();
    $_SESSION['mensaje'] = '<p class="alert alert-info">Session terminada</p>';
    header('Location: login.php');


 ?>
