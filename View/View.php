<?php

abstract class View {

    protected $page;

    // Construction début page
    public function __construct() {
        $this->page = file_get_contents('html/header.html', true);
        $this->page .= file_get_contents('html/nav.html', true);
    }

    // Affichage page avec ajout footer
    public function display() {
        $this->page .=file_get_contents('html/footer.html', true);
        echo $this->page;
    }
    
    // Affichage erreur
    public function errorDisplay() {
        $this->page .= "Une erreur est survenue";
    }
}

?>
