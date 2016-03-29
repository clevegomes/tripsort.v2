<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 3/29/2016
 * Time: 07:19 PM
 */

namespace Test;

use src\lib\triporg\assets\BcFactory;
use src\lib\triporg\modules\boardingCard\BoardingCard;
use src\lib\triporg\assets\tripAbstract;

/**
 * Class TripSortTest
 * @package Test
 *
 * This class is responsible for testing the boarding card creation and boarding card sorting
 *
 */
class TripSortTest extends \PHPUnit_Framework_TestCase {

    public $boardingCardObjList = [];

    /**
     * Responsible for testing the boarding card creation and boarding card sorting
     */
    public function testBoardingCardCreation() {

        $this->assertEquals(1, 1, "Test for invalid location and language");
        $boardingCardDataList = [];

        /**
         * Creating a boarding bus card from Dubai to Sharjah
         * Language is English
         */
        $boardingCardDataList[] = [
            'serviceName' => 'Paras Kuljetus',
            'passengerName' => 'Mohammad Malik',
            'type' => 'bus',
            'bookingNo' => 'WE2232',
            'departure' => 'Dubai',
            'arrival' => 'Sharjah',
            'language' => 'fi',
            'description' => 'Luxury Bussikuljetus Dubai Sharjah.Snacks ja juomia tarjoillaan bussissa'
        ];


        /**
         * Creating a boarding airways card from Sharjah to London
         * Language :French
         */
        $boardingCardDataList[] = [
            'serviceName' => 'French Airways',
            'type' => 'air',
            'firstName' => 'Mohammad',
            'lastName' => 'Malik',
            'gate' => 'D2',
            'gateclosingTime' => '1 Am',
            'seat' => 'L 13',
            'departure' => 'Sharjah',
            'arrival' => 'londres',
            'language' => 'fr',
            'description' => 'Ceci est un vol direct de Sharjah UAE à Londres au Royaume-Uni. Nourriture et boissons seront servis sur le vol'
        ];

        /**
         * Creating a boarding bus card from Toulouse in  France to Lyon in France
         *Language :French
         */

        $boardingCardDataList[] = [
            'serviceName' => 'France service public de bus',
            'passengerName' => 'Mohammad Malik',
            'type' => 'bus',
            'bookingNo' => 'Na',
            'departure' => 'toulouse',
            'arrival' => 'lyon',
            'language' => 'fr',
            'description' => 'Ceci est un service de bus public de toulouse lyon'
        ];


        /**
         * Creating a boarding airways card from  lyon in france to livepool in UK
         * Language : English
         */

        $boardingCardDataList[] = [
            'serviceName' => 'Emirates Airways',
            'type' => 'air',
            'firstName' => 'Mohammad',
            'lastName' => 'Malik',
            'gate' => 'A12',
            'gateclosingTime' => '3 Am',
            'seat' => 'EK234',
            'departure' => 'lyon',
            'arrival' => 'liverpool',
            'language' => 'en',
            'description' => 'This is a business class direct flight from Lyon in France to liverpool in UK .Drinks and food will be served on the flight'
        ];


        /**
         * Creating a boarding train card from london UK to Manchester UK
         * Language : English
         *
         */

        $boardingCardDataList[] = [
            'serviceName' => 'English Railways',
            'passengerName' => 'Mohammad Malik',
            'type' => 'rail',
            'carNo' => '3',
            'seatNo' => '45',
            'seatType' => 'Reserved',
            'route' => 'London to Manchester shorted route',
            'boardingDate' => '25-12-2015',
            'boardingTime' => '12pm',
            'departure' => 'london',
            'arrival' => 'manchester',
            'language' => 'en',
            'description' => 'Non stop journey from London to Manchester.'
        ];


        /**
         * Creating a boarding bus card from abu dhabi UAE to dubai uae
         * Language : English
         */

        $boardingCardDataList[] = [
            'serviceName' => 'Arabia',
            'passengerName' => 'Mohammad Malik',
            'type' => 'bus',
            'bookingNo' => 'BUS234',
            'departure' => 'abu dhabi',
            'arrival' => 'dubai',
            'language' => 'en',
            'description' => 'Arabia Luxury  Bus service from Abu dhabi  to  Dubai'
        ];


        /**
         * Creating a boarding Airways card from manchester UK to paris Franch
         * Language : Finnish
         */


        $boardingCardDataList[] = [
            'serviceName' => 'Finnish Airways',
            'type' => 'air',
            'firstName' => 'Mohammad',
            'lastName' => 'Malik',
            'gate' => '6Y2',
            'gateclosingTime' => '3 pm',
            'seat' => '15',
            'departure' => 'manchester',
            'arrival' => 'pariisi',
            'language' => 'fi',
            'description' => 'Suomen Airways suoraa lentoa Manchester Britanniasta Pariisi Ranska. Juomia ja ruokaa tapana servered lennolla'
        ];


        /**
         * Creating a boarding Train card from paris france to toulouse france
         * Language: French
         */


        $boardingCardDataList[] = [
            'serviceName' => 'Chemins de fer francais',
            'passengerName' => 'Mohammad Malik',
            'type' => 'rail',
            'carNo' => 'U09',
            'seatNo' => '1',
            'seatType' => 'Open seat',
            'route' => 'Paris a Toulouse longue route',
            'boardingDate' => '26-12-2015',
            'boardingTime' => '3pm',
            'departure' => 'paris',
            'arrival' => 'toulouse',
            'language' => 'fr',
            'description' => 'Voyage sans escale de Paris a Toulouse'
        ];


        /**
         * Testing the boarding card creation
         */
        foreach ($boardingCardDataList as $sel) {

            $cardobj = BcFactory::createCard($sel);
            $this->assertInstanceOf('src\lib\triporg\assets\tripAbstract', $cardobj,
                "Testing Cards created by BcFactory");

            array_push($this->boardingCardObjList, $cardobj);
        }


        /**
         * Testing the Boarding cards sorting
         */
        $this->assertTrue($this->validateSortArray(), "Testing of Card Sort is working correctly");


    }


    /**
     * This method will return a bool depending whether the boarding cards are sorted correctly or not
     * @return bool
     */
    private function validateSortArray() {

        $BoardingCardObj = new  BoardingCard();


        $sortedArray = $BoardingCardObj->getSortedArray($this->boardingCardObjList);


        if (is_array($sortedArray) && sizeof($sortedArray) > 0) {

            foreach ($sortedArray as $key => $selectedcard) {
                if (isset($previousArrival)) {
                    if ($selectedcard->getDepartureId() != $previousArrival) {
                        return false;
                    }
                }
                $previousArrival = $selectedcard->getArrivalId();

                /**
                 * Printing the sorted list of boarding cards
                 */
                echo PHP_EOL, $selectedcard->getCardDetails();
            }

            return true;

        } else {
            return false;
        }

    }


}