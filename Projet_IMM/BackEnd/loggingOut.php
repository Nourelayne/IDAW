<?php
    session_start();
    unset($_SESSION['login']);
    header("Location:http://localhost/IDAW/Projet_IMM/FrontEnd/login.php");
?>