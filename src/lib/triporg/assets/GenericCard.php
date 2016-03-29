<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 3/29/2016
 * Time: 08:33 PM
 */

namespace src\lib\triporg\assets;

/**
 * This is a generic card that will be used for any boarding card that are not defined.
 * Class GenericCard
 * @package src\lib\triporg\assets
 *
 */
class GenericCard extends tripAbstract {

    /**
     * Display card details.
     */
    public function getCardDetails() {
        return "This is a Generic card that is in " . $this->getSelLanguage() . ". It starts from City:" . $this->getDepartureLocationCity() . "and ends in city " . $this->getArrivalLocationCity();
    }

    /**
     * Methods need to be defined in the different card classes
     */
    public function getShortCardDetails() {
        return "This is a Generic card that is in " . $this->getSelLanguage() . ". It starts from City:" . $this->getDepartureLocationCity() . "and ends in city " . $this->getArrivalLocationCity();

    }
}