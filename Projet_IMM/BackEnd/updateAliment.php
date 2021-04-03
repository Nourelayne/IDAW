<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            print_r($_POST);
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = "UPDATE contenir
                           SET ratio = '$_POST[energie]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 1;" ;
                $dbco -> exec($query1);
                
                $query2 = "UPDATE contenir
                           SET ratio = '$_POST[protéines]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 2;" ;
                $dbco -> exec($query2);
                
                $query3 = "UPDATE contenir
                           SET ratio = '$_POST[glucides]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 3;" ;
                $dbco -> exec($query3);
                
                $query4 = "UPDATE contenir
                           SET ratio = '$_POST[lipides]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 4;" ;
                $dbco -> exec($query4);
                
                $query5 = "UPDATE contenir
                           SET ratio = '$_POST[sucres]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 5;" ;
                $dbco -> exec($query5);
                
                
                $query6 = "UPDATE contenir
                           SET ratio = '$_POST[alcool]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 6;" ;
                $dbco -> exec($query6);


                $query7 = "UPDATE contenir
                           SET ratio = '$_POST[sodium]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 7;" ;
                $dbco -> exec($query7);


                $query8 = "UPDATE contenir
                           SET ratio = '$_POST[eau]'
                           WHERE id_aliment = '$_POST[id]' AND id_apport = 8;" ;
                $dbco -> exec($query8);
                
                
                $query9 = "UPDATE aliment
                           SET libelle_aliment = '$_POST[nom]'
                           WHERE id_aliment = '$_POST[id]';" ;
                $dbco -> exec($query9);

                
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>