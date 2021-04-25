<?php

namespace src;

/**
 * Class Ticket
 *
 */
class Ticket
{
    /**
     * Boardings
     *
     * @var array
     */
    protected $boardings = array();

    /**
     * Sorted boardings
     *
     * @var array
     */
    protected $sortedBoardings = array();

    /**
     * Default set of transports
     *
     * @var array
     */
    protected static $transportations = array(
        'Train' => 'src\Vehicle\Train',
        'Bus' => 'src\Vehicle\Bus',
        'Plane' => 'src\Vehicle\Flight',
    );

    function __construct($boardings)
    {
        $this->boardings = $boardings;
    }

    public function addBoarding($boarding)
    {
        $this->boardings[] = $boarding;
    }

    /**
     * Sort boardings
     * This function sorts the boardings in order
     */
    public function sort()
    {
        // Create PassSorter instance to sort data
        $passSorter = new PassSorter($this->boardings);
        // Sort boardings and assign them to the sorted boardings array
        $passSorter->sort();
        $this->sortedBoardings = $passSorter->getBoardings();
    }

    /**
     * Get sorted transportations as an array of objects
     *
     * @return array
     */
    public function getTransportations()
    {
        $transportationList = array();

        if (count($this->sortedBoardings) == 0) {
            return $transportationList;
        }

        foreach ($this->sortedBoardings as $boarding) {
            $type = $boarding['Transport'];

            if (!isset(static::$transportations[$type])) {
                throw new Exception\RuntimeException(
                    sprintf(
                        'Unsupported transportation : %s',
                        $type
                    )
                );
            }
            $transportationList[] = new static::$transportations[$type]($boarding);
        }

        return $transportationList;
    }

    /**
     * Display Trip
     */
    public function tripString()
    {
        $str = [];
        foreach ($this->getTransportations() as $idx => $transportaton) {
            // var_dump($transportaton);
            array_push($str, ($idx + 1) . ". " . $transportaton->getMessage() . PHP_EOL . PHP_EOL);
            // Final dstination message
            if ($idx == (count($this->boardings) - 1)) {
                array_push($str, ($idx + 2) . ". " .  $transportaton::MESSAGE_FINAL_DESTINATION . PHP_EOL);
            }
        }

        // echo json_encode($str);
        return json_encode($str, JSON_FORCE_OBJECT);
    }

    /**
     * Get boardings
     *
     * @return array()
     */
    public function getBoardings()
    {
        return $this->boardings;
    }

    /**
     * Get sorted boardings
     *
     * @return array()
     */
    public function getSortedBoardings()
    {
        return $this->sortedBoardings;
    }
}
