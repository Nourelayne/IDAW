<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ajax_crud";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
            die;
        }

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['check']) && isset($_POST['note'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date = $_POST['date'];
            $check = $_POST['check'];
            $note = $_POST['note'];
            $sql = "INSERT INTO utilisateur(nom, prenom, date_de_naissance, adore_cours, remarque) VALUES ('$nom', '$prenom', '$date', '$check', '$note')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . ",". $conn->error;
            }
        }
          
        $conn->close();
?>