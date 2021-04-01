<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query1 = "DELETE FROM contenir WHERE id_aliment = ".$_POST['id'];
                $dbco -> exec($query1);

                $query2 = "DELETE FROM aliment WHERE id_aliment = ".$_POST['id'];
                $dbco -> exec($query2);
            }
            
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                
?>