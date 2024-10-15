@php


$class ??= null;
$name ??= '';
$multiple ??= false;

$label ??= Str::ucfirst($string = Str::of($name)->replace('_', ' '));

@endphp



<div @class(["form-group", $class])>
    <label for="{{  $name }}">{{ $label }}</label>
  
  

    <input @if($multiple) multiple @endif class="form-control @error($name) is-invalid @enderror" type="file" id="{{  $name }}" name="{{ $name . ($multiple ? '[]' : ''  )}}" >
    @error($name)
    <div class="invalid-feeback">
        {{ $message }}
    </div>
    @enderror
</div>
