<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "DELETE FROM noter WHERE id_aliment = ".$_POST['id']." AND login = 'salah.nourelayne@etu.imt-lille-douai.fr';";
                $dbco -> exec($query);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>