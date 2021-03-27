<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ajax_crud";

    //Connect to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check the connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Select query
    $sql = "SELECT * FROM utilisateur;";
    $result = $conn->query($sql);
    $users = [];

    if ($result->num_rows > 0) {
        //Print Data in a table
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode($users);
    } else {
        echo "0 results";
    }
    $conn->close();
?>
