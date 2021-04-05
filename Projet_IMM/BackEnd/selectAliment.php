<?php
            $servname = "localhost"; $dbname = "imm"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $query = $dbco->prepare("SELECT libelle_aliment AS nom, En.Ratio AS energie, Pro.ratio AS protéines, Glu.Ratio As glucides, Lip.Ratio As lipides, Suc.Ratio As sucres, Alc.Ratio As alcool, Sod.Ratio As sodium, Eau.Ratio As eau FROM `aliment` 
                LEFT JOIN contenir AS En ON aliment.id_aliment = En.id_aliment AND En.id_apport=1 
                LEFT JOIN contenir AS Pro ON aliment.id_aliment = Pro.id_aliment AND Pro.id_apport=2
                LEFT JOIN contenir AS Glu ON aliment.id_aliment = Glu.id_aliment AND Glu.id_apport=3
                LEFT JOIN contenir AS Lip ON aliment.id_aliment = Lip.id_aliment AND Lip.id_apport=4
                LEFT JOIN contenir AS Suc ON aliment.id_aliment = Suc.id_aliment AND Suc.id_apport=5
                LEFT JOIN contenir AS Alc ON aliment.id_aliment = Alc.id_aliment AND Alc.id_apport=6
                LEFT JOIN contenir AS Sod ON aliment.id_aliment = Sod.id_aliment AND Sod.id_apport=7
                LEFT JOIN contenir AS Eau ON aliment.id_aliment = Eau.id_aliment AND Eau.id_apport=8;");
                $query->execute();
                

                $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultat);
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

            
?>