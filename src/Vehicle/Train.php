<?php

namespace src\Vehicle;

/**
 * Class Train

 */
class Train extends VehicleClass
{

    /**
     * @var string
     */
    protected $transportNumber;

    /**
     * @var string
     */
    protected $seat;

    const MESSAGE = 'Take train %s';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_SEAT = 'Sit in seat %s.';

    /**
     *
     * @return string
     */
    public function getMessage()
    {
        // Add Transportation number to the message
        $message = sprintf(static::MESSAGE, $this->transportNumber);

        // Add (from => to) to the message
        $message = sprintf(
            $message . static::MESSAGE_FROM_TO,
            $this->from,
            $this->to
        );

        // Add Seat number to the message
        $message = sprintf($message . static::MESSAGE_SEAT, $this->seat);

        return $message;
    }
}
