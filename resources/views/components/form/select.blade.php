@props(['name'])
<x-form.field>
    <x-form.label name="{{$name}}"/>
    <select class="form-control" required name="{{$name}}" id="{{$name}}">
        {{$slot}}
    </select>
</x-form.field>