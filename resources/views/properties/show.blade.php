@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary" style="text-decoration:underline ;text-transform:capitalize">{{ $property->title }}</h1>

        <h2> {{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})</h2>

        <div class="text-primary" style="font-size:4rem ">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>

        <hr>

        <div class="mt-4">
            <h4>Intéressé par ce bien</h4>

            <form action="#" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
                    @include('shared.input', [
                        'class' => 'col',
                        'name' => 'firstname',
                        'label' => 'Prénom',
                    ])
                </div>
                <div class="row">
                    @include('shared.input', [
                        'type' => 'email',
                        'class' => 'col',
                        'name' => 'email',
                        'label' => 'Email',
                    ])
                  

           
                    @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])

                </div>
                @include('shared.input', ['name' => 'message', 'label' => 'Message'])
                <div>
                    <button class="btn btn-primary">
                        Nous contacter
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            {{-- si on fait confiance à l'utilisateur on peut encadrer le texte avec !! :  <p>{{ !! nl2br($property->description) !! }}</p>--}}
            <p>{{ nl2br($property->description) }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                             <td>Pièces</td>
                            <td>{{ $property->rooms }} </td>
                        </tr>
                         <tr>
                             <td>Chambres</td>
                            <td>{{ $property->bedrooms }} </td>
                        </tr>
                          <tr>
                             <td>Etage</td>
                            <td>{{ $property->floor ? :'Rez de chaussé' }} </td>
                        </tr>
                          <tr>
                             <td>Localisation</td>
                            <td>{{ $property->address }} <br>
                            {{ $property->city }} - {{ $property->code_postal }}
                            </td>
                        </tr>

                    </table>
                  
                </div>
                <div class="col-4">
                   <h2>Spécificités</h2>
                   <ul class="list-group">
                    @foreach ($property->options as $option )
                        <li class="list-group-item">{{ $option->name }}</li>
                        
                    @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
