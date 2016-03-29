<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 3/29/2016
 * Time: 08:03 PM
 */

namespace src\lib\triporg\assets;

/**
 * Class BcFactory
 * @package src\lib\triporg\assets
 *
 * This boarding card factory class is responsible to manufacture the correct card type
 */
abstract class BcFactory {

    /**
     * Static Create Card method .Responsible to manufacture the boarding cards
     * @param $bc
     * @return null|BusBoardingCard|GenericCard|RailwayBoardingCard
     */
    public static function createCard($bc) {


        /**
         * if card is not defined use the generic card
         */

        if (!isset($bc['type'])) {
            $GenericCard = new GenericCard($bc);
            $GenericCard->setDepartureLocation($bc['departure'], $bc['language']);
            $GenericCard->setArrivalLocation($bc['arrival'], $bc['language']);

            return $GenericCard;

        } else {
            /*
             * if card type is defined then create the specific card
             */

            if ($bc['type'] == 'bus') {

                $BusCard = new BusBoardingCard();
                $BusCard->setBusServiceName($bc['serviceName']);
                $BusCard->setPassengerName($bc['passengerName']);
                $BusCard->setBookingNo($bc['bookingNo']);
                $BusCard->setDepartureLocation($bc['departure'], $bc['language']);
                $BusCard->setArrivalLocation($bc['arrival'], $bc['language']);
                $BusCard->setDescription($bc['description']);

                return $BusCard;
            } else {
                if ($bc['type'] == 'air') {

                    $AirCard = new AirwaysBoardingCard();
                    $AirCard->setAiwaysDetails($bc['serviceName']);
                    $AirCard->setFirstname($bc['firstName']);
                    $AirCard->setLastname($bc['lastName']);
                    $AirCard->setGate($bc['gate']);
                    $AirCard->setGateclosingTime($bc['gateclosingTime']);
                    $AirCard->setSeat($bc['seat']);
                    $AirCard->setDepartureLocation($bc['departure'], $bc['language']);
                    $AirCard->setArrivalLocation($bc['arrival'], $bc['language']);
                    $AirCard->setDetails($bc['description']);

                    return $AirCard;

                } else {
                    if ($bc['type'] == 'rail') {
                        $RailCard = new RailwayBoardingCard();
                        $RailCard->setRailRoadName($bc['serviceName']);
                        $RailCard->setPassengerName($bc['passengerName']);
                        $RailCard->setSeatNo($bc['seatNo']);
                        $RailCard->setCarNo($bc['carNo']);
                        $RailCard->setSeatNo($bc['seatNo']);
                        $RailCard->setSeatType($bc['seatType']);
                        $RailCard->setRoute($bc['route']);
                        $RailCard->setBoardingDate($bc['boardingDate']);
                        $RailCard->setBoardingTime($bc['boardingTime']);
                        $RailCard->setDepartureLocation($bc['departure'], $bc['language']);
                        $RailCard->setArrivalLocation($bc['arrival'], $bc['language']);
                        $RailCard->setDetails($bc['description']);

                        return $RailCard;
                    } else {

                        return null;
                    }
                }
            }

        }

    }

}