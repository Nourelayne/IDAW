<html>
<head>
<title> Exemple Dynamique </title>
</head>
<body>
     <?php
        // Date Display
        echo "La date d'aujourd'hui est le :".date('l jS \of F Y h:i:s A');

        echo "<br>";
        
        //Intorduction to functions
        function afficher( $texte, $saut = 1 ){
            echo $texte;
            for( $i = 0 ; $i < $saut ; $i++)
            echo "<br>";
        }
         afficher("Hello", 0);
         afficher(" World !");

         echo "<br>";
         
         //Tables
         $tab = array(17,-3);
         // affiche récursivement le tableau
         echo "tab : "; print_r($tab);
         echo "<br>";
         // supression de la clef 0
         unset($tab[0]);
         echo "tab : "; print_r($tab);
         echo "<br>";
         // copie d'un tableau
         $tab2 = array_values($tab);
         echo "tab2 : "; print_r($tab2);
         echo "<br>";
         // découpe une chaîne en tableau
         $tab = explode("/", "12/06/2007");
         print_r($tab);
         echo "<br>";
         // nombre d’éléments dans le tableau
         echo "nb elt = ".count($tab)."\n";
         echo "<br>";
         //Parcours d'un tableau
            //Boucle For
         $tab = array(1,2,3,4,5,6);

         echo "valeurs dans tab : ";
         for( $i = 0 ; $i<count($tab) ; $i++){
             echo $tab[$i]."\n";
         }

         echo "<br>";
            //Boucle While
         $i = 0;
         echo "3 premieres valeurs dans tab : ";
         while( $i<count($tab) and ($i<3) ){
            echo $tab[$i]."\n";
            $i++;
         }

         echo "<br>";

            //Boucle ForEach 

         $tab = array(5,2,5,7,4,6);
         foreach($tab as $value){
             echo $value."\n";
         }
         foreach($tab as $key => $value){
             echo $key." : ".$value."\n";
         }

         echo "<br>";
 
            // les fonctions max et min existent
         echo "nb min = ".min($tab)."\n";
         echo "nb max = ".max($tab)."\n";

         echo "<br>";

         $personne = array(
            'prenom' => 'John',
            'nom' => 'Doe',
            'age' => 20
         );
            // Affichages équivalents :
         echo "M. ".$personne['prenom']."\n";
         echo "M. {$personne['nom']}\n";

         echo "<br>";

         $t = array(5 => 43, 32, 56, "b" => 12);
         $u = array(5 => 43, 6 => 32, 7 => 56, "b" => 12);
         // $t et $u sont identiques
         // Affichage d’un élément
         echo $u["b"];

         echo "<br>";

         $matrice = array(
            array( 1, 18, 6 ),
            array( -1, 1, 8 ),
            array( 13, 18, 3 )
         );
         echo $matrice[1][2];
         
         echo "<br>";
         
         //Affiche 8
         $personnes = array(
         array( 'prenom' => 'John',
            'nom' => 'Doe', 'age' => 20 ),
            array( 'prenom' => 'Luke',
            'nom' => 'Skywalker', 'age' => 17 ),
         );
         echo $personnes[0]['prenom'];//Affiche John
         
     ?>
</body>
</html>