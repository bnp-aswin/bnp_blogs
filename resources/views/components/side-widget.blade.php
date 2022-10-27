@props(['popularPost','categories'])
<div class="sidebar_widget">
    <div class="sidebar_tittle">
        <h3>Search Objects</h3>
    </div>
    <form action="{{route('search')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder='Search Keyword'
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                <div class="input-group-append">
                    <button class="btn" type="submit"><i class="fa-brands fa-searchengin"></i></button>
                </div>
            </div>
        </div>
    </form>
    <div class="sidebar_tittle">
        <h3>Popular Feeds</h3>
    </div>
    @foreach ($popularPost as $post)
        <x-single-widget-card :post="$post"></x-single-widget-card>
    @endforeach
    <div class="sidebar_tittle">
        <h3>Categories</h3>
    </div>
    <div class="single_catagory_item category">
        <ul class="list-unstyled">
            @foreach ($categories as $category)
                <li><a href="{{route('category.posts', $category->name )}}">{{ucwords($category->name)}} ({{$category->posts_count}})</a></li>
            @endforeach
        </ul>
    </div>
</div>