<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 */

namespace src\lib\triporg\assets;

/**
 * tripAbstract extends the tripInterface so as to define few methods to be be used in the child classes
 *
 * Class tripAbstract
 * @abstract
 * @package Trip
 *
 */
Abstract class  tripAbstract implements tripInterface {


    /**
     * Location to id mapping in Engish
     * @var array
     */
    public $locationMapEN = [
        'dubai' => 1,
        'abu dhabi' => 2,
        'sharjah' => 3,
        'london' => 4,
        'manchester' => 5,
        'liverpool' => 6,
        'paris' => 7,
        'lyon' => 8,
        'toulouse' => 9,
        'marseille' => 10
    ];


    /*
     * Location to id mapping in French
     * @var array
     */
    public $locationMapFR = [
        'dubai' => 1,
        'abu dhabi' => 2,
        'sharjah' => 3,
        'londres' => 4,
        'manchester' => 5,
        'liverpool' => 6,
        'paris' => 7,
        'lyon' => 8,
        'toulouse' => 9,
        'marseille' => 10
    ];


    /*
     * Location to id mapping in Finnish
     * @var array
     */
    public $locationMapFI = [
        'dubai' => 1,
        'abu dhabi' => 2,
        'sharjah' => 3,
        'lontoo' => 4,
        'manchester' => 5,
        'liverpool' => 6,
        'pariisi' => 7,
        'lyon' => 8,
        'toulouse' => 9,
        'marseille' => 10
    ];


    /**
     * List of all available languages
     * @var array
     */
    public $languageMap = ['fi' => 'Finnish', 'fr' => 'French', 'en' => 'English'];


    /**
     * Selected language for the card
     * @var mixed
     *
     *
     */
    public $selLanguage;


    /**
     * Arrival location id holder
     * @var int
     */
    private $arrivalLocationId;


    /**
     * Arrival location city
     * @var String
     */
    private $arrivalLocationCity;


    /**
     * Departure location id holder
     * @var int
     */
    private $departureLocationId;

    /**
     * @return String   get the City of departure
     */
    public function getArrivalLocationCity() {
        return $this->arrivalLocationCity;
    }

    /**
     * @return String get the City of arrival
     */
    public function getDepartureLocationCity() {
        return $this->departureLocationCity;
    }


    /**
     * Departure location city
     * @var String
     */
    private $departureLocationCity;

    /*
     *  Methods need to be defined in the different card classes
     */
    abstract public function getCardDetails();


    /**
     * Methods need to be defined in the different card classes
     */
    abstract public function getShortCardDetails();


    /**
     * @param string $location Name of the Arrival location (city)
     * @param string $lg Code of the language the location is in
     * @return int     1 Invalid Language, 2 Invalid City , 0 Valid language and city
     */
    public function setArrivalLocation($location, $lg) {
        $lg = strtoupper($lg);
        $location = strtolower($location);
        try {
            if (!isset($this->{"locationMap$lg"})) {
                throw new \Exception(1);
            }

            if (!isset($this->{"locationMap$lg"}[$location])) {
                throw new \Exception(2);
            }

            $this->arrivalLocationId = $this->{"locationMap$lg"}[$location];
            $this->arrivalLocationCity = $location;
            $this->selLanguage = strtolower($lg);

            return 0;


        } catch (\Exception $e) {
            return $e->getMessage();
        }


    }

    /**
     * @return mixed   get the language for card
     */
    public function getSelLanguage() {
        return $this->languageMap[$this->selLanguage];
    }

    /**
     * @param string $location Name of the Departure location (city)
     * @param string $lg Code of the language the location is in
     * @return int     1 Invalid Language, 2 Invalid City , 0 Valid language and city
     */
    public function setDepartureLocation($location, $lg) {
        $lg = strtoupper($lg);
        $location = strtolower($location);


        try {
            if (!isset($this->{"locationMap$lg"})) {
                throw new \Exception(1);
            }

            if (!isset($this->{"locationMap$lg"}[$location])) {
                throw new \Exception(2);
            }

            $this->departureLocationId = $this->{"locationMap$lg"}[$location];
            $this->departureLocationCity = $location;
            $this->selLanguage = strtolower($lg);


            return 0;


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Getter to get the Arrival location Id
     * @return int
     */
    public function getArrivalId() {
        return $this->arrivalLocationId;
    }


    /**
     * Getter to get the Departure location Id
     * @return int
     */
    public function getDepartureId() {
        return $this->departureLocationId;
    }
}

//</code>