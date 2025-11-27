<?php
include_once "bd.pdo.php";
function getCritiquerByIdR($idR) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM critiquer WHERE idR = ?");
        $req->bindParam(1, $idR);
        $req->execute();
        $lesCritiques = $req->fetchALL(PDO::FETCH_OBJ);
        return $lesCritiques;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
/*
function addCritiquer($mailU, $idR, $note, $commentaire) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO critiquer (mailU, idR, note, commentaire) VALUES (?, ?, ?, ?)");
        $req->bindParam(1, $mailU);
        $req->bindParam(2, $idR);
        $req->bindParam(3, $note);
        $req->bindParam(4, $commentaire);
        $req->execute();
    }
    catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
*/

function addCritiquer($mailU, $idR, $note, $commentaire) {
    try {
        $connex = connexionPDO();

        
        $sqlCheck = "SELECT * FROM critiquer WHERE mailU = :mailU AND idR = :idR";
        $check = $connex->prepare($sqlCheck);
        $check->bindParam(':mailU', $mailU);
        $check->bindParam(':idR', $idR);
        $check->execute();

        if ($check->rowCount() > 0) { //verif si il y a deja une critique
            echo "<script>alert('Vous avez déja écrit une critique pour ce restaurant'); window.history.back();</script>";
            exit;
        }

        // Insérer la critique si elle n'existe pas
        $sql = "INSERT INTO critiquer (mailU, idR, note, commentaire)
                VALUES (:mailU, :idR, :note, :commentaire)";
        $req = $connex->prepare($sql);
        $req->bindParam(':mailU', $mailU);
        $req->bindParam(':idR', $idR);
        $req->bindParam(':note', $note);
        $req->bindParam(':commentaire', $commentaire);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delCritiquer($mailU,$idR){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("DELETE FROM critiquer WHERE mailU = ? AND idR = ?");
        $req->bindParam(1, $mailU);
        $req->bindParam(2, $idR);
        $req->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
        
    
}
?>