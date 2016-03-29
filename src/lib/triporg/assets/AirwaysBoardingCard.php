<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 */

namespace src\lib\triporg\assets;

/**
 * Specific boarding card for Airways
 * Class AirwaysBoardingCard
 * @package src\lib\triporg\assets
 */
class AirwaysBoardingCard extends tripAbstract {


    private $gate;
    private $gateclosingTime;
    private $seat;
    private $boardingCardDetails = "";
    private $firstname;
    private $lastname;
    private $details;
    private $aiwaysDetails;

    /**
     * @param mixed $aiwaysDetails set the details about the airways
     */
    public function setAiwaysDetails($aiwaysDetails) {
        $this->aiwaysDetails = $aiwaysDetails;
    }

    /**
     * @param mixed $details set the details about the flight
     */
    public function setDetails($details) {
        $this->details = $details;
    }


    /**
     * Set the passengers first name
     * @param string $firstname
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * Set the passengers last name
     * @param string $lastname
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    /**
     * Set the Gate no code
     * @param String $gate
     */
    public function setGate($gate) {
        $this->gate = $gate;
    }

    /**
     * Set the time the gate will close
     * @param string $gateclosingTime
     */
    public function setGateclosingTime($gateclosingTime) {
        $this->gateclosingTime = $gateclosingTime;
    }

    /**
     * Set the seat alpha numeric number
     * @param string $seat
     */
    public function setSeat($seat) {
        $this->seat = $seat;
    }


    /*
     * Get the card details that is to be printed
     */
    public function getCardDetails() {
        $this->boardingCardDetails = " ====================================================================\n";
        $this->boardingCardDetails .= "**$this->aiwaysDetails** \n";
        $this->boardingCardDetails .= "Language:" . $this->getSelLanguage() . "\n";
        $this->boardingCardDetails .= "Passenger Details:" . $this->firstname . " " . $this->lastname . "\n";
        $this->boardingCardDetails .= "From City: " . $this->getDepartureLocationCity() . "\n";
        $this->boardingCardDetails .= "To City: " . $this->getArrivalLocationCity() . "\n";
        $this->boardingCardDetails .= "Gate No:" . $this->gate . "\n";
        $this->boardingCardDetails .= "Gate closing time:" . $this->gateclosingTime . "\n";
        $this->boardingCardDetails .= "Seat No:" . $this->seat . "\n";
        $this->boardingCardDetails .= "Description:" . $this->details . "\n";
        $this->boardingCardDetails .= " ====================================================================\n";


        return $this->boardingCardDetails;
    }

    /**
     * @return string  Returns the card details in few lines
     */
    public function getShortCardDetails() {
        $this->boardingCardDetails = $this->details . "\n";

        return $this->boardingCardDetails;
    }

}

//</code>