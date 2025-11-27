<?php
include_once "$racine/modele/authentification.php";

logout();

header("Location: ./?action=accueil");
exit();
?>