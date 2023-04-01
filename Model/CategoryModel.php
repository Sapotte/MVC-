<?php


class CategoryModel extends Model {
    
    public function getList() {
        $requete = "SELECT * from `category`;";
        
        $result = $this->connection->query($requete);

        $list= array();
        if($result) {
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    }

    public function getItem($id) {
        $requete = $this->connection->prepare('SELECT * from `category` WHERE id=:id');
        $requete->bindParam(':id', $id);
        $result = $requete->execute();

        $item =array();
        if($result) {
            $item = $requete->fetch(PDO::FETCH_NUM);
        }

        return $item;
    }

    public function deleteDB($id) {

        $requete = $this->connection->prepare ("DELETE FROM `category`  WHERE id = :id");
        $requete->bindParam(':id', $id);

        $result = $requete->execute();

        return $result;
    }
    public function addDB($nom, $description){
        $requete = $this->connection->prepare("INSERT INTO `category` (`id`, `nom`, `description`) VALUES (NULL, :nom, :de);");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':de', $description);

        $result = $requete->execute();

        return $result;
    }

    public function updateDB($id, $nom, $description) {
        $requete = $this->connection->prepare ("UPDATE category  SET `nom` = :nom, `description` = :de WHERE id = :id");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':de', $description);
        $requete->bindParam(':id', $id);

        $result = $requete->execute();

        return $result;
    }
}

