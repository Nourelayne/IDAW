<?php
    // on simule une base de données
    $users = array(
        'nour@gmail.com' => 'coco',
    );

    $names = array(
        'nour@gmail.com' => 'Nourelayne'
    );

    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $names[$tryLogin];
        } else
           $errorText = "Erreur de login/password";
    } else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
       echo $errorText;
    } else {
       echo "<h1>Bienvenu ".$login."</h1>";
    } 
?>