@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
	                <div class="card-body">
                        <h1 class="text-center">Change Password</h1>
                        <form action="{{route('postUpdateNewPassword')}}" method="POST">
                            @csrf
                            <x-form.input name="password" type="password" />
                            <x-form.input name="password_confirmation" type="password" />
                            <x-form.button>Change Password</x-form.button>
                        </form>
	                </div>
                </div>
            </div>
        </div>
    </div>
@endsection