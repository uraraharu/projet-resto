<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">
<?php
   switch ($critere){
      case "nom":
         echo "Recherche par nom :";
         echo"<br>";
         echo "<input type='text' name='nomR' / placeholder='Nom'>";
         break;
      case "adresse":
         echo "Recherche par adresse :";
         echo"<br>";
         echo "<input type='text' name='voieAdrR' / placeholder='Rue'>";
         echo"<br>";
         echo "<input type='text' name='cpR' / placeholder='Code Postal'>";
         echo"<br>";
         echo "<input type='text' name='villeR' / placeholder='Ville'>";
         break;
      case "type":
         echo "Recherche par type de cuisine :";
         echo"<br>";
         echo"<br>";

            $lesTypesCuisine = getLesTypesCuisine();
         foreach($lesTypesCuisine as $typeCuisine) {
            echo "<label>";
            echo "<input type='checkbox' name='tabIdTC[]' value='{$typeCuisine->idTC}'> {$typeCuisine->libelleTC}";
            echo "</label><br>";
         }
         break;
   }
?>
    <br>
   <input type="submit" value="Rechercher" />
   <br>

</form>