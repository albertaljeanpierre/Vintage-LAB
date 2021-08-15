<?php

function getArticle($id) {
    if(!is_numeric($id)){
        return false;
    }
    $sql = "SELECT ad_id, ad_title, ad_description, price, ad.is_visible, ad_description_detail, category_level_2.level_2, category_level_1.level_1
FROM `ad` 
INNER JOIN category_level_2 ON ad.category_level_2_id = category_level_2.category_level_2_id
INNER JOIN category_level_1 ON category_level_1.category_level_1_id = category_level_2.category_level_1_id 

 WHERE ad_id = $id";
    return requeteResultat($sql); 

}