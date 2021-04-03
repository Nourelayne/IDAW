<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            print_r($_POST);
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query =  "UPDATE noter
                           SET quantite = '$_POST[quantite]',
                               date = '$_POST[date]'
                           WHERE login = 'salah.nourelayne@etu.imt-lille-douai.fr' AND id_aliment = (SELECT id_aliment FROM aliment WHERE libelle_aliment = '$_POST[nom]');";
                $dbco -> exec($query); 
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>