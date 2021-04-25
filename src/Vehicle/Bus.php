<?php

namespace src\Vehicle;

/**
 * Class Bus
 */
class Bus extends VehicleClass
{
    const MESSAGE = 'Take the airport bus';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_NO_SEAT = 'No seat assignment.';


    public function getMessage()
    {
        $message = sprintf(
            static::MESSAGE . static::MESSAGE_FROM_TO,
            $this->from,
            $this->to
        );

        $message .= static::MESSAGE_NO_SEAT;

        return $message;
    }
}
