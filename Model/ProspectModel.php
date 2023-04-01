<?php

class ProspectModel extends Model {
    public function getList() {
        $requete = "SELECT * from `prospect`;";
        
        $result = $this->connection->query($requete);

        $list= array();
        if($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    }

    public function getItem($id) {
        $requete = $this->connection->prepare('SELECT * from `prospect` WHERE id=:id');
        $requete->bindParam(':id', $id);
        $result = $requete->execute();

        $item =array();
        if($result) {
            $item = $requete->fetch(PDO::FETCH_NUM);
        }

        return $item;
    }

    public function deleteDB($id) {

        $requete = $this->connection->prepare ("DELETE FROM `prospect`  WHERE id = :id");
        $requete->bindParam(':id', $id);

        $result = $requete->execute();

        return $result;
    }
    
    public function addDB($nom, $prenom, $adresse, $cp, $ville, $commentaires) {
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $prenom = isset($_POST["param2"])?$_POST["param2"]:null;
        $adresse = isset($_POST["param3"])?$_POST["param3"]:null; 
        $cp = isset($_POST["param4"])?$_POST["param4"]:null; 
        $ville = isset($_POST["param5"])?$_POST["param5"]:null; 
        $commentaires = isset($_POST["param6"])?$_POST["param6"]:null;         

        $requete = $this->connection->prepare("INSERT INTO `prospect` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `commentaires`) VALUES (NULL, :nom, :prenom, :adresse, :cp, :ville, :commentaires);");
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
        $id = $_GET["id"];
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $prenom = isset($_POST["param2"])?$_POST["param2"]:null;
        $adresse = isset($_POST["param3"])?$_POST["param3"]:null;
        $cp = isset($_POST["param4"])?$_POST["param4"]:null;
        $ville = isset($_POST["param5"])?$_POST["param5"]:null;
        $commentaires = isset($_POST["param6"])?$_POST["param6"]:null;

        $requete = $this->connection->prepare ("UPDATE prospect  SET nom = :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville, commentaires = :commentaires WHERE id = :id");
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

    public function transferDB($id) {
        $requete = $this->connection->prepare('SELECT * from prospect WHERE id=:id');
        $requete->bindParam(':id', $id);

        $result = $requete->execute();

        $item = $this->getItem($id);
      
        $requete = $this->connection->prepare("INSERT INTO `client` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `commentaires`) VALUES (NULL, :nom, :prenom, :adresse, :cp, :ville, :commentaires);");
        $requete->bindParam(':nom', $item[1]);
        $requete->bindParam(':prenom', $item[2]);
        $requete->bindParam(':adresse', $item[3]);
        $requete->bindParam(':cp', $item[4]);
        $requete->bindParam(':ville', $item[5]);
        $requete->bindParam(':commentaires', $item[6]);

        $result = $requete->execute();

        return $result;
    }
}

