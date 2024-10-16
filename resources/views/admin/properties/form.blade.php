@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'créer un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row   ">
            <div class="col-sm-9 " >
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

                @include('shared.select', [
                    'label' => 'Options',
                    'name' => 'options',
                    'value' => $property->options()->pluck('id', 'name'),
                    'multiple' => true,
                    'option' => $options,
                ])
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
            </div>
                <div class="col-sm-3  vstack gap-3" >
                    @foreach ($property->pictures as $picture)  

                        <div id="picture-{{ $picture->id }}" class="position-relative">                  
                        <img src="{{ $picture->getImageUrl() }}" class="w-100 d-block">

                        <button type="button" 
                            class="btn btn-danger me-md-2 position-absolute bottom-0 start-0 w-100 h-10"
                            hx-delete="{{ route('admin.picture.destroy', $picture) }}"
                            hx-target="#picture-{{ $picture->id }}"
                            hx-swap="delete">
                            <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Supprimer
                        </button>

                        </div>
                    @endforeach
                    @include('shared.upload', [
                        'label' => 'Images',
                        'name' => 'pictures',
                        'multiple' => true,
                    ])
                </div>
            
        </div>

       
    </form>
@endsection
