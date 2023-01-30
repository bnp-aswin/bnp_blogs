@extends('layout.default')

@section('content')
    <x-breadcrumb>Profile details</x-breadcrumb>
    <section class="blog_area single-post-area all_post section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{auth()->user()->name}} Profile</h5>
                          <p class="card-text"><b>Name: </b> {{auth()->user()->name}}</p>
                          <p class="card-text"><b>Username: </b> {{auth()->user()->username}}</p>
                          <p class="card-text"><b>Email: </b> {{auth()->user()->email}}</p>
                          <div class="load_btn">
                              <a href="#" class="btn_1">Edit Profile <i class="ti-angle-right"></i></a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection