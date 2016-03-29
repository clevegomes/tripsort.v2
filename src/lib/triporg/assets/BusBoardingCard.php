<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 */

namespace src\lib\triporg\assets;

/**
 * Specific boarding card for bus
 * Class BusBoardingCard
 * @package src\lib\triporg\assets
 */
class BusBoardingCard extends tripAbstract {


    private $boardingCardDetails = "";
    private $passengerName;
    private $description;


    /**
     * @param mixed $description Set the description for the Bus service
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed  Returns the description for the bus service
     */
    public function getDescription() {
        return $this->description;
    }

    private $bookingNo;
    private $busServiceName;

    /**
     * @param mixed $busServiceName Set the name of the bus service.
     */
    public function setBusServiceName($busServiceName) {
        $this->busServiceName = $busServiceName;
    }

    /**
     * Get the card details that is to be printed
     */
    public function getCardDetails() {
        $this->boardingCardDetails = " ======================================================================= \n";
        $this->boardingCardDetails .= "**" . $this->busServiceName . " Bus Service ** \n";
        $this->boardingCardDetails .= "Language :" . $this->getSelLanguage() . "\n";
        $this->boardingCardDetails .= "Name of Passenger: " . $this->passengerName . "\n";
        $this->boardingCardDetails .= "From City: " . $this->getDepartureLocationCity() . "\n";
        $this->boardingCardDetails .= "To City: " . $this->getArrivalLocationCity() . "\n";
        $this->boardingCardDetails .= "Booking No: " . $this->bookingNo . "\n";
        $this->boardingCardDetails .= "Description: " . $this->getDescription() . "\n";
        $this->boardingCardDetails .= " ======================================================================= \n";

        return $this->boardingCardDetails;
    }


    /**
     *
     * @param string $passengerName Set the passenger name
     */
    public function setPassengerName($passengerName) {
        $this->passengerName = $passengerName;
    }

    /**
     *
     * @param mixed $bookingNo Set the booking No
     */
    public function setBookingNo($bookingNo) {
        $this->bookingNo = $bookingNo;
    }


    /**
     * @return string  Returns the card details in few lines
     */
    public function getShortCardDetails() {
        $this->boardingCardDetails = $this->getDescription() . "\n";

        return $this->boardingCardDetails;
    }


}

//</code>