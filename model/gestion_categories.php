<?php

/*
 * model/gestion_categories.php
 */
adminProtection();

include_once 'lib/categories.php';
$url_page = "gestion_categories";


$get_action = isset($_GET["action"]) ? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS) : "list";


switch ($get_action) {
    case 'list': // liste des catégories

        $categories = getCategories();

        $page_view = "categories_liste";

        break;
    case 'add': // ajout d'une catégories
        // recupération de la donnée si envoyée 
        $post_categorie = isset($_POST["categorie"]) ? filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $input = [];
        $input[] = addLayout("<h4>Ajouter une catégorie</h4>");
        $input[] = addLayout("<div class='row'>");
        $input[] = addInput('categorie', ["type" => "text", "value" => $post_categorie, "name" => "categorie", "class" => "u-full-width"], true, "six columns");

        $input[] = addLayout("</div>");

        $input[] = addSubmit(["value" => "envoyer", "name" => "submit"], "\t\t<br />\n");

        $show_form = form("categorie", "index.php?p=" . $url_page . "&action=add", "post", $input);

        if ($show_form != false) { // affichage du formulaire  
            $page_view = "categorie_form";
        } else { // envoie des données à la base 
            if (insertCategorie($post_categorie)) {
                // message de succes qui sera affiché dans le <body>
                $msg = "<p>données insérées avec succès</p>";
                $msg_class = "success";
            } else {
                // message d'erreur qui sera affiché dans le <body>
                $msg = "<p>erreur lors de l'insertion des données</p>";
                $msg_class = "error";
            }
            $page_view = "categories_liste";
            $categories = getCategories();
        }

        break;
    case 'update': // Mise à jours d'une catégorie

        $get_categorie_id = isset($_GET["categorie_id"]) ? filter_input(INPUT_GET, 'categorie_id', FILTER_SANITIZE_NUMBER_INT) : null;

        if (empty($_POST)) {
            $result = getCategorie($get_categorie_id);

            $category_level_1_id = $result[0]["category_level_1_id"];
            $categorie_name = $result[0]["level_1"];
            $is_visible = $result[0]["is_visible"];
        } else {
            $category_level_1_id = null;
            $categorie_name = null;
            $is_visible = null;
        }

        $post_categorie = isset($_POST["categorie"]) ? filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_SPECIAL_CHARS) : $categorie_name;

        $input = [];

        $input[] = addLayout("<h4>Modifier une catégorie</h4>");
        $input[] = addLayout("<div class='row'>");
        $input[] = addInput('Catégorie', ["type" => "text", "value" => $post_categorie, "name" => "categorie", "class" => "u-full-width"], true, "six columns");
        $input[] = addLayout("</div>");
        $input[] = addSubmit(["value" => "envoyer", "name" => "submit"], "\t\t<br />\n");

        $show_form = form("form_categorie", "index.php?p=" . $url_page . "&action=update&categorie_id=" . $get_categorie_id, "post", $input);


        if ($show_form != false) {

            $page_view = "categorie_form";
        } else { // si le formulaire est rempli correctement. 
            if (updateCategorie($get_categorie_id, $post_categorie)) {
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
        $get_categorie_id = isset($_GET["categorie_id"]) ? filter_input(INPUT_GET, 'categorie_id', FILTER_SANITIZE_NUMBER_INT) : null;

        if (showHideCategorie($get_categorie_id)) {
            // message de succes qui sera affiché dans le <body>
            $msg = "<p>mise à jour de l'état réalisée avec succès</p>";
            $msg_class = "success";
        } else {
            // message d'erreur qui sera affiché dans le <body>
            $msg = "<p>erreur lors de la mise à jour de l'état</p>";
            $msg_class = "error";
        }
        
        $page_view = "categories_liste";
        $categories = getCategories();
        


        break;
}