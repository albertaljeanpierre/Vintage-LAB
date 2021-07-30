<?php
function getProduits($id = 0, $alpha = ""){
    if(!is_numeric($id)){
        return false;
    }
    // création de la condition WHERE en fonctions des infos passées en paramètre
    $cond = !empty($alpha) ? " ad_title LIKE '".$alpha."%' " : " 1 ";
    $cond .= $id > 0 ? " AND ad_id = ".$id : "";

    // requête permettant de récupérer les designers suivant le(s) filtre(s)
//     $sql = "SELECT 	ad_id as id, ad_title as titre, is_visible
//                FROM  ad
//                WHERE ".$cond."
//                ORDER BY ad_title ASC;";
        $sql = "SELECT 	ad_id as id, ad_title as titre, ad.is_visible, 	designer.firstname, upper(designer.lastname) AS name, category_level_2.level_2, category_level_1.level_1, manufacturer.manufacturer 
                FROM  ad 
                INNER JOIN designer ON ad.designer_id = designer.designer_id
                INNER JOIN category_level_2 ON ad.category_level_2_id = category_level_2.category_level_2_id
                INNER JOIN category_level_1 ON category_level_2.category_level_1_id = category_level_1.category_level_1_id 
                INNER JOIN manufacturer ON ad.manufacturer_id = manufacturer.manufacturer_id
                WHERE ".$cond."
                ORDER BY ad_title ASC;";

    return requeteResultat($sql);
}