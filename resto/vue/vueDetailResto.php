<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/detailResto.css");
        </style>
    </head>
    <body>

<h1>
    <?php
    echo "<div class='catNomResto'>";
    echo "$leResto->nomR";
    echo "</div>";
    

    // bouton aimer/naimer pas
    $aime = $utilisateurAimeLeResto ? "aime.png" : "aimepas.png";
    echo "<a href='index.php?action=aimer&idR=$leResto->idR'>";
    echo "<img src='images/$aime' alt='Aimer' />";
    echo "</a>";
    ?>
</h1>


<!--
<span id="note">
    <?php
     /*   
   
    for ($i = 1; $i <= 5; $i++) {
        echo "<img class='note' src='images/like.png' alt=''>";
    }
     */
    ?>
</span>
-->

<section>
    <div class="catTypesCuisine">
    <div class ="catTexte">Type de cuisine</div>
    </div>
    <ul id="tagFood">
        <?php
        foreach($lesTypes as $unType) {
            echo "<li class='tag'><span class='tag'>#$unType->libelleTC</span></li>";
        }
        ?>		
    </ul>
</section>
<section>
    <div class="catDescResto">
    <div class ="catTexte">Description</div>
    </div>
    <?php
    echo "<p>$descResto->descR</p>";
    ?> 
</section>

<div class="catAdresseResto">
<div class ="catTexte">Adresse</div>
    </div>
<p>
<?php
    echo "<p>$uneAdresse->voieAdrR</p>";
    echo "$uneAdresse->cpR ";
    echo "$uneAdresse->villeR";
    ?>
</p>

<div class="catPhotosResto">
<div class ="catTexte">Photos</div>
</div>
<ul id="galerie">
    <?php
    foreach($lesPhotos as $unePhoto){
        echo "<img class='galerie'src='photos/$unePhoto->cheminP' alt=''>";
    }
    ?>
</ul>

<div class="catHorairesResto">
<div class ="catTexte">Horaires</div>
</div>
<p>
<?php
    echo "<p>$uneHoraire->horairesR</p>";
    ?>
</p>
<div class="catCritiquesResto">
<div class ="catTexte">Critiques</div>
</div>

<?php
foreach($lesCritiques as $uneCritique){
        echo "<div class='critique'>";
        echo"<p>Note : $uneCritique->note/5</p>";
        echo "<p>$uneCritique->commentaire</p>";
    echo "</div>";
}
?>
<?php if ($mailU != ""): ?>
<form action="index.php?action=critiquer" method="POST">
    <input type="hidden" name="idR" value="<?php echo $leResto->idR; ?>" />
    <label for="note">Note :</label><br />
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <input type="radio" id="note<?php echo $i; ?>" name="note" value="<?php echo $i; ?>" required />
        <label for="note<?php echo $i; ?>"><?php echo $i; ?></label>
    <?php endfor; ?>
    <br />
    <label for="commentaire">Commentaire :</label><br />
    <textarea name="commentaire" rows="4" cols="50" required></textarea><br />
    <input type="submit" value="Envoyer">
</form>

<form action="index.php?action=critiquer" method="POST" style="margin-top:10px;">
    <input type="hidden" name="idR" value="<?php echo $leResto->idR; ?>" />
    <input type="hidden" name="supprimer" value="1" />
    <input type="submit" value="Supprimer ma critique">
</form>
<?php endif; ?>

</ul>



