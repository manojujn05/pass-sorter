<?php

namespace src\Vehicle;

/**
 * Class Plane
 *
 * @package src\Vehicle
 */
class Flight extends VehicleClass
{

    /**
     * @var string
     */
    protected $transportNumber;

    /**
     * @var string
     */
    protected $seat;

    /**
     * @var string
     */
    protected $gate;

    const MESSAGE = 'From %s, take flight %s to %s. Gate %s, seat %s.';

    public function getMessage()
    {
        $message = sprintf(
            static::MESSAGE,
            $this->from,
            $this->transportNumber,
            $this->to,
            $this->gate,
            $this->seat
        );


        return $message;
    }
}
