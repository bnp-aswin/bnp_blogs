@extends('layout.default')

@section('content')
    @include('includes.breadcrumb')
    <section class="blog_area single-post-area all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" width="730px" src="{{$post->thumbnail}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{$post->title}}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="far fa-user"></i> {{$post->category->name}}</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
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
                            <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and
                                4
                                people like this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="/img/blog/author.png" alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{$post->author->name}}</h4>
                                </a>
                                <p>{{$post->author->bio}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>05 Comments</h4>
                        <x-comment-list></x-comment-list>
                        <x-comment-list></x-comment-list>
                        <x-comment-list></x-comment-list>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" action="#" id="commentForm">
                            <div class="row">
                                <div class="col-12">
                                    <x-form.textarea name="comment"/>
                                </div>
                                <div class="col-md-6">
                                    <x-form.input name="name" type="text"/>
                                </div>
                                <div class="col-md-6">
                                    <x-form.input name="email" type="email"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-form.button>Submit</x-form.button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <x-side-widget></x-side-widget>
                </div>
            </div>
        </div>
    </section>
@endsection