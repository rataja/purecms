<?php

namespace Rataja\pfcms;

/**
 *
 * @version 2.0
 * @copyright 2020
 * @name Microdata
 * @link https://developers.google.com/search/docs/guides/intro-structured-data
 * @link https://ondrejmeier.cz/strukturovana-data-seo-navod/
 */
class Microdata {

    /**
     *
     * @var <array> 
     */
    private $script = [];

    public function __construct() {
        $this->setContext("http://schema.org");
        $this->setType("Product");
    }

    /**
     * 
     * @param <string> static http://schema.org
     */
    private function setContext($context) {
        $this->script["@context"] = $context;
    }

    /**
     * 
     * @param <string> static Product
     */
    private function setType($type) {
        $this->script["@type"] = $type;
    }

    /**
     * Name of the product
     * @param <string> $name
     */
    public function setName($name) {
        $this->script["name"] = $name;
    }

    /**
     * Full path for the image
     * @param <string> $image
     */
    public function setImage($image) {
        $this->script["image"] = $image;
    }

    /**
     * Description of the product
     * @param <string> $description
     */
    public function setDescription($description) {
        $this->script["description"] = $description;
    }

    /**
     * Brand of the product
     * @param <string> $brand
     */
    public function setBrand($brand) {
        $this->script["brand"] = $brand;
    }

    /**
     * URL of the product
     * @param <string> $url
     */
    public function setUrl($url) {
        $this->script["url"] = $url;
    }

    /**
     * Valid price to %Y-%m-%d (2030-12-31)
     * @param <date> $priceValidUntil
     */
    public function setPriceValidUntil($priceValidUntil) {
        $this->script["PriceValidUntil"] = $priceValidUntil;
    }

    /**
     * 
     * @param <string> $bestRating
     * @param <string> $ratingCount
     * @param <string> $ratingValues
     */
    public function setAggregateRating($bestRating, $ratingCount, $ratingValues) {
        $this->script["aggregateRating"]["@type"] = "AggregateRating";
        $this->script["aggregateRating"]["bestRating"] = (string) $bestRating;
        $this->script["aggregateRating"]["ratingCount"] = (string) $ratingCount;
        $this->script["aggregateRating"]["ratingValue"] = (string) $ratingValues;
    }

    /**
     * 
     * @param <tring> $price
     * @param <string> $currency
     */
    public function setOffers($price, $currency) {
        $this->script["offers"]["@type"] = "Offer";
        $this->script["offers"]["Price"] = (string) $price;
        $this->script["offers"]["PriceCurrency"] = (string) $currency;
        $this->script["offers"]["Availability"] = "https://schema.org/InStock";
    }

    /**
     * Script will be printed 
     */
    public function getScript() {
        $script = '<script type="application/ld+json">';
        $script .= json_encode($this->script, JSON_PRETTY_PRINT);
        $script .= '</script>';
        echo $script;
    }

}
