@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>User Login</h1>
                <form action="{{route('post.login')}}" method="post">
                    @csrf
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password"/>
                    <x-form.button>Login</x-form.button>
                </form>
            </div>
        </div>
    </div>
@endsection