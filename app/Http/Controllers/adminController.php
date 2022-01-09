<?php

namespace App\Http\Controllers;

use App\Classes\deelnemer;
use App\Classes\flights;
use Illuminate\Http\Request;
use App\Models\deelnemers;
use App\Models\flightsTable;

class adminController extends Controller
{
    // function for making all players
    public function getAllPlayers(){
        $allDeelnemers = [];
        $allGolfers = deelnemers::all();

        foreach ($allGolfers as $Golfer) {
            $deelnemer = new deelnemer;
            $deelnemer->set_data($Golfer->name, $Golfer->geslacht, $Golfer->handicap);
            array_push($allDeelnemers, $deelnemer);
        }
        return view('deelnemers.view', [
            'deelnemers' => $allDeelnemers
        ]);
    }

    // function to reset all players
    public function resetPlayers()
    {
        // truncate deelnemers table
        deelnemers::truncate();
        
        // insert old players (in case you deleted too many people)
        deelnemers::insert([
            ['name' => 'Arno',      'geslacht' => 'man',    'handicap' => '22.8'],
            ['name' => 'George',    'geslacht' => 'man',    'handicap' => '25.5'],
            ['name' => 'Michiel',   'geslacht' => 'man',    'handicap' => '24.6'],
            ['name' => 'Peter',     'geslacht' => 'man',    'handicap' => '23.8'],
            ['name' => 'Sylvia',    'geslacht' => 'vrouw',  'handicap' => '29.2'],
            ['name' => 'Jan',       'geslacht' => 'man',    'handicap' => '26.5'],
            ['name' => 'Bram',      'geslacht' => 'man',    'handicap' => '23.2'],
            ['name' => 'Ruud',      'geslacht' => 'man',    'handicap' => '44.0'],
            ['name' => 'Leon',      'geslacht' => 'man',    'handicap' => '18.4'],
            ['name' => 'Bart',      'geslacht' => 'man',    'handicap' => '24.9'],
            ['name' => 'Ornella',   'geslacht' => 'vrouw',  'handicap' => '39.0'],
        ]);

        $allDeelnemers = deelnemers::all();
        // return to view with new data
        return view('deelnemers.view', [
            'deelnemers' => $allDeelnemers
        ]);
    }

    public function addPlayer(Request $request)
    {
        deelnemers::insert([
            ['name' => $request->naam,  'geslacht' => $request->geslacht,   'handicap' => $request->handicap]
        ]);
        $allDeelnemers = deelnemers::all();
        // return to view with new data
        return view('deelnemers.view', [
            'deelnemers' => $allDeelnemers
        ]);
    }

    public function generateFlights()
    {
        // alle deelnemers gesorteerd op handicap (aflopend)
        $allDeelnemers = deelnemers::orderBy('handicap', 'desc')->get();
        // dd($allDeelnemers);

        // create array with all data in it
        $allDeelnemersData = [
        ];
        
        foreach ($allDeelnemers as $deelnemer) {

            array_push($allDeelnemersData, $deelnemer);
        }

        // get count of all players
        $allPlayerCount = count($allDeelnemersData);
        
        // check amount of flights
        if ($allPlayerCount % 4 == 0) {
            $this->getFlights($allDeelnemersData, 4);
        } elseif ($allPlayerCount % 3 == 0) {
            $this->getFlights($allDeelnemersData, 3);
        } elseif ($allPlayerCount % 2 == 0) {
            $this->getFlights($allDeelnemersData, 2);
        } else {
            // geen enkele mogelijkheid voor gelijke teams, opsplitsen vanaf teams van 4
            if ($allPlayerCount % 4 == 3 || $allPlayerCount % 4 == 2) {
                // Teams van 4, en een team van 3!
                $this->getFlights($allDeelnemersData, 4);
            } elseif ($allPlayerCount % 3 == 4 || $allPlayerCount % 3 == 2) {
                // Teams van 3, en een team van 4!
                $this->getFlights($allDeelnemersData, 3);
            } elseif ($allPlayerCount % 2 == 3) {
                // Teams van 2, en een team van 3!
                $this->getFlights($allDeelnemersData, 2);
            } else {
                // kan geen flights maken met dit aantal deelnemers
                return view('deelnemers.view', [
                    'deelnemers' => $allDeelnemers
                ]);
            }
        } 
    }

    function getFlights(array $golfers, int $moduloNumber): array
    {
        $numberOfFlights = ceil(count($golfers) / $moduloNumber);
        $allFlights = [];
        
        for ($i=0; $i < $numberOfFlights; $i++) { 
            $flight = new flights;
            for ($j=0; $j < $moduloNumber; $j++) { 
                $flight->player1 = $golfers[$j]['id'];
                $flight->player2 = $golfers[$j +1]['id'];
                $flight->player3 = $golfers[$j +2]['id'];
                $flight->player4 = $golfers[$j +3]['id'];
            }
            // insert into DB
            
            array_push($allFlights, $flight);
        }

        dd($allFlights);
       




        
        // $flight = [];
        // for ($i=0; $i < $numberOfFlights; $i++) { 

        //     for ($j=0; $j < $moduloNumber; $j++) { 
                
        //         array_push($flight, $golfers[$j]['id']);
        //         array_splice($golfers, $golfers[$j]['id']);
        //     }
        //     array_push($allFlights, $flight);
        // }
        // dd($allFlights);
        




        // for ($i=1; $i < $numberOfFlights +2; $i++) {
        //     for ($i=0; $i < $moduloNumber; $i++) { 
                
        //         $flight[$i] = [
        //             'player' . ($i + 1) => $golfers[$i]->id
        //         ];
        //         unset($golfers[$i]);
                
        //     }
        //     $i++;
        //     array_push($allFlights, $flight);
        // }

        // // array push voor elke speler die meedoet
        // $info = array([
        //     'averageHandicap' => 0,
        //     'playingHandicap' => 0,
        // ]);


        // dd($allFlights);



        // return $flights;
    }
}
