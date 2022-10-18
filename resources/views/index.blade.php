@extends('layout.default')

@section('content')
    <x-banner :bannerPosts="$bannerPosts"></x-banner>
    <section class="all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (count($posts))
                        @foreach ($posts as $post)
                            <x-post-card :post="$post"></x-post-card>
                        @endforeach 
                    @else
                        <p class="text-center">no posts available</p>
                    @endif
                    <div class="load_btn text-center">
                        <a href="#" class="btn_1">LOADING MORE <i class="ti-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <x-side-widget></x-side-widget>
                </div>
            </div>
        </div>
    </section>
@endsection