<?php

/*
 * model/gestion_sous-categories.php
 */

include_once 'lib/categories.php';
include_once 'lib/sous-categories.php';
$url_page = "gestion_sous-categories";


$get_action = isset($_GET["action"]) ? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) : "list";


switch ($get_action) {
    case 'list': // liste des sous-catégories
        // récupération  des catégories 
        $categories = getCategories();

        $page_view = "sous_categories_liste";

        break;

    case 'add': // ajout d'une sous-catégories
        // récupération de la donnée si envoyée
        $post_sous_categorie = isset($_POST["sous_categorie"]) ? filter_input(INPUT_POST, 'sous_categorie', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $post_categorie = isset($_POST["categorie"]) ? filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS) : NULL; // retour d'un sélet donc l'id de la catégorie est retourner
        // Création du tableau d'option du sélect
        $categoriesVisible = getCategoriesVisible();
        $categories_option = array_column($categoriesVisible, 'level_1' , 'category_level_1_id');
        // $categories_id = array_column($categories, 'category_level_1_id"');
        /// $categories_option = array_merge($categories_id, $categories_names);  // tableau des options



        $input = [];
        $input[] = addLayout("<h4>Ajouter une sous-catégorie</h4>");
        $input[] = addLayout("<div class='row'>");
        $input[] = addSelect('Catégorie asociée', ['name' => 'categorie', "class" => "u-full-width"], $categories_option, $post_categorie, true, "six columns");
        $input[] = addLayout("</div>");

        $input[] = addLayout("<div class='row'>");
        $input[] = addInput('Nom de la sous-categorie', ["type" => "text", "value" => $post_sous_categorie, "name" => "sous_categorie", "class" => "u-full-width"], true, "six columns");

        $input[] = addLayout("</div>");

        $input[] = addSubmit(["value" => "envoyer", "name" => "submit"], "\t\t<br />\n");

        $show_form = form("categorie", "index.php?p=" . $url_page . "&action=add", "post", $input);

        if ($show_form != false) { // affichage du formulaire  
            $page_view = "sous_categorie_form";
        } else { // envoie des données à la base 
            if (insertSousCategorie($post_categorie, $post_sous_categorie)) {
                // message de succes qui sera affiché dans le <body>
                $msg = "<p>données insérées avec succès</p>";
                $msg_class = "success";
            } else {
                // message d'erreur qui sera affiché dans le <body>
                $msg = "<p>erreur lors de l'insertion des données</p>";
                $msg_class = "error";
            }
            $page_view = "sous_categories_liste";
            $categories = getCategories();
        }

        break;
    case 'update': // Mise à jours d'une sous-catégorie

        $get_sous_categorie_id = isset($_GET["sous-categorie_id"]) ? filter_input(INPUT_GET, 'sous-categorie_id', FILTER_SANITIZE_NUMBER_INT) : null;

        if (empty($_POST)) {
            // récupération d'une sous-catégorie en fonction de l'id de celle-ci
            $result = getSousCategorie($get_sous_categorie_id);
            var_dump($result); 
            $category_level_2_id = $result[0]["category_level_2_id"];
            $sous_categorie_name = $result[0]["level_2"];
            $is_visible = $result[0]["is_visible"];
        } else {
            $category_level_2_id = null;
            $sous_categorie_name = null;
            $is_visible = null;
        }

        $post_sous_categorie = isset($_POST["sous_categorie"]) ? filter_input(INPUT_POST, 'sous_categorie', FILTER_SANITIZE_SPECIAL_CHARS) : $sous_categorie_name;
        $post_categorie = isset($_POST["categorie"]) ? filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS) : null ; // comme c'est un select, je récupère l'id de la catégorie 
        
        // Création du tableau d'option du sélect
        $categoriesVisible = getCategoriesVisible();
        $categories_option = array_column($categoriesVisible, 'level_1' , 'category_level_1_id');

        $input = [];

        $input[] = addLayout("<h4>Modifier une Sous-catégorie</h4>");
        $input[] = addLayout("<div class='row'>");
        $input[] = addSelect('Catégorie asociée', ['name' => 'categorie', "class" => "u-full-width"], $categories_option, "", true, "six columns");
        $input[] = addLayout("</div>");

        $input[] = addLayout("<div class='row'>");
        $input[] = addInput('Nom de la sous-categorie', ["type" => "text", "value" => $post_sous_categorie, "name" => "sous_categorie", "class" => "u-full-width"], true, "six columns");

        $input[] = addLayout("</div>");
        $input[] = addSubmit(["value" => "envoyer", "name" => "submit"], "\t\t<br />\n");

        $show_form = form("form_sous_categorie", "index.php?p=" . $url_page . "&action=update&sous-categorie_id=" . $get_sous_categorie_id  , "post", $input);


        if ($show_form != false) {

            $page_view = "sous_categorie_form";
        } else { // si le formulaire est rempli correctement. 
            if (updateSousCategorie($post_sous_categorie, $post_categorie)) {
                // message de succes qui sera affiché dans le <body>
                $msg = "<p>données modifiée avec succès</p>";
                $msg_class = "success";
            } else {
                // message d'erreur qui sera affiché dans le <body>
                $msg = "<p>erreur lors de la modification des données</p>";
                $msg_class = "error";
            }

            $page_view = "categories_liste";

            $categories = getCategories();
        }

        break;
    case 'showHide': // cacher ou rendre visible une catégorie 
    


        break;
}