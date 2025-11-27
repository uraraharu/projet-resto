<?php
include_once "bd.pdo.php";
function getUneAdresseRestoByIdR($idR) {
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select voieAdrR, cpR, villeR from resto where idR = ?");
        $req->bindParam(1, $idR);
        $req->execute();
        $leResto = $req->fetch(PDO::FETCH_OBJ);
        return $leResto;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>