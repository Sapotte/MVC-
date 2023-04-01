<?php

include("View/HomeView.php");

class HomeController extends Controller{
    private $homeView;
    // private $homeModel;

    public function __construct() {
        $this->homeView = new HomeView();
    }

    public function homeAction() {
        $this->homeView->homeDisplay();
    }
}