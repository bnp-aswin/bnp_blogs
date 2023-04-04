@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
	                <div class="card-body">
                        <h1 class="text-center">Enter the verification Code</h1>
                        <form action="" method="post">
                            @csrf
                            <x-form.input name="verificationCode" type="text" />
                            <x-form.button>Verify Code</x-form.button>
                        </form>
	                </div>
                </div>
            </div>
        </div>
    </div>
@endsection