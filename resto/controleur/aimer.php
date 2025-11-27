<?php
    include_once "$racine/modele/bd.aimer.php";
    $ajoutAimer = getAimerById($mailU, $idR);

    include_once "$racine/modele/bd.aimer.php";
    include_once "$racine/modele/authentification.php";

    $mailU = getMailULoggedOn();
    $idR = $_GET["idR"];

    if ($mailU != "") {
        if (getAimerById($mailU, $idR)) {
            delAimer($mailU, $idR); // L'utilisateur avait aimé → on supprime
        } else {
            addAimer($mailU, $idR); // L'utilisateur n'avait pas aimé → on ajoute
        }
    }

    // Rediriger vers la page de détail du resto après l'action
    header("Location: index.php?action=detailResto&idR=$idR");
?>

?>