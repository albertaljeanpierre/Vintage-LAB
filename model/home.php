<?php
include_once 'lib/articles.php';

$get_page     = isset($_GET["page"])    ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS)      : 1 ;

/// nombre d'article par page
const NB_ARTICLE = 30; 



$page_view = "home";
$articles = getArticlesPage(NB_ARTICLE, $get_page ); 

//$sql = "SELECT * FROM `ad` LIMIT 6 OFFSET 0";
//$articles = requeteResultat($sql); 


// var_dump($articles); 