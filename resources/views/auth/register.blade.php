@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Register new User</h1>
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <x-form.input name="name"/>
                    <x-form.input name="username"/>
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password"/>
                    <x-form.input name="password_confirmation" type="password"/>
                    <x-form.button>Register</x-form.button>
                </form>
            </div>
        </div>
    </div>
@endsection