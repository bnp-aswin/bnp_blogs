<x-form.field>
    <x-form.label name="{{$name}}"/>
    <input type="file" class="form-control" name="{{$name}}" id="{{$name}}"> 
    <x-form.error name="{{$name}}"/>
</x-form.field>