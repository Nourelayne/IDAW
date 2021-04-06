<?php
    $successfullyLogged = false;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "imm";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM auth;";
    $result = $conn->query($query);
    
    if (isset($_POST['login']) && isset($_POST['password'])) {
            $tryLogin=$_POST['login'];
            $tryPwd=$_POST['password'];
            while($row = $result->fetch_assoc()) {
                if($tryLogin == $row["login"] && $tryPwd == $row["password"]){
                    session_start();
                    $successfullyLogged = true;
                    $_SESSION['login'] = $row["login"];
                }
            }
    }

    if($successfullyLogged == false) {
        echo "Login ou Mot de passe Incorrect";
    }else{
        header("Location: http://localhost/IDAW/Projet_IMM/FrontEnd/index.php?page=profil");
        exit();
    } 

    $conn->close();
?>