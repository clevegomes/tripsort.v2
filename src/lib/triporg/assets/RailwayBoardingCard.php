<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 */

namespace src\lib\triporg\assets;

/**
 * Specific boarding card for Railway
 * Class RailwayBoardingCard
 * @package src\lib\triporg\assets
 */
class RailwayBoardingCard extends tripAbstract {


    private $passengerName;
    private $route;
    private $BoardingDate;
    private $BoardingTime;
    private $carNo;
    private $seatType;
    private $seatNo;
    private $railRoadName;
    private $boardingCardDetails;
    private $details;

    /**
     * @param mixed $details Set the details about the railway route
     */
    public function setDetails($details) {
        $this->details = $details;
    }

    /**
     * @param mixed $railRoadName Sets the name of the rail road company
     */
    public function setRailRoadName($railRoadName) {
        $this->railRoadName = $railRoadName;
    }

    /**
     * @param mixed $BoardingDate Sets the boarding date on the  train
     */
    public function setBoardingDate($BoardingDate) {
        $this->BoardingDate = $BoardingDate;
    }

    /**
     * @param mixed $BoardingTime Sets the boading time on the train
     */
    public function setBoardingTime($BoardingTime) {
        $this->BoardingTime = $BoardingTime;
    }

    /**
     * @param mixed $carNo Sets the Car number  for the seat on the train
     */
    public function setCarNo($carNo) {
        $this->carNo = $carNo;
    }

    /**
     * @param mixed $route Sets the route the train will be taking
     */
    public function setRoute($route) {
        $this->route = $route;
    }

    /**
     * @param mixed $seatNo Sets the seat no on the train
     */
    public function setSeatNo($seatNo) {
        $this->seatNo = $seatNo;
    }

    /**
     * @param mixed $seatType Sets the type ie open seat or reserved seat
     */
    public function setSeatType($seatType) {
        $this->seatType = $seatType;
    }

    /**
     * @param mixed $passengerName Sets the name of the passenger
     */
    public function setPassengerName($passengerName) {
        $this->passengerName = $passengerName;
    }


    /**
     *  Get the card details that is to be printed
     */
    public function getCardDetails() {
        $this->boardingCardDetails = "================================================\n";
        $this->boardingCardDetails .= "**" . $this->railRoadName . " Railway Service ** \n";
        $this->boardingCardDetails .= "Route:" . $this->route . "\n";
        $this->boardingCardDetails .= "Name of Passenger:" . $this->passengerName . "\n";
        $this->boardingCardDetails .= "From City:" . $this->getDepartureLocationCity() . "\n";
        $this->boardingCardDetails .= "To City:" . $this->getArrivalLocationCity() . "\n";
        $this->boardingCardDetails .= "Booking Date/time:" . $this->BoardingDate . "/" . $this->BoardingTime . "\n";
        $this->boardingCardDetails .= "Car No:" . $this->carNo . "\n";
        $this->boardingCardDetails .= "Seat Type:" . $this->seatType . "\n";
        $this->boardingCardDetails .= "Seat No:" . $this->seatNo . "\n";
        $this->boardingCardDetails .= "Details:" . $this->details . "\n";
        $this->boardingCardDetails .= "================================================\n";

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