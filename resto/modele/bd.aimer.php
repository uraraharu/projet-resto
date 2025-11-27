<?php
include_once "bd.pdo.php";
function getAimerById($mailU, $idR) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM aimer WHERE mailU = ? AND idR = ?");
        $req->bindParam(1, $mailU);
        $req->bindParam(2, $idR);
        $req->execute();
        $lesAimer = $req->fetchALL(PDO::FETCH_OBJ);
        return $lesAimer;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function addAimer($mailU, $idR) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO aimer (mailU, idR) VALUES (?, ?)");
        $req->bindParam(1, $mailU);
        $req->bindParam(2, $idR);
        $req->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delAimer($mailU, $idR) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("DELETE FROM aimer WHERE mailU = ? AND idR = ?");
        $req->bindParam(1, $mailU);
        $req->bindParam(2, $idR);
        $req->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}