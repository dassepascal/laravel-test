<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- tom-select --}}
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

     <title>@yield('title' | Administration)</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary test ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Agence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
                $route = Route::currentRouteName();
          @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                 <li class="nav-item">
                <a @class(['nav-link','active' => str_contains($route,'property.')]) href="{{ route('admin.property.index') }}">Gérer les biens</a>
              </li>
                 <li class="nav-item">
                <a @class(['nav-link','active' => str_contains($route,'option.')]) href="{{ route('admin.option.index') }}">Gérer les options</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    @if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@include('shared.flash')

    @yield('content')
</div> 

<script >
new TomSelect('select[multiple]',{plugins: {remove_button:{title:'Supprimer'}}})
</script>
</body>
</html>
