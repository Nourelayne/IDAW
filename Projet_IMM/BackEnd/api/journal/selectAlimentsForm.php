<?php
    
    $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";

    try{
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $query = $dbco->prepare("SELECT libelle_aliment AS nom FROM aliment");
        $query->execute();
                

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
            
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>