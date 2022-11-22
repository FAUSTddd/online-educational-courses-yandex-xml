<?php
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
require_once("class/OfferEducationalYandexYml.php");
require_once("class/ShopEducationalYandexYml.php");

$url = get_bloginfo('url');
$Shop = new ShopEducationalYandexYml();
$Shop->setName(get_bloginfo('name'));
$Shop->setUrl($url);
$Shop->setEmail(get_bloginfo('admin_email'));
$Shop->setPicture($url . '/wp-content/uploads/fid-yml/urib.png');
$Shop->addCurrencies(["id" => "RUR", "rate" => "1"]);

$args = ['limit' => 10000];
$WooProducts = wc_get_products( $args );
foreach ( $WooProducts as $WooProduct) {
    $Offer = new OfferEducationalYandexYml();
    $Offer->generateFromWooCommerceProduct($WooProduct);
    $Shop->addOffer($Offer);

    $id_cats = $WooProduct->get_category_ids();
    foreach ($id_cats as $id_cat) {
        $category_term = get_term_by( 'id', $id_cat, 'product_cat', 'ARRAY_A' );
        $category_name = $category_term['name'];
        $category_url = get_term_link( (int)$id_cat, 'product_cat' );
        $Shop->addSets(["id" => $id_cat, "name" => $category_name, "url" => $category_url]);
    }
}


