<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 */

namespace src\lib\triporg\assets;

/**
 * Interface tripInterface defines all the methods that need to exist in every Type of Card Class
 */
interface tripInterface {
    /**
     * Get the card details .It may be different for different types of cards.
     */
    public function getCardDetails();


    /**
     * Get the card details in few lines  .It may be different for different types of cards.
     */
    public function getShortCardDetails();

    /**
     *
     * @param  string $location Name of the location
     * @param  string $lg Language code
     *
     */
    public function setArrivalLocation($location, $lg);


    /**
     * @param string $location Name of the location
     * @param  string $lg Language code
     *
     */
    public function setDepartureLocation($location, $lg);


    /**
     * Get the arrival id
     * @return int
     */
    public function getArrivalId();

    /**
     *Get the departure id
     * @return int
     */
    public function getDepartureId();


}

//</code>