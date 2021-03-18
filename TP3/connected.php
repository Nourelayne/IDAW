<?php
    $successfullyLogged = false;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tp_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM user;";
    $result = $conn->query($sql);
    
    if (isset($_POST['login']) && isset($_POST['password'])) {
            $tryLogin=$_POST['login'];
            $tryPwd=$_POST['password'];
            while($row = $result->fetch_assoc()) {
                if($tryLogin == $row["login"] && $tryPwd == $row["password"]){
                    session_start();
                    $successfullyLogged = true;
                    $_SESSION['login'] = $row["pseudo"];
                }
            }
    }

    if($successfullyLogged == false) {
        echo "Login ou Mot de passe Incorrect";
    }else{
        echo "<h1>Bienvenu ".$_SESSION['login']."</h1>";
        echo "<a href=\"logout.php\">Se déconnecter</a>";
    } 
?>