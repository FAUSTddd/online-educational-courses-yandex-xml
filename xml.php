<?php require_once("inc/controller.php");
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
    <yml_catalog date="'.$Shop->getDateYml().'">
        <shop>';?>
            <name><?=$Shop->getName()?></name>
            <url><?=$Shop->getUrl()?></url>
            <email><?=$Shop->getEmail()?></email>
            <picture><?=$Shop->getPicture()?></picture>
            <currencies>
                <?php
                    foreach ($Shop->getCurrencies() as $currency) {?>
                        <currency id="<?=$currency['id']?>" rate="<?=$currency['rate']?>" />
                    <?php }?>
            </currencies>
            <sets>
                <?php
                foreach ($Shop->getSets() as $set) {?>
                  <set id="<?=$set['id']?>">
                      <name><?=$set['name']?></name>
                      <url><?=$set['url']?></url>
                  </set>
               <?php }?>
            </sets>
            <offers>
                <?php
                foreach ($Shop->getOffers() as $offer) {?>
                    <offer id="<?=$offer->getId()?>">
                        <name><?=$offer->getName()?></name>
                        <url><?=$offer->getUrl()?></url>
                        <categoryId>1000</categoryId>
                        <set-ids><?=$offer->getSetIds()?></set-ids>
                        <price><?=$offer->getPrice()?></price>
                        <currencyId>RUR</currencyId>
                        <picture><?=$offer->getPicture()?></picture>
                        <description><?=$offer->getDescription()?></description>
                    </offer>
                <?php }?>
            </offers>



<?php echo   '</shop>
    </yml_catalog>';
?>