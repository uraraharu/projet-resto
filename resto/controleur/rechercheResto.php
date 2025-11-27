<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/authentification.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de cuisine");

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET['critere'])) {
    $critere = $_GET['critere'];
} else {
    $critere = "nom";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
switch($critere){
    case 'nom':
    // recherche par nom
    if (isset($_POST['nomR'])) {
        $lesRestos = getLesRestosByNomR($_POST['nomR']);
    }    
    break;
    
    case 'adresse':
    // recherche par adresse
    if (isset($_POST['voieAdrR']) && isset($_POST['cpR']) && isset($_POST['villeR'])) {
        $lesRestos = getLesRestosByAdresse($_POST['voieAdrR'], $_POST['cpR'], $_POST['villeR']);
    }    
    break;
    case 'type':
    // recherche par type de cuisine
    if (isset($_POST['tabIdTC'])) {
        $tabIdTC = $_POST['tabIdTC'];
        $lesRestos = getLesRestosByTC($tabIdTC);
    }    
}

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheResto.php";
include "$racine/vue/vueListeRestos.php";
include "$racine/vue/pied.html.php";
?>