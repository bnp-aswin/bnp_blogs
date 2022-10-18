@props(['name'])
<x-form.field>
    <x-form.label name={{$name}}></x-form.label>
    <textarea name="{{$name}}" id="{{$name}}" class="form-control" cols="10" rows="5">{{old($name)}}</textarea>
    <x-form.error name="{{$name}}"/>
</x-form.field>