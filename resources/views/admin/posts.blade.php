@extends('layout.default')

@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-5 text-center">Submitted Posts</h1>
                <table class="table table-hover mb-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Excerpt</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($postsSubmitted))
                            @foreach ($postsSubmitted as $post)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->excerpt}}</td>
                                <td>{{$post->author->name}}</td>
                                <td>
                                    <a href="{{route('single.post', $post)}}">
                                        <i style="color: {{$post->status ? 'green' : 'red'}}" title="{{$post->status ? 'Reject' : 'Approve'}}" class="fa-sharp fa-solid fa-thumbs-{{$post->status ? 'up' : 'down'}}"></i>
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
                {{$postsSubmitted->links()}}
            </div>
        </div>
    </div> --}}
    <x-breadcrumb>All user Post's</x-breadcrumb>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">Pending Post</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Published Post</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-responsive mb-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Excerpt</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($unpublishedPosts))
                                            @foreach ($unpublishedPosts as $post)
                                            <tr>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->excerpt}}</td>
                                                <td>{{$post->author->name}}</td>
                                                <td>
                                                    <form action="{{route('all-posts')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <button class="btn" type="submit"><i style="color: red" title="Approve" class="fa-sharp fa-solid fa-thumbs-down"></i></button>
                                                    </form>
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
                                {{$unpublishedPosts->links()}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-responsive mb-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Excerpt</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($publishedPosts))
                                            @foreach ($publishedPosts as $post)
                                            <tr>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->excerpt}}</td>
                                                <td>{{$post->author->name}}</td>
                                                <td>
                                                    <form action="{{route('all-posts')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <button class="btn" type="submit"><i style="color: green" title="Reject" class="fa-sharp fa-solid fa-thumbs-up"></i></button>
                                                    </form>
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
                                {{$publishedPosts->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection