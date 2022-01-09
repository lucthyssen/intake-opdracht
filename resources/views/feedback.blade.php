{{-- link custom css file --}}
<link rel="stylesheet" href="css/dashboard-style.css">
<link rel="stylesheet" href="css/feedback-style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="">  

            <h1 class="text-center title">Zelfreflectie intake opdracht</h1>
            
            <div class="grid">
                <div class="block">
                    <h2 class="subtitle">Dingen die ik anders zou doen als ik meer tijd had:</h2>
                    <ul class="list-group">
                        <li class="list-group-item">Als ik meer tijd had gehad had ik mij beter in kunnen lezen in golf. Enkele voorbeelden: Wat flights inhouden, wat Texas scramble is; om zo de opdracht beter te begrijpen.</li>
                        <li class="list-group-item">Functies efficienter maken; sommige functies bevatten stukken van dezelfde code, als er meer tijd was geweest had ik deze dubbelle stukken kunnen weghalen en een externe functie hiervoor kunnen maken.</li>
                        <li class="list-group-item">Javascript (Vue.js) gebruiken om spelers toe te voegen / verwijderen.</li>
                      </ul>
                </div>
                <div class="block">
                    <h2 class="subtitle">Mijn gedachte over de opdracht</h2>
                    <p>Ik vond het een erg leuke en originele opdracht om aan te werken.</p>
                    <p>Ik baal er enorm van dat ik het algoritme om flights te generen niet heb kunnen uitwerken. Na meerdere pogingen en verschillende manieren om dit uit te werken te hbben geprobeerd is mij dit helaas niet gelukt. </p>
                    <p>Dit komt mede omdat ik een aantal keer opnieuw ben begonnen omdat ik niet helemaal begreep wat een flight inhoudt en hoe dit werkt binnen golf.</p>

                    <p>In de adminController.php staan 3 blokken code waarin ik het algoritme heb geprobeerd uit te werken. Momenteel staat voorbeeld 1 actief in de code; als er op de onderstaande knop geklikt word verschijnt op het scherm de output van dit stuk.</p>
                    <span><form action="{{ route('flights.generate')}}" method="post">
                        @method('put')
                        @csrf
                        <input type="submit" value="Genereer" class="toevoegen-button ibizz-button">
                    </form>
                </div>
            </div>
                <div class="code">
                    <div class="block">
                        <h2>Voorbeeld 1</h2>
                        <pre>
                            <code>
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
        array_push($allFlights, $flight);
    }
    dd($allFlights);
                            </code>
                        </pre>
                    </div>

                    <div class="block">
                        <h2>Voorbeeld 2</h2>
                        <pre>
                            <code>
$numberOfFlights = ceil(count($golfers) / $moduloNumber);
$allFlights = [];
$flight = [];
for ($i=0; $i < $numberOfFlights; $i++) { 
    for ($j=0; $j < $moduloNumber; $j++) {  
        array_push($flight, $golfers[$j]['id']);
        array_splice($golfers, $golfers[$j]['id']);
    }
    array_push($allFlights, $flight);
}
dd($allFlights);
                            </code>
                        </pre>
                    </div>

                    <div class="block">
                        <h2>Voorbeeld 3</h2>
                        <pre>
                            <code>
for ($i=1; $i < $numberOfFlights +2; $i++) {
    for ($i=0; $i < $moduloNumber; $i++) { 
                                        
    $flight[$i] = [
    'player' . ($i + 1) => $golfers[$i]->id
    ];
    unset($golfers[$i]);
                                        
    }
    $i++;
    array_push($allFlights, $flight);
}                     
// array push voor elke speler die meedoet
$info = array([
    'averageHandicap' => 0,
    'playingHandicap' => 0,
]);
dd($allFlights);
                            </code>
                        </pre>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    
</x-app-layout>
