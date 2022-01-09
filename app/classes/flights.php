<?php

namespace App\Classes;

/**
 * Give a list of golfers per flight
 *
 * @param array $golfers The golfers to organize
 *
 * @return array flights with golfers, average handicap and playing handicap
 */

class flights {
    // properties
    public $player1;
    public $player2;
    public $player3;
    public $player4;
    public $handicap;
    public $playingHandicap;
}

function getFlights ( array $golfers ) : array
{
    $flights = array () ;
    return $flights;
}
