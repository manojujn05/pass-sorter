<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use src\Ticket;

// ## Manually 
$ticketsCollection = array(
    array(
        "From" => "Beirut",
        "To" => "Turkey",
        "Transport" => "Train",
        "TransportNumber" => "23A",
        "Seat" => "15B",
        "Gate" => "null",
        "counter" => "null"
    ),
    array(
        "From" => "Aleppo",
        "To" => "Montreal YUL",
        "Transport" => "Plane",
        "TransportatNumber" => "flight SK22",
        "Seat" => "7B",
        "Gate" => "null",
        "counter" => "null"
    ),
    array(
        "From" => "Turkey",
        "To" => "Ibiza Airport",
        "Transport" => "Bus",
        "TransportNumber" => "null",
        "Seat" => "null",
        "Gate" => "null",
        "counter" => "null"
    ),
    array(
        "From" => "Ibiza Airport",
        "To" => "Aleppo",
        "Transport" => "Plane",
        "Seat" => "3A",
        "Gate" => "15B",
        "counter" => "344"
    ),
);

// ## From file
// include_once('cards.php');
$trip = new Ticket($ticketsCollection);

// Sort them
$trip->sort();

// Display

echo ($trip->tripString());
