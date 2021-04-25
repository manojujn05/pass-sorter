<?php

namespace src\Vehicle;

/**
 * Class AbstractVehicleation
 *
 * @package src\Vehicleation
 */
abstract class VehicleClass
{

    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $to;

    const MESSAGE_FINAL_DESTINATION = 'You have arrived at your final destination.';

    /**
     * @param array $trip
     */
    public function __construct(array $trip)
    {
        foreach ($trip as $key => $value) {
            // Make attribute's first character lowercase
            $property = lcfirst($key);

            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}
