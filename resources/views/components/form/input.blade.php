@props(['name', 'type' => 'text'])
@php
    use Illuminate\Support\Str;
@endphp
<x-form.field>
    <x-form.label name="{{Str::of($name)->headline()}}"/>
    <input type="{{$type}}" class="form-control" value="{{old($name)}}" name="{{$name}}" id="{{$name}}"> 
    <x-form.error name="{{$name}}"/>
</x-form.field>