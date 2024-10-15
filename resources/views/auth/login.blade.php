@extends('base')

@section('title', 'Se connecter')

@section('content')
<div class="container mt-4">
<h1>@yield('title') </h1>
@include('shared.flash')
<form action="{{ route('login')}}" method="post" class="vstack gap-2">
    @csrf
    @include('shared.input', ['class' => 'col','label' => 'Email', 'name' => 'email'])
    @include('shared.input', ['class' => 'col','label' => 'Mot de passe', 'name' => 'password'])
   
    @include('shared.button', ['class' => 'col','label' => 'Se connecter'])

</form>
</div>

@endsection
