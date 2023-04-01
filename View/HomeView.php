<?php

class HomeView extends View {
    

    // Affichage page d'accueil
    public function homeDisplay() {
        $this->page .= "<h1 class='display-1 text-center mt-5'>Bienvenue</h1>";
        $this->display();
    }
}
