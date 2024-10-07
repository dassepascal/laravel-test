@php
// $label ??= null;
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= '';
$label ??= Str::ucfirst($string = Str::of($name)->replace('_', ' '));

@endphp



<div @class(["form-group", $class])>
    <label for="{{  $name }}">{{ $label }}</label>
    @if($type === 'textarea')
    <textarea class="form-control @error($name) is-invalid @enderror" id="{{  $name }}" name="{{ $name }}"
        rows="3">{{ old($name,$value) }}</textarea>
    @else

    <input class="form-control @error($name) is-invalid @enderror" type="{{  $type }}" id="{{  $name }}"
        name="{{ $name }}" value="{{ old($name,$value)}}">
    @endif
    @error($name)
    <div class="invalid-feeback">
        {{ $message }}
    </div>
    @enderror
</div>
