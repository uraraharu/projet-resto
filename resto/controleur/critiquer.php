<?php
include_once "$racine/modele/bd.critiquer.php";
include_once "$racine/modele/authentification.php";

$mailU = getMailULoggedOn();

if ($mailU != "" && !empty($_POST)) {
    $idR = $_POST["idR"];

    if (isset($_POST["supprimer"])) {
        delCritiquer($mailU, $idR);
    } elseif (isset($_POST["note"]) && isset($_POST["commentaire"])) {
        $note = $_POST["note"];
        $commentaire = $_POST["commentaire"];
        addCritiquer($mailU, $idR, $note, $commentaire);
    }
}

if (isset($idR)) {
    header("Location: index.php?action=detailResto&idR=$idR");
} else {
    header("Location: index.php");
}
?>
