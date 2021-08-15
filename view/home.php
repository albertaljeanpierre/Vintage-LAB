<div id='search' class='u-full-width'>
    <div id="trail" class="container row">
        <ul>
            <li>Vous êtes ici :</li>
            <li>Page d'accueil</li>
        </ul>
    </div>
</div>
<section class="container">

    <?php
//    var_dump($articles[0]);
    $compteur = 0;
    foreach ($articles as $article) {
        $article_id = $article['ad_id'];
//        $article_sous_cat_id = $article['category_level_2_id'];
//        $article_admin_id = $article['admin_id'];
//        $article_shape_id = $article['shape_id'];
//        $article_designer_id = $article['designer_id'];
//        $article_manufacturer_id = $article['manufacturer_id'];
//        $article_description = $article['ad_description'];
//        $article_description_detail = $article['ad_description_detail'];
        $article_prix = $article['price'];
        $article_prix = number_format($article_prix, 2, ',', '.');
//        $article_prix_htva = $article['price_htva'];
//        $article_prix_tva = $article['amount_tva'];
//        $article_prix_delivrer = $article['price_delivery'];
//        $article_date_ajout = $article['date_add'];
        $is_visible = $article['is_visible'];
//        $is_disponible = $article['is_disponible'];
        $article_description = $article['ad_description'];
        $article_description = substr($article_description , 0, 100);;
        $article_designer = ($article['designer'] == " ") ? "- non précisé -" : $article['designer'];
        $article_manufacturer = empty($article['manufacturer']) ? "- non précisé -" : $article['manufacturer'];
        $article_ad_title = $article['ad_title'];


        /// NOTE : il faut jouer avec un %3 pour écrire la div de class row avec 3 articles dedans.

        if ($compteur %3 == 0) {
            echo "<div class='row'>";
        }

        ?>
        <!-- début du 1er bloc "article" -->
        <article class="pres_product four columns border">
            <div class="thumb">
                <a href="./?p=detail&id=<?= $article_id; ?>" title="">
                    <span class="rollover"><i>+</i></span>
                    <img src="upload/thumb/thumb_<?= $article_id; ?>-1.jpg" alt=""/>
                </a>
            </div>
            <header>
                <h4><a href="./?p=detail&id=<?= $article_id; ?>" title="<?= $article_ad_title; ?>"><?= $article_ad_title; ?></a></h4>
                <div class="subheader">
                    <span class="fa fa-bars"></span> <a href="" title=""></a>
                    <span class="separator">|</span>
                    <span class="fa fa-pencil"></span> <a href="" title=""><?= $article_designer ; ?></a>
                    <span class="separator">|</span>
                    <span class="fa fa-building-o"></span> <a href="" title=""><small style="opacity:.5;"><?= $article_manufacturer  ; ?></small></a>
                </div>
            </header>
            <div class="une_txt">
                <p>
                    <?= $article_description; ?>
                    <a href="./?p=detail&id=<?= $article_id; ?>" title="">[...]</a>
                    <b><?= $article_prix; ?> €</b>
                </p>
            </div>
        </article>

        <?php
        if (($compteur+1) %3 == 0) {
            echo "</div>";
        }
        $compteur++;
        }
    ?>


</section>
