@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="mb-5 text-center"><b>Update:</b> {{$post->title}}</h4>
                <form class="form-contact comment_form" method="POST" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select id="category" name="category" required="" class="form-control">
                            @foreach ($categories as $category)
                                <option {{$post->category->name == $category->name ? 'selected' : '' }} value="{{$category->id}}">{{ucwords($category->name)}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small id="category" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" value="{{$post->title}}" name="title" id="title" type="text"
                            placeholder="Post title">
                        @error('title')
                            <small id="title" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="/storage/{{$post->thumbnail}}" style="width: 100px; height:auto" alt="post-image">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Upload thumbnail</label>
                        <input class="form-control" value="{{$post->thumbnail}}" name="thumbnail" id="thumbnail" type="file">
                        @error('thumbnail')
                            <small id="thumbnail" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea placeholder="Excerpt" class="form-control" name="excerpt" id="excerpt" cols="20" rows="3">{{$post->excerpt}}</textarea>
                        @error('excerpt')
                            <small id="excerpt" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea placeholder="Post body" class="form-control" name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea>
                        @error('body')
                            <small id="body" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="load_btn mb-3">
                        <input type="submit" class="btn_1" value="Update Post">
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection