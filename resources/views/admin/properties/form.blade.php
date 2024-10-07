@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'créer un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}" method="POST">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            </div>
           
            <div class="col ">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])
            </div>
            <div class="col">
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Prix',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>
        </div>
            @include('shared.input', [
                'type' => 'textarea',
                'class' => 'col',
                'label' => 'Description',
                'name' => 'description',
                'value' => $property->description,
            ])
              <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Pièces',
                            'name' => 'rooms',
                            'value' => $property->rooms,
                        ])
                    </div>
                    <div class="col">
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Chambres',
                            'name' => 'bedrooms',
                            'value' => $property->bedrooms,
                        ])
                    </div>
                    <div class="col">
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Etage',
                            'name' => 'floor',
                            'value' => $property->floor,
                        ])
                    </div>
              </div>
                   <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Adresse',
                            'name' => 'address',
                            'value' => $property->address,
                        ])
                    </div>
                    <div class="col">
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Ville',
                            'name' => 'city',
                            'value' => $property->city,
                        ])
                    </div>
                    <div class="col">
                        @include('shared.input', [
                            'class' => 'col',
                            'label' => 'Code postal',
                            'name' => 'postal_code',
                            'value' => $property->postal_code,
                        ])
                    </div>
              </div>
           @include('shared.checkbox', [
               
                'label' => 'Vendu',
                'name' => 'sold',
                'value' => $property->sold,
            ])
            

            
      <div>
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Creer
                @endif

            </button>
        </div>
    </form>
@endsection
