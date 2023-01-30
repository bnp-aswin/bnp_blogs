@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
	                <div class="card-body">
                        <h1 class="text-center">Forget Password</h1>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <x-form.input name="email" type="email" />
                            <x-form.button>Reset Password</x-form.button>
                        </form>
	                </div>
                </div>
            </div>
        </div>
    </div>
@endsection