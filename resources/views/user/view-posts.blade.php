@extends('layout.default')

@section('content')
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{auth()->user()->name}}'s Posts</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @isset($posts)
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="{{route('single.post', $post)}}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('post.edit', $post)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('post.delete', $post)}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        @endisset
                        @empty($posts)
                            <tr>no post</tr>
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection