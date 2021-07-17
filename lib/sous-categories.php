<?php
/*
* lib/sous-categories.php
*/
/**
 * Fonction retournant toutes les catégories visible dans un tableau
 */
function getCategoriesVisible()
{

    $sql = "SELECT category_level_1_id , level_1, is_visible 
                FROM category_level_1  
                WHERE `is_visible` = '1'
                GROUP BY level_1 ASC;";
    return requeteResultat($sql);

}

/**
 * Fonction retournant toutes les sous-catégories d'une catégorie donnée
 */
function getSousCategories($categorie_id)
{

    $sql = "SELECT category_level_2_id , level_2, is_visible FROM category_level_2 WHERE category_level_1_id = " . $categorie_id;
    return requeteResultat($sql);

}


/**
 * Fonction d'insertion d'une sous-catégorie
 */
function insertSousCategorie($categorie_id, $sous_categorie)
{

    $sql = "INSERT INTO category_level_2
                        (category_level_1_id , level_2 ) 
                    VALUES
                        ( '$categorie_id' , '$sous_categorie' );
                    ";
    // exécution de la requête
    return ExecRequete($sql);

}

/**
 * Fonction de récupération d'une sous-catégorie en fonction de l'id de celle-ci
 */
function getSousCategorie($sous_categorie_id)
{
    $sql = "SELECT category_level_2_id , level_2, is_visible FROM category_level_2 WHERE category_level_2_id = " . $sous_categorie_id;
    return requeteResultat($sql);
}


function updateSousCategorie($sous_categorie_name, $categorie_id)
{
    if (!is_numeric($categorie_id)) {
        return false;
    }
    $sql = "UPDATE category_level_2 
                SET 
                    level_2 = '" . $sous_categorie_name . "' 
            WHERE category_level_1_id= " . $categorie_id . ";
            ";
    // exécution de la requête
    return ExecRequete($sql);
}