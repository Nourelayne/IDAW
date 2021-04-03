<?php
    
    $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";

    try{
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = $dbco->prepare("INSERT INTO noter(login, id_aliment, quantite, date) 
                                 VALUES 
                                 ('salah.nourelayne@etu.imt-lille-douai.fr', (SELECT id_aliment FROM aliment WHERE libelle_aliment = '$_POST[nom]'), '$_POST[quantite]', '$_POST[date]');
                              ");
        $query->execute();
                

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
            
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>