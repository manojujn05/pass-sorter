<?php

namespace src;

/**
 * Class PassSorter
 *
 * @package src
 */
class PassSorter
{
    /**
     * Boardings
     *
     * @var array
     */
    protected $boardings = array();

    function __construct($boardings)
    {
        $this->boardings = $boardings;
    }

    /**
     * Sort boardings
     * This function sorts the boardings in order
     */
    public function sort()
    {
        // Get first and last trip
        $this->setFirstLastBoarding();

        // Now we pair boardings
        for ($i = 0, $max = count($this->boardings) - 1; $i < $max; $i++) {
            // Foreach trip we test for the arrival city and the departure city
            foreach ($this->boardings as $idx => $trip) {
                // echo $this->boardings[$i]['Arrival'];
                // echo $trip['Departure'];
                if (strcasecmp($this->boardings[$i]['To'], $trip['From']) == 0) {
                    $nextIdx = $i + 1;
                    $tempBoarding = $this->boardings[$nextIdx];
                    $this->boardings[$nextIdx] = $trip;
                    $this->boardings[$idx] = $tempBoarding;
                }
            }
        }
    }

    private function setFirstLastBoarding()
    {
        $isLastBoarding = true;
        $hasPrevBoarding = false;

        for ($i = 0, $max = count($this->boardings); $i < $max; $i++) {
            // Foreach trip we test for the arrival city and the departure city
            foreach ($this->boardings as $trip) {
                // If current trip's departure is another trip arrivel, then we have a previous trip
                if (strcasecmp($this->boardings[$i]['From'], $trip['To']) == 0) {
                    $hasPrevBoarding = true;
                }
                // If current trip's arrival is another trip departure, then it is not the last trip
                elseif (strcasecmp($this->boardings[$i]['To'], $trip['From']) == 0) {
                    $isLastBoarding = false;
                }
            }

            // Assign the last and the first trip
            if (!$hasPrevBoarding) {
                // It is the first trip so we put it on the top
                array_unshift($this->boardings, $this->boardings[$i]);
                unset($this->boardings[$i]);
            } elseif ($isLastBoarding) {
                // It is the last trip so we put it at the bottom
                array_push($this->boardings, $this->boardings[$i]);
                unset($this->boardings[$i]);
            }
        }

        // We regenerate indexes
        $this->boardings = array_merge($this->boardings);
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
}
