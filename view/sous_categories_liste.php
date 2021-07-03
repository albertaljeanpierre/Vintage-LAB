<?php
/*
 * view/sous_categories_liste.php
 */
?>
<div class="row">
    <p>
        <a href="index.php?p=<?php echo $url_page; ?>&action=add" class="button"><i class="fas fa-plus"></i> Ajouter</a>
    </p>

</div>
<div class="row">
    <?php
    echo isset($msg) && !empty($msg) ? "<div class='missingfield $msg_class'>" . $msg . "</div>" : "";
    ?>

</div>


<?php
foreach ($categories as $categorie) {
    $categorie_id = $categorie['category_level_1_id'];
    $caterorie_name = $categorie['level_1'];
    
    $result = getSousCategories($categorie_id);

    /// affichage des données 
    echo "<h4>" . $caterorie_name . "</h4>";
    if (is_array($result)) {
         
        foreach ($result as $sous_categorie) {
            $sous_categorie_name = $sous_categorie['level_2'];
            $sous_categorie_id = $sous_categorie['category_level_2_id'];
            $is_visible = $sous_categorie["is_visible"];

            if ($is_visible == "1") {
                $txt_nom = $sous_categorie_name ;
                $txt_visible = "<i class=\"fas fa-eye-slash\"></i>";
                $txt_title = "Masquer cette entrée";
            } else {
                $txt_nom = "<s style='color:#b1b1b1;'>" . $sous_categorie_name . "</s>";
                $txt_visible = "<i class=\"fas fa-eye\"></i>";
                $txt_title = "Réactiver cette entrée";
            }


            echo "<p>     <a href='index.php?p=" . $url_page . "&sous-categorie_id=" . $sous_categorie_id . "&action=update' title='éditer cette entrée' class='bt-action'><i class=\"far fa-edit\"></i></a> 
                    <a href='index.php?p=" . $url_page . "&sous-categorie_id=" . $sous_categorie_id . "&action=showHide' title='" . $txt_title . "' class='bt-action'>" . $txt_visible . "</a> 
                " . $txt_nom . "</p>";
        }
        
    } else {
        echo "<p>Pas de sous-cactégorie pour la catégorie " . $caterorie_name;
    }
}

