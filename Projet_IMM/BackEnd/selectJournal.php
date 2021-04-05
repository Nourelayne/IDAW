<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            session_start();
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $query = $dbco->prepare("SELECT aliment.libelle_aliment AS nom, noter.quantite AS quantite, noter.date AS date, noter.id_aliment AS id FROM utilisateur 
                                                 JOIN noter ON utilisateur.login = noter.login 
                                                 JOIN aliment ON aliment.id_aliment = noter.id_aliment 
                                                 WHERE utilisateur.login = '$_SESSION[login]'");
                $query->execute();
                

                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

            
?>


