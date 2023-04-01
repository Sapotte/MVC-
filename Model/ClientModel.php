<?php

class ClientModel extends Model {

    public function getList() {
        $requete = "SELECT * from `client`;";
        
        $result = $this->connection->query($requete);

        $list= array();
        if($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    }

    public function getItem($id) {
        $requete = $this->connection->prepare('SELECT * from `client` WHERE id=:id');
        $requete->bindParam(':id', $id);
        $result = $requete->execute();

        $item =array();
        if($result) {
            $item = $requete->fetch(PDO::FETCH_NUM);
        }

        return $item;
    }

    public function deleteDB($id) {

        $requete = $this->connection->prepare ("DELETE FROM `client`  WHERE id = :id");
        $requete->bindParam(':id', $id);

        $result = $requete->execute();

        return $result;
    }
        
    public function addDB($nom, $prenom, $adresse, $cp, $ville, $commentaires) {    
        
        $requete = $this->connection->prepare("INSERT INTO `client` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `commentaires`) VALUES (NULL, :nom, :prenom, :adresse, :cp, :ville, :commentaires);");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':adresse', $adresse);
        $requete->bindParam(':cp', $cp);
        $requete->bindParam(':ville', $ville);
        $requete->bindParam(':commentaires', $commentaires);

        $result = $requete->execute();

        return $result;
    }

    

    public function updateDB($id, $nom, $prenom, $adresse, $cp, $ville, $commentaires) {
        
        $requete = $this->connection->prepare ("UPDATE client  SET nom = :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville, commentaires = :commentaires WHERE id = :id");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':adresse', $adresse);
        $requete->bindParam(':cp', $cp);
        $requete->bindParam(':ville', $ville);
        $requete->bindParam(':commentaires', $commentaires);
        $requete->bindParam(':id', $id);

        $result = $requete->execute();

        return $result;
    }

}

