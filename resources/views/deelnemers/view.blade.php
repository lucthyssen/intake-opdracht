<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alle deelnemers</title>

    <link rel="stylesheet" href="../css/deelnemers-view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="container">
        <div class="reset">
            <form action="{{route('players.reset')}}" method="POST">
                @method('put')
                @csrf
                <input type="submit" value="Reset" name="button" class="reset-button">
            </form>
            <div class="text">
                <p>Door op deze knop te klikken worden alle zelf toegevoegde spelers verwijderd.</p>
            </div>
        </div>

        <div class="flights">
            <form action="{{ route('flights.generate')}}" method="post">
                @method('put')
                @csrf
                <input type="submit" value="Genereer" class="toevoegen-button">
            </form>
            <div class="text">
                <p>Door op deze knop te klikken worden de flights gegenereerd met de deelnemende spelers.</p>
            </div>
        </div>
        
        <div class="table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Geslacht</th>
                        <th scope="col">Handicap</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($deelnemers); $i++)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $deelnemers[$i]->name }}</td>
                            <td>{{ $deelnemers[$i]->geslacht }}</td>
                            <td>{{ $deelnemers[$i]->handicap }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="new-player">
            <h2>Voeg een nieuwe speler toe</h2>
            <form action="{{ route('player.add')}}" method="post">
                @method('put')
                @csrf
                <input type="text" placeholder="naam" name="naam" required>
                <select name="geslacht" name="geslacht">
                    <option value="man">man</option>
                    <option value="vrouw">vrouw</option>
                </select>
                <input type="number" value="20" step="0.1" name="handicap" required>
                <input type="submit" value="Toevoegen" class="toevoegen-button">
            </form>
        </div>
    </div>
</x-app-layout>