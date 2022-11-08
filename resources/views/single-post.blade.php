@extends('layout.default')

@section('content')
    <x-breadcrumb>Single Blog Post</x-breadcrumb>
    <section class="blog_area single-post-area all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" width="730px" src="/storage/{{$post->thumbnail}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{$post->title}}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="{{route('category.posts', $post->category->name )}}"><i class="far fa-user"></i> {{ucwords($post->category->name)}}</a></li>
                                <li><a href="#comments"><i class="far fa-comments"></i> {{count($comments)}} Comments</a></li>
                            </ul>
                            <p class="excert">{{$post->excerpt}}</p>
                            <p>{{$post->body}}</p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    MCSE boot camps have its supporters and its detractors. Some people do not
                                    understand why you
                                    should have to spend money on boot camp when you can get the MCSE study materials
                                    yourself at
                                    a fraction of the camp price. However, who has the willpower to actually sit through
                                    a
                                    self-imposed MCSE training.
                                </div>
                            </div>
                            <p>
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you
                                should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a
                                fraction of the camp price. However, who has the willpower
                            </p>
                            <p>
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you
                                should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a
                                fraction of the camp price. However, who has the willpower to actually sit through a
                                self-imposed MCSE training. who has the willpower to actually
                            </p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="fa-solid fa-eye"></i></span>
                                {{$post->views}}
                                people viewed this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                            </div>
                            {{-- <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="/img/blog/author.png" alt="">
                            <div class="media-body">
                                <a href="{{route('author.posts', $post->author->username )}}">
                                    <h4>{{$post->author->name}}</h4>
                                </a>
                                <p>{{$post->author->bio}}</p>
                            </div>
                        </div>
                    </div>
                    <div id="comments" class="comments-area">
                        <h4>{{count($comments)}} Comments</h4>
                        @if (count($comments))
                            @foreach ($comments as $comment )
                                <x-comment-list :comment="$comment"></x-comment-list>
                            @endforeach
                        @endif
                    </div>
                    <div class="comment-form">
                        <h4>Post a comment here...</h4>
                        <form class="form-contact comment_form" method="POST" action="{{route('single.post', $post)}}" id="commentForm">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="col-12">
                                    <x-form.textarea name="comment"/>
                                </div>
                                @guest
                                    <div class="col-md-6">
                                        <x-form.input name="username"/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input name="email" type="email"/>
                                    </div>
                                @endguest
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-form.button>Submit</x-form.button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @guest
                    <div class="col-lg-4">
                        <x-side-widget :popularPost="$popularPost" :categories="$categories"></x-side-widget>
                    </div>
                @endguest
            </div>
        </div>
    </section>
@endsection