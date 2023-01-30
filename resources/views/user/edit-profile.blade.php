@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="mb-5 text-center"><b>Edit Profile</b></h4>
                <form class="form-contact comment_form" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" value="" name="name" id="name" type="text"
                            placeholder="Name">
                        @error('name')
                            <small id="name" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input class="form-control" value="" name="username" id="username" type="text"
                            placeholder="Username">
                        @error('username')
                            <small id="username" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" value="" name="email" id="email" type="email"
                            placeholder="Email">
                        @error('email')
                            <small id="username" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="load_btn mb-3">
                        <input type="submit" class="btn_1" value="Update Profile">
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection