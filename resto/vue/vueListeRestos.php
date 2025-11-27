<h1>Liste des restaurants</h1>
<?php
if (!isset($lesRestos) || !is_array($lesRestos)) {
    $lesRestos = []; 
}
foreach($lesRestos as $unResto){
    $laPhoto = getLaPhotoByIdR($unResto->idR);
    $lesTypesCuisine = getLesTypesCuisineByIdR($unResto->idR);

    echo "<div class='card'>
        <div class='photoCard'>
            <img src='photos/$laPhoto->cheminP' alt='photo du restaurant' />
        </div>
        <a href='./?action=detail&idR=$unResto->idR'>$unResto->nomR</a>    
        <div class='tagCard'>
            <ul id='tagFood'>";
            echo "<p>$unResto->voieAdrR<br>";
            echo "$unResto->cpR ";
            echo "$unResto->villeR</p>";
            
    foreach($lesTypesCuisine as $typeCuisine) {
        echo "<li class='tag'><span class='tag'>#{$typeCuisine->libelleTC}</span></li>";
    }

    echo "    </ul>
        </div>
    </div>";
}
?>