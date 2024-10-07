@php
$class ??= null;
$name ??= '';
$value ??= '';
$label ??=ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{  $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{  $name }}" multiple class='form-control @error($name) is-invalid @enderror' >
{{-- to do ::affichage border red pour required --}}
 
        @foreach($options as $k =>$v)
     
        <option @selected($value->contains($k)) value="{{ $k }}"> 
            {{ $v }}
        </option>
        
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feeback">
        {{ $message }}
    </div>
    @enderror
  
</div>
