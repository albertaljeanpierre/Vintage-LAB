<?php
include_once 'lib/article.php';

$page_view = "detail";

$get_id = isset($_GET["id"]) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS) : 1;

$article = getArticle($get_id);