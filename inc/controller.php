<?php
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
require_once("OfferEducationalYandexYml.php");

$ProductWooCommerce = wc_get_product(162534);
$Offer = new OfferEducationalYandexYml();
$Offer->generateFromWooCommerceProduct($ProductWooCommerce);
echo $Offer->getUrl();
