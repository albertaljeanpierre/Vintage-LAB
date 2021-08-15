<?php

/*
 * lib/articles.php 
 */

// Fonction qui vas rechercher les articles en base pour une page
function getArticlesPage($nbArticle, $page) {
    if (!is_numeric($nbArticle) && !is_numeric($page)) {
        return false;
    }
    if ($page === '1') {
        $page = $page -1; // 0 
    } else {
        $page = ($page * $nbArticle) - $nbArticle   ;
    }
    
     
    $sql = "SELECT  ad_id , ad_title, ad_description, price, ad.is_visible, concat(designer.firstname , ' ' , designer.lastname) AS designer, manufacturer.manufacturer 
                FROM `ad` 
                INNER JOIN designer ON ad.designer_id = designer.designer_id 
                INNER JOIN manufacturer ON ad.manufacturer_id = manufacturer.manufacturer_id
                GROUP by ad_title ASC 
                LIMIT $nbArticle OFFSET $page";

    return requeteResultat($sql);
    // SELECT * FROM `ad` LIMIT 6 OFFSET 0
    // SELECT * FROM `ad` LIMIT 30 OFFSET 0 => de 1 à 30
    // SELECT * FROM `ad` LIMIT 30 OFFSET 30=> de 31 à 60
    
    
    
    
    
    
}
