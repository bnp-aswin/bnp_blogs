@extends('layout.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Add New Category</h3>
                <form action="{{route('post.category')}}" method="post">
                    @csrf
                    <x-form.input name="category"/>
                    <x-form.button>Add Category</x-form.button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>All Categories</h3>
                <ul class="list-unstyled">
                @foreach ($categories as $category)
                    <li>{{ucwords($category->name)}}</li>
                @endforeach
        </ul>
            </div>
        </div>
    </div>
@endsection