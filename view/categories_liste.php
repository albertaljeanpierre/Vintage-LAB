<?php
/*
 * view/categories_liste.php 
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
    $categorieID = $categorie['category_level_1_id'];
    $categorieName = $categorie['level_1'];
    $is_visible = $categorie["is_visible"];

    if ($is_visible == "1") {
        $txt_nom = $categorieName;
        $txt_visible = "<i class=\"fas fa-eye-slash\"></i>";
        $txt_title = "Masquer cette entrée";
    } else {
        $txt_nom = "<s style='color:#b1b1b1;'>" . $categorieName . "</s>";
        $txt_visible = "<i class=\"fas fa-eye\"></i>";
        $txt_title = "Réactiver cette entrée";
    }


    echo "<p>
                <a href='index.php?p=" . $url_page . "&categorie_id=" . $categorieID . "&action=update' title='éditer cette entrée' class='bt-action'><i class=\"far fa-edit\"></i></a> 
                    <a href='index.php?p=" . $url_page . "&categorie_id=" . $categorieID . "&action=showHide' title='" . $txt_title . "' class='bt-action'>" . $txt_visible . "</a> 
                " . $txt_nom . "
                 
            </p>";
}
?> 