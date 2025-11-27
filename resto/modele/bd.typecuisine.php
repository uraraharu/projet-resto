<?php
include_once "bd.pdo.php";

function getLesTypesCuisineByIdR($idR) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT typecuisine.libelleTC FROM proposer INNER JOIN typecuisine ON proposer.idTC = typecuisine.idTC WHERE proposer.idR = ?");
        $req->bindParam(1, $idR);
        $req->execute();
        $lesTypesCuisine = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesTypesCuisine;
    } catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesTypesCuisine() {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM typecuisine");
        $req->execute();
        $lesTypesCuisine = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesTypesCuisine;
    } catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>