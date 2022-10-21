@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Add New Post</h1>
                <form action="{{route('post.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <x-form.select name="category">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option {{old('category') == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{ucwords($category->name)}}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.input name="title"/>
                    <x-form.textarea name="excerpt"/>
                    <x-form.textarea name="body"/>
                    <x-form.file name="thumbnail" />
                    <x-form.button>Add Post</x-form.button>
                </form>
            </div>
        </div>
    </div>
@endsection