<?php

class OfferEducationalYandexYml
{
    /**
     * @var int
     */
    private $id = 0;
    /**
     * Название предложения. Должно быть уникальным. Если курсы имеют одинаковые названия, то в name укажите разницу между ними, например, Курс Java. Уровень 1, Курс Java. Уровень 2.
     * @var string
     */
    private $name = '';
    /**
     * URL-адрес предложения. Должен быть уникальным среди всех предложений в пределах всех фидов одного и того же региона. Метки (например, UTM, Openstat, from) не делают URL уникальным.
     * @var string
     */
    private $url = '';
    /**
     * Идентификатор основной категории курса из рубрикатора курсов.
     * @var int
     */
    private $categoryId = 0;
    /**
     * Идентификаторы сетов. Можно перечислить несколько сетов через запятую, например: s1,s2,s3.
     * @var string
     */
    private $set_ids = '';
    /**
     * Стоимость за весь курс. Если фиксированная цена за курс отсутствует, то значение 0. Если значение 0 и не указана ежемесячная цена, то курс считается бесплатным.
     * @var float
     */
    private $price = 0.0;
    /**
     * Идентификатор валюты. Например, RUR для рублей.
     * @var string
     */
    private $currencyId = 'RUB';
    /**
     * Ссылка на логотип курса.
     * @var string
     */
    private $picture = '';
    /**
     * Описание.
     * @var string
     */
    private $description = '';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Задает Имя для offer
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getSetIds()
    {
        return $this->set_ids;
    }

    /**
     * @param array $set_ids
     */
    public function setSetIds($set_ids)
    {
        $this->set_ids = '';
        if ($set_ids && !empty($set_ids)){
            $this->set_ids = implode(',', $set_ids);
        }
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $shotcodes_tags = array( 'vc_row', 'vc_column', 'vc_column', 'vc_column_text', 'vc_message', 'vc_custom_heading', 'vc_single_image', 'quform_popup', 'button', 'quform' );
        $desc = preg_replace( '/\[(\/?(' . implode( '|', $shotcodes_tags ) . ').*?(?=\]))\]/', ' ', $description );
        $desc = str_replace('&nbsp;', '', $desc);

        $this->description = $desc;
    }

    public function generateFromWooCommerceProduct($Product)
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        $this->setId($Product->get_id());
        $this->setName($Product->get_name());
        $this->setUrl($Product->get_permalink());
        $this->setCategoryId(1000);
        $this->setSetIds($Product->get_category_ids());
        $this->setPrice($Product->get_price());
        $this->setDescription(strip_tags($Product->get_description()));
        $this->setPicture(wp_get_attachment_url($Product->get_image_id()));
    }


}