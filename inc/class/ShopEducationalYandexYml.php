<?php

class ShopEducationalYandexYml
{
    /**
     * Краткое название площадки. Не больше 30 символов.
     * @var string
     */
    private $name = '';

    /**
     * URL-адрес площадки.
     * @var string
     */
    private $url = '';
    /**
     * Адрес электронной почты для обращения по вопросам онлайн-курсов.
     * @var string
     */
    private $email = '';
    /**
     * Логотип площадки. Требования:
     * Минимальный размер — 100×100 пикселей (квадрат).
     * Формат PNG или SVG.
     * Логотип может быть на фоне любого цвета. Не нужно дополнительно вписывать логотип в круг.
     * Если логотип на белом фоне, максимально заполните площадь картинки логотипом. Это поможет повысить узнаваемость бренда площадки.
     * @var string
     */
    private $picture = '';

    /**
     * Описание площадки для отображения на карточке площадки.
     * @var string
     */
    private $description = '';
    /**
     * Список валют, в которых указаны цены курсов.
     * По умолчанию цены указываются в рублях (currency id="RUR" rate=“1”).
     * Чтобы передать другие валюты, укажите курс обмена, который вы используете, в качестве значения атрибута rate.
     * @var array
     */
    private $currencies = [];
    /**
     * Наборы курсов, которые описываются через название и url.
     * Чтобы указать, какие курсы входят в набор, используйте элемент set-ids внутри элемента offer.
     * @var array
     */
    private $sets = [];

    /**
     * Список товаров (курсов)
     * @var array
     */
    private $Offers = [];
    /**
     * Дата формирования файла
     * @var string
     */
    private $date_yml = '';

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @param array $currencies
     */
    public function addCurrencies($currencies)
    {
        $this->currencies[] = $currencies;
    }

    /**
     * @return array
     */
    public function getSets()
    {
        return $this->sets;
    }

    /**
     * @param array $set
     */
    public function addSets($set)
    {
        if ($set && !empty($set)) {
            $this->sets[$set["id"]] = $set;
        }
    }

    /**
     * @return array
     */
    public function getOffers()
    {
        return $this->Offers;
    }

    /**
     * @param $Offers
     */
    public function addOffer($Offer)
    {
        $this->Offers[] = $Offer;
    }

    /**
     * @return string
     */
    public function getDateYml()
    {
        if (empty($this->date_yml)){
            $textT = 'T';
            $this->date_yml = date('Y-m-d') . $textT .date('G:i');
        }
        return $this->date_yml;
    }

    /**
     * @param string $date_yml
     */
    public function setDateYml($date_yml)
    {
        $this->date_yml = $date_yml;
    }



}