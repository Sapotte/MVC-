<?php

include("View/ProspectView.php");
include("Model/ProspectModel.php");

class ProspectController extends Controller {
    private $prospectView;
    private $prospectModel;

    public function __construct() {
        $this->prospectView = new ProspectView();
        $this->prospectModel = new ProspectModel();
    }

    public function listAction() {
        $list = $this->prospectModel->getList();
        $this->prospectView->listDisplay($list);
    }

    public function addAction() {
        $this->prospectView->formDisplay("addDB", "", "Ajouter Prospect", array("", "","", "","", "",""), "", "Ajouter");
    }

    public function updateAction() {
        $id = $_GET['id'];
        $item = $this->prospectModel->getItem($id);                   
        $this->prospectView->formDisplay("updateDB", $id, "Modification", array($item[0], $item[1], $item[2], $item[3], $item[4], $item[5] , $item[6]), "", "Modifier");
    }

    public function deleteAction() {
        $id = $_GET['id'];
        $item = $this->prospectModel->getItem($id);                   
        $this->prospectView->formDisplay("deleteDB", $id, "Suppression", array($item[0], $item[1], $item[2], $item[3], $item[4] , $item[5], $item[6]), "disabled", "Supprimer");
    }

    public function addDBAction() {
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $prenom = isset($_POST["param2"])?$_POST["param2"]:null;
        $adresse = isset($_POST["param3"])?$_POST["param3"]:null;
        $cp = isset($_POST["param4"])?$_POST["param4"]:null;
        $ville = isset($_POST["param5"])?$_POST["param5"]:null;
        $commentaires = isset($_POST["param6"])?$_POST["param6"]:null;
        $table = $_GET['table'];

        $this->prospectModel->addDB($nom, $prenom, $adresse, $cp, $ville, $commentaires);
        $list = $this->prospectModel->getList();
        $this->prospectView->listDisplay($list);
    }

    public function updateDBAction() {
        $id = $_GET["id"];
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $prenom = isset($_POST["param2"])?$_POST["param2"]:null;
        $adresse = isset($_POST["param3"])?$_POST["param3"]:null;
        $cp = isset($_POST["param4"])?$_POST["param4"]:null;
        $ville = isset($_POST["param5"])?$_POST["param5"]:null;
        $commentaires = isset($_POST["param6"])?$_POST["param6"]:null;

        $this->prospectModel->updateDB($id, $nom, $prenom, $adresse, $cp, $ville, $commentaires);
        $list = $this->prospectModel->getList();
        $this->prospectView->listDisplay($list);
    }

    public function deleteDBAction() {
        $id = $_GET["id"];
        $this->prospectModel->deleteDB($id);
        $list = $this->prospectModel->getList();
        $this->prospectView->listDisplay($list);
    }

    public function transferAction() {
        $id = $_GET['id'];
        $item = $this->prospectModel->getItem($id);                   
        $this->prospectView->formDisplay("transferDB", $id, "Transfert vers 'Client'", array($item[0], $item[1], $item[2], $item[3], $item[4] , $item[5], $item[6]), "disabled", "Transférer");
    }

    public function transferDBAction() {
        $table = $_GET['table'];
        $id = $_GET['id'];
        $result = $this->prospectModel->transferDB($id);
        if($result) {
           $this->prospectModel->deleteDB($id); 
           $list = $this->prospectModel->getList();
            $this->prospectView->listDisplay($list);
        } else {
            echo "Une erreur est survenue";
        }
        
        
    }
}