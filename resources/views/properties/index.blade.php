@extends('base')

@section('title', 'tous nos bien')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-3 mb-4">
                    @include('properties.card')
                </div>
            @endforeach
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>


@endsection
