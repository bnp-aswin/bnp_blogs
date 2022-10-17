@extends('layout.default')

@section('content')
    <x-banner></x-banner>
    <section class="all_post section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <x-post-card></x-post-card>
                    <x-post-card></x-post-card>
                    <x-post-card></x-post-card>
                    <x-post-card></x-post-card>
                    <x-post-card></x-post-card>
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