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
    $sql1 = "SELECT * FROM auth;";
    $auth = $conn->query($sql1);
    
    if (isset($_POST['login']) && isset($_POST['password'])) {
            $tryLogin=$_POST['login'];
            $tryPwd=$_POST['password'];
            while($authrows = $auth->fetch_assoc()) {
                if($tryLogin == $authrows["login"] && $tryPwd == $authrows["password"]){
                    $sql2 =  "SELECT nom FROM utilisateur WHERE login = '".$tryLogin."';";
                    $name = $conn->query($sql2);
                    while($namerows = $name->fetch_assoc()) {
                        session_start();
                        $successfullyLogged = true;
                        $_SESSION['login'] = $namerows['nom'];
                    }
                }
            }
    }

    if($successfullyLogged == false) {
        echo "Login ou Mot de passe Incorrect";
    }else{
        echo "<h1>Bienvenu ".$_SESSION['login']."</h1>";
        echo "<a href=\"signOut.php\">Se déconnecter</a>";
    } 

    $conn->close();
?>