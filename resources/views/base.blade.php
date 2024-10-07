<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   

     <title>@yield('title' )</title>
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
                <a @class(['nav-link','active' => str_contains($route,'property.')]) href="#">Gérer les biens</a>
              </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div>
    
    @yield('content')
</div> 


</body>
</html>

