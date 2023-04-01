<?php

class CategoryView extends View {
    

    // Affichage liste
    public function listDisplay($list) {
        $this->page .= "<h1>Category</h1>";
        $this->page .="<div><table class ='table'><thead><tr><th>Nom</th><th>Description</th></thead><tbody>";
            foreach ($list as $element) {
                $this->page .= "<th>".$element["nom"]."</th>";
                $this->page .= "<td>".$element["description"]."</td>";  
                $this->page .= "<td><a href=index.php?table=category&action=update&id=".$element["id"]." data-bs-toggle='tooltip' data-bs-placement='bottom' title='Modifier'><i class='fas fa-pen mr-2'></i></a></td>";
                $this->page .= "<td><a href=index.php?table=category&action=delete&id=".$element["id"]." class='ml-2' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Supprimer'><i class='fa-solid fa-trash'></i></a></td></tr>"; 
            }
            $this->page .= "</tbody></table>";
            $this->page .= "<div class='w-5 float-end' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Ajouter une category'><a href=index.php?table=category&action=add><i class='fas fa-2x fa-plus'></i></a></div></div>";
            $this->display();
    }

    // Affichage formulaire
    public function formDisplay($action, $id, $titre, $param, $disabled, $bouton) {
        $this->page .= file_get_contents('View/html/formCategory.html');
        $this->page = str_replace("{action}", $action, $this->page);
        $this->page = str_replace("{id}", $id, $this->page);
        $this->page = str_replace("{titre}", $titre, $this->page);
        $this->page = str_replace("{param1}", $param[1], $this->page);
        $this->page = str_replace("{param2}", $param[2], $this->page);
        $this->page = str_replace("{disabled}", $disabled, $this->page);
        $this->page = str_replace("{bouton}", $bouton, $this->page);
        $this->display();
    }

    
}