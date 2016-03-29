<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 3/29/2016
 * Time: 10:00 PM
 */

namespace src\lib\triporg\modules\boardingCard;


use src\lib\triporg\utils\traits\SortOrderN2;

class BoardingCard {
    use SortOrderN2;


    public $boardingCardObjList;

    /**
     * Getting all the boarding cards
     * @return mixed
     */
    public function getBoardingCardObjList() {
        return $this->boardingCardObjList;
    }

    /**
     * Setting all the boarding cards
     * @param mixed $boardingCardObjList
     */
    public function setBoardingCardObjList($boardingCardObjList) {
        $this->boardingCardObjList = $boardingCardObjList;
    }


    /**
     * getSortArray will except an unsorted array  of boarding cards and return a sorted array of boarding cards
     * getSortArray will return an error code in case of an error : error[] = 1 invalid array of boarding cards
     * @return mixed
     *
     */

    public function getSortedArray($unsortedArray = array()) {

        $sortedArray = $this->GeneralSort($unsortedArray);

        if (isset($sortedArray['error'])) {
            return $sortedArray['error'];
        }


        return $sortedArray;


    }

}