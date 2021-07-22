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
    $sql = "SELECT category_level_1_id , level_2, is_visible FROM category_level_2 WHERE category_level_2_id = " . $sous_categorie_id;
    return requeteResultat($sql);
}


function updateSousCategorie($sous_categorie_name, $category_level_1_id, $get_sous_categorie_id)
{
    if (!is_numeric($get_sous_categorie_id) || !is_numeric($category_level_1_id)) {
        return false;
    }
    $sql = "UPDATE category_level_2 
                SET 
                    level_2 = '" . $sous_categorie_name . "' ,
                    category_level_1_id = '". $category_level_1_id . "'
            WHERE category_level_2_id= " . $get_sous_categorie_id. ";
            ";
    // exécution de la requête
    return ExecRequete($sql);
}

function showHideSousCategories($id){
    if(!is_numeric($id)){
        return false;
    }
    // récupération de l'état avant mise à jour
    $sql = "SELECT is_visible FROM category_level_2 WHERE category_level_2_id = ".$id.";";
    $result = requeteResultat($sql);
    if(is_array($result)){
        $etat_is_visble = $result[0]["is_visible"];

        $nouvel_etat = $etat_is_visble == "1" ? "0" : "1";
        // mise à jour vers le nouvel état
        $sql = "UPDATE category_level_2 SET is_visible = '".$nouvel_etat."' WHERE category_level_2_id = ".$id.";";
        // exécution de la requête
        return ExecRequete($sql);

    }else{
        return false;
    }
}