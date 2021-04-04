<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            try{
                session_start();
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $infosUtilisateur = $dbco->prepare("SELECT * FROM utilisateur 
                           WHERE login = '$_SESSION[login]';");
                $infosUtilisateur->execute();

                $resultatInfosUtilisateur = $infosUtilisateur->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultatInfosUtilisateur);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>