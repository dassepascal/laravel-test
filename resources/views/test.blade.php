@extends('base')

@section('title', 'tous nos bien')

@section('content')


    <div class="container bg-light p-5 mb-5 text-center">
        <div class="row ">

           
                <form action="">
                     <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-6  g-2 g-lg-3"">
                    <div class="col  m-2">
                        <input type="number" placeholder="Surface min " class="form-control" name="surface"
                            value="{{ $input['surface'] ?? '' }}">
                    </div>
                    <div class="col  m-2"> <input type="number" placeholder="Nombre de pièce min "
                            class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}"></div>
                    <div class="col  m-2"> <input type="number" placeholder="Budget max " class="form-control"
                            name="price" value="{{ $input['price'] ?? '' }}"></div>
                    <div class="col  m-2"> <input placeholder="Mot clef " class="form-control" name="title"
                            value="{{ $input['title'] ?? '' }}"></div>
                    <div class="col bg-primary m-2"><button class="btn btn-primary btn-sm flex-grow-0">
                            Rechercher
                        </button></div>
                         </div>
                </form>

           

        </div>


    @endsection
