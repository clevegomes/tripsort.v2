<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 3/29/2016
 * Time: 10:08 PM
 */


namespace src\lib\triporg\utils\traits;

use src\lib\triporg\assets\tripAbstract;

trait SortOrderN2 {


    /**
     * This general sort is a modification of a bubble sort. Here every next sorted element tends to bubble to the top.
     * Here the best case is the Boarding cards get sorted in the first iteration.
     * Worst case boarding cards get sorted in n (n-1) =n2 iterations.
     * Best->n,Avg->n2,Worst->n2
     * @param tripAbstract $unsortedArray . This is an unsorted list of Boarding cards
     * @return tripAbstract array . Returns a sorted list of boarding cards
     */
    public function GeneralSort($unsortedArray) {


        try {
            if (!is_array($unsortedArray) || sizeof($unsortedArray) == 0) {
                throw new \Exception(1);
            }


            foreach ($unsortedArray as $selelement) {
                if (!($selelement instanceof tripAbstract)) {
                    throw new \Exception(1);
                }
            }


            //all ids of list that need to be ignored
            $ignoreList = [];
            $sizeOfsortedArry = sizeof($unsortedArray);


            $i = 0;
            //Getting the first and last element in the current list
            $lastOfi = $firstOfi = $unsortedArray[$i];

            //Current sorted list
            $currentSortArry[] = $unsortedArray[$i];
            /**
             * Come back for second pass of merge was made
             */
            do {
                $mergeflag = false;

                //iterating to the  full sorted list to see if the current sorted list can be merged
                for ($j = 0; $j < $sizeOfsortedArry; $j++) {
                    // proceed only if the selected sorted list was not processed before or if the selected sorted list is not same as the current sorted list
                    if (($i != $j) && !in_array($j, $ignoreList)) {
                        //Getting the first and last element of the selected sorted list
                        $lastOfj = $firstOfj = $unsortedArray[$j];

                        // The first of i compare with the last of i
                        if ($firstOfi->getDepartureId() == $lastOfj->getArrivalId()) {
                            /**
                             * Append to start
                             */
                            array_unshift($currentSortArry, $unsortedArray[$j]);

                            // Changing the first element in the current sorted list
                            $firstOfi = $unsortedArray[$j];
                            $ignoreList[] = $j;
                            $mergeflag = true;
                        } // The last of i compare with the first of j
                        else {
                            if ($lastOfi->getArrivalId() == $firstOfj->getDepartureId()) {
                                /**
                                 * Append to end
                                 */
                                $currentSortArry[] = $unsortedArray[$j];

                                // Changing ghe last element in the current sort list
                                $lastOfi = $unsortedArray[$j];
                                $ignoreList[] = $j;
                                $mergeflag = true;
                            }
                        }
                    }


                }


            } while ($mergeflag == true);

            $newSortedArry = $currentSortArry;


            return $newSortedArry;
        } catch (\Exception $e) {
            return array('error' => $e->getMessage());
        }
    }


}