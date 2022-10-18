@props(['name'])
@error($name)
    <small style="color:red;font-size: 14px">{{$message}}</small>
@enderror