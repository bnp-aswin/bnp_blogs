@props(['name'])
@error($name)
    <small class="alert alert-danger">{{$message}}</small>
@enderror