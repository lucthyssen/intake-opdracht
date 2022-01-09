<?php 
namespace App\Classes;

class deelnemer {
    // properties
    public $name;
    public $geslacht;
    public $handicap;

    // Methods
    function set_data($name, $geslacht, $handicap) {
        $this->name = $name;
        $this->geslacht = $geslacht;
        $this->handicap = $handicap;
    }


    function get_data() {
        $allDeelnemerData[] = [
            'Naam'      => $this->name,
            'geslacht'  => $this->geslacht,
            'handicap'  => $this->handicap
        ];
        return $this->$allDeelnemerData;
    }
}