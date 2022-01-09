{{-- link custom css file --}}
<link rel="stylesheet" href="css/dashboard-style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="content">
            <h1 class="title text-center">Welkom {{Auth::user()->name}}</h1>
            <h3 class="text-center">Klik op de onderstaande knop om naar het overzicht van de spelers te gaan.<br> Daar kunt u spelers beheren en flights genereren.</h3>
            <div class="dashboard-grid">
                <div class="managing shadow">
                    <form action="{{route('players.initialize')}}" method="POST">
                        @method('put')
                        @csrf
                        <input type="submit" value="Bekijk alle spelers" name="button" class="btn iBizz-button">
                    </form>
                    <a href="/feedback" class="">
                        <div class="block">
                            <h1 class="block-title iBizz-button ">Zelfreflectie</h1>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
    
</x-app-layout>
