@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{$name}}"/>
    <input type="{{$type}}" class="form-control" value="{{old($name)}}" name="{{$name}}" id="{{$name}}"> 
    <x-form.error name="{{$name}}"/>
</x-form.field>