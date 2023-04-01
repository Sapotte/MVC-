<?php

include("View/ClientView.php");
include("Model/ClientModel.php");

class ClientController extends Controller {
    private $clientView;
    private $clientModel;
    

    public function __construct() {
        $this->clientView = new ClientView();
        $this->clientModel = new ClientModel();
    }

    public function listAction() {
        $list = $this->clientModel->getList();
        $this->clientView->listDisplay($list);
    }

    public function addAction() {
        $this->clientView->formDisplay("addDB", "", "Ajouter Client", array("", "","", "","", "", ""), "", "Ajouter");
    }

    public function updateAction() {
        $id = $_GET['id'];
        $item = $this->clientModel->getItem($id);                   
        $this->clientView->formDisplay("updateDB", $id, "Modification", array($item[0], $item[1], $item[2], $item[3], $item[4], $item[5] , $item[6]), "", "Modifier");
    }

    public function deleteAction() {
        $id = $_GET['id'];
        $item = $this->clientModel->getItem($id);                   
        $this->clientView->formDisplay("deleteDB", $id, "suppression", array($item[0], $item[1], $item[2], $item[3], $item[4] , $item[5], $item[6]), "disabled", "Supprimer");
    }

    public function addDBAction() {
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $prenom = isset($_POST["param2"])?$_POST["param2"]:null;
        $adresse = isset($_POST["param3"])?$_POST["param3"]:null; 
        $cp = isset($_POST["param4"])?$_POST["param4"]:null; 
        $ville = isset($_POST["param5"])?$_POST["param5"]:null; 
        $commentaires = isset($_POST["param6"])?$_POST["param6"]:null;    
         
        $result = $this->clientModel->addDB($nom, $prenom, $adresse, $cp, $ville, $commentaires);
        if($result) { 
            $list = $this->clientModel->getList();
            $this->clientView->listDisplay($list);
        } else {
            $this->view->errorDisplay();
        }
    }

    public function updateDBAction() {
        $id = $_GET["id"];
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $prenom = isset($_POST["param2"])?$_POST["param2"]:null;
        $adresse = isset($_POST["param3"])?$_POST["param3"]:null;
        $cp = isset($_POST["param4"])?$_POST["param4"]:null;
        $ville = isset($_POST["param5"])?$_POST["param5"]:null;
        $commentaires = isset($_POST["param6"])?$_POST["param6"]:null;
        
        $result = $this->clientModel->updateDB($id, $nom, $prenom, $adresse, $cp, $ville, $commentaires);
        if($result) { 
            $list = $this->clientModel->getList();
            $this->clientView->listDisplay($list);
        } else {
            $this->view->errorDisplay();
        }
    }

    public function deleteDBAction() {
        $id = $_GET["id"];
        $result = $this->clientModel->deleteDB($id);
        if($result) { 
            $list = $this->clientModel->getList();
            $this->clientView->listDisplay($list);
        } else {
            $this->view->errorDisplay();
        }
    }


}