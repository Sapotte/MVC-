<?php
include("View/View.php");
include("Model/Model.php");
include("Controller/Controller.php");

include("Controller/HomeController.php");
include("Controller/CategoryController.php");
include("Controller/ProspectController.php");
include("Controller/ClientController.php");


class Dispatcher {

    public function dispatch() {
        $controller = (isset($_GET['table']))?$_GET['table']:'home';
        $controller = $controller."Controller";

        $action = (isset($_GET['action']))?$_GET['action']:'home';
        $action = $action."Action";

        $controller = new $controller();
        $controller->$action();
        
    }
}

$dispatcher = new Dispatcher();
$dispatcher->dispatch();



