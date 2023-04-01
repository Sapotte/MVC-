<?php

include("View/CategoryView.php");
include("Model/CategoryModel.php");


class CategoryController extends Controller{
    private $categoryView;
    private $categoryModel;

    public function __construct() {
        $this->categoryView = new CategoryView();
        $this->categoryModel = new CategoryModel();
    }
    
    public function listAction() {
        $table = $_GET['table'];
        $list = $this->categoryModel->getList($table);
        $this->categoryView->listDisplay($list);
    }

    public function addAction() {
        $this->categoryView->formDisplay("addDB", "", "Ajouter Category", array("", "","",""), "", "Ajouter");
    }

    public function updateAction() {
        // $table = $_GET['table'];
        $id = $_GET['id'];
        $item = $this->categoryModel->getItem($id);                   
        $this->categoryView->formDisplay("updateDB", $id, "Modification", $item, "", "Modifier");
    }

    public function deleteAction() {
        // $table = $_GET['table'];
        $id = $_GET['id'];
        $item = $this->categoryModel->getItem($id);                   
        $this->categoryView->formDisplay("deleteDB", $id, "suppression", $item, "disabled", "Supprimer");
    }

    public function addDBAction() {
        $table = $_GET['table'];
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $description = isset($_POST["param2"])?$_POST["param2"]:null; 
        $result = $this->categoryModel->addDB($nom, $description);
        if($result) { 
            $list = $this->categoryModel->getList($table);
            $this->categoryView->listDisplay($list);
        } else {
            $this->view->errorDisplay();
        }
    }

    public function updateDBAction() {
        $table = $_GET['table'];
        $id = $_GET["id"];
        $nom = isset($_POST["param1"])?$_POST["param1"]:null;
        $description = isset($_POST["param2"])?$_POST["param2"]:null;

        $result = $this->categoryModel->updateDB($id, $nom, $description);
        if($result) { 
            $list = $this->categoryModel->getList($table);
            $this->categoryView->listDisplay($list);
        } else {
            $this->view->errorDisplay();
        }
    }

    public function deleteDBAction() {
        $id = $_GET["id"];
        $result = $this->categoryModel->deleteDB($id);
        if($result) { 
            $list = $this->categoryModel->getList();
            $this->categoryView->listDisplay($list);
        } else {
            $this->view->errorDisplay();
        }
    }


}