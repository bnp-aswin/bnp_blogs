@extends('layout.default')

@section('content')
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-5 text-center">{{auth()->user()->name}}'s Posts</h1>
                <table class="table table-hover mb-5">
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
                        @if (count($posts))
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
                        @else
                            <tr>
                                <td class="text-center" colspan="6">no post</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection