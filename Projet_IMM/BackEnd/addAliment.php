<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = "INSERT INTO aliment (id_aliment, libelle_aliment) VALUES('$_POST[id]', '$_POST[nom]')";
                $dbco -> exec($query1);
                

                $query2 =
                "INSERT INTO contenir(id_aliment, id_apport, ratio)
                VALUES 
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment = '$_POST[nom]'), 1, '$_POST[energie]'), 
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 2, '$_POST[protéines]'),
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 3, '$_POST[glucides]'), 
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 4, '$_POST[lipides]'), 
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 5, '$_POST[sucres]'), 
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 6, '$_POST[alcool]'), 
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 7, '$_POST[sodium]'),
                ((SELECT id_aliment FROM aliment WHERE libelle_aliment ='$_POST[nom]'), 8, '$_POST[eau]');
                ";
                
                $dbco -> exec($query2);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                

?>