<?php

/* 
 * lib/categories.php 
 */
/**
 * Fonction retournant toutes les catégories dans un tableau
 */
function getCategories() {
    
    $sql = "SELECT category_level_1_id , level_1, is_visible FROM category_level_1  GROUP BY level_1 ASC;"; 
    return requeteResultat($sql);
    
}

/**
 * Fonction d'insertion d'une catégorie
 */
function insertCategorie($categorie){ 
    
    $sql = "INSERT INTO category_level_1
                        (level_1) 
                    VALUES
                        ('$categorie' );
                    ";
    // exécution de la requête
    return ExecRequete($sql);
    
}


/**
 * Fonction de récupération des données d'une catégorie donnée
 */
function getCategorie($categorie_id ) {
    if(!is_numeric($categorie_id)){
        return false;
    }
    $sql = "SELECT category_level_1_id , level_1, is_visible FROM category_level_1 WHERE category_level_1_id = '$categorie_id' ;"; 
    return requeteResultat($sql);
}

/**
 * Fonction qui met à jour une catégorie
 */
function updateCategorie($categorie_id, $categorie_name) {
    if(!is_numeric($categorie_id)){
        return false;
    }
    $sql = "UPDATE category_level_1 
                SET 
                    level_1 = '". $categorie_name ."' 
            WHERE category_level_1_id= ". $categorie_id .";
            ";
    // exécution de la requête
    return ExecRequete($sql);
}

function showHideCategorie($categorie_id){
    if(!is_numeric($categorie_id)){
        return false;
    }
    // récupération de l'état avant mise à jour
    $sql = "SELECT is_visible FROM category_level_1 WHERE  category_level_1_id = ".$categorie_id.";";
    $result = requeteResultat($sql);
    if(is_array($result)){
        $etat_is_visble = $result[0]["is_visible"];

        $nouvel_etat = $etat_is_visble == "1" ? "0" : "1";
        // mise à jour vers le nouvel état
        $sql = "UPDATE category_level_1 SET is_visible = '".$nouvel_etat."' WHERE category_level_1_id = ".$categorie_id.";";
        // exécution de la requête
        return ExecRequete($sql);

    }else{
        return false;
    }
}

