@extends('admin.admin')

@section('title', $option->exists ? 'Editer une option' : "Créer une option")

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
</div>

    <form
        class="vstack gap-2"
        action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option]) }}"
        method="post">
        @csrf

        @method($option->exists ? 'PUT' : 'POST')



        <div class="row">

                @include('shared.input', ['class' => 'col','label' => 'Nom', 'name' => 'name', 'value' => $option->name])


        </div>



<div>
    <button class="btn btn-primary">

        @if($option->exists)
        Modifier
        @else
        Créer
        @endif
    </button>

</div>




    </form>

    @endsection
