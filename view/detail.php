<?php
// var_dump($article);
$article_ad_id = $article[0]['ad_id'];
$article_ad_title = $article[0]['ad_title'];
$article_ad_description = $article[0]['ad_description'];
$article_price = $article[0]['price'];
$article_is_visible = $article[0]['is_visible'];
$article_ad_description_detail = $article[0]['ad_description_detail'];
$article_level_2 = $article[0]['level_2'];
$article_level_1 = $article[0]['level_1'];


?>

<div id='search' class='u-full-width'>
    <div id="trail" class="container row">
        <ul>
            <li>Vous êtes ici :</li>
            <li><a href='' title=''><?= $article_level_1; ?></a></li>
            <li><a href='' title=''><?= $article_level_2; ?></a></li>
            <li><?= $article_ad_title; ?></li>
        </ul>
    </div>
</div>

<section id="photostack-1" class="photostack photostack-start u-full-width">
    <div>
        <?php
        for ($i = 1; $i <=10; $i++) {
            ?>
            <figure>
                <img src="upload/thumb/thumb_<?= $article_ad_id; ?>-<?= $i ?>.jpg" alt=""/>
                <figcaption>
                    <h2 class="photostack-title"><?= $article_ad_title; ?></h2>
                </figcaption>
            </figure>
            <?php

        }
        ?>


<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---10.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---2.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---3.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---4.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---5.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---6.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---7.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---8.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
<!---->
<!--        <figure>-->
<!--            <img src="upload/thumb/thumb_--><?//= $article_ad_id; ?><!---9.jpg" alt=""/>-->
<!--            <figcaption>-->
<!--                <h2 class="photostack-title">--><?//= $article_ad_title; ?><!--</h2>-->
<!--            </figcaption>-->
<!--        </figure>-->
    </div>
</section>

<section class="container" id="detail_ad">
    <h1><?= $article_ad_title; ?></h1>
    <p id="short-description"><?= $article_ad_description; ?></p>
    <p id="long-description">
        <?= nl2br($article_ad_description_detail); ?>
    </p>
</section>
