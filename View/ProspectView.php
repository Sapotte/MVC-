<?php

class ProspectView extends View {

    
    // Affichage liste
    public function listDisplay($list) {
        $this->page .= "<h1>Prospect</h1>";
        $this->page .="<table class ='table'><thead><tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code postal</th><th>Ville</th><th>Commentaires</th></tr></thead><tbody>";
            foreach ($list as $element) {
                $this->page .= "<tr><th>".$element["nom"]."</th>";
                $this->page .= "<td>".$element["prenom"]."</td>";
                $this->page .= "<td>".$element["adresse"]."</td>";
                $this->page .= "<td>".$element["cp"]."</td>";
                $this->page .= "<td>".$element["ville"]."</td>"; 
                $this->page .= "<td>".$element["commentaires"]."</td>"; 
                $this->page .= "<td><a href=index.php?action=update&table=prospect&id=".$element["id"]." data-bs-toggle='tooltip' data-bs-placement='bottom' title='Modifier'><i class='fas fa-pen mr-2'></i></a></td>";
                $this->page .= "<td><a href=index.php?action=delete&table=prospect&id=".$element["id"]." class='ml-2' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Supprimer'><i class='fa-solid fa-trash'></i></a></td>"; 
                $this->page .= "<td><a href=index.php?action=transfer&table=prospect&id=".$element["id"]." class='ml-2' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Transférer vers la base client'><i class='fa-solid fa-arrow-right'></i></a></td></tr>";
            }
            $this->page .= "</tbody></table>";
            $this->page .= "<a href=index.php?action=add&table=prospect class='float-end' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Ajouter un prospect'><i class='fas fa-2x fa-plus'></i></a>";
            $this->display();
    }

    // Affichage formulaire
    public function formDisplay($action, $id, $titre, $param, $disabled, $bouton) {
        $this->page .= file_get_contents('View/html/formProspect.html');
        $this->page = str_replace("{action}", $action, $this->page);
        $this->page = str_replace("{id}", $id, $this->page);
        $this->page = str_replace("{titre}", $titre, $this->page);
        $this->page = str_replace("{param1}", $param[1], $this->page);
        $this->page = str_replace("{param2}", $param[2], $this->page);
        $this->page = str_replace("{param3}", $param[3], $this->page);
        $this->page = str_replace("{param4}", $param[4], $this->page);
        $this->page = str_replace("{param5}", $param[5], $this->page);
        $this->page = str_replace("{param6}", $param[6], $this->page);
        $this->page = str_replace("{disabled}", $disabled, $this->page);
        $this->page = str_replace("{bouton}", $bouton, $this->page);
        $this->display();
    }

}