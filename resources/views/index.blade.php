@extends('layout.default')

@section('content')
    <section class="all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (count($posts))
                        @foreach ($posts as $post)
                            <x-post-card :post="$post"></x-post-card>
                        @endforeach
                        {{$posts->links()}}
                    @else
                        <p class="text-center">no posts available</p>
                    @endif
                </div>
                <div class="col-lg-4">
                    <x-side-widget :popularPost="$popularPost" :categories="$categories"></x-side-widget>
                </div>
            </div>
        </div>
    </section>
@endsection