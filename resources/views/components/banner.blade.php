@props(['bannerPosts'])
<section class="banner_post">
    <div class="container-fluid">
        <div class="row">
            @if (count($bannerPosts) >= 2 )
                <div class="col-lg-12">
                    <div class="banner_post_1 banner_post_bg_1">
                        <div class="banner_post_iner text-center">
                            <a href="category.html">
                                <h5>{{$bannerPosts[0]->category->name}}</h5>
                            </a>
                            <a href="single-blog.html">
                                <h2>{{$bannerPosts[0]->title}}</h2>
                            </a>
                            <p><span> By {{$bannerPosts[0]->author->name}}</span> / {{$bannerPosts[0]->created_at->format('F') . " " . $bannerPosts[0]->created_at->format('d') . ", " . $bannerPosts[0]->created_at->format('Y')}}</p>
                        </div>
                    </div>
                    <div class="banner_post_2 banner_post_bg_2">
                        <div class="banner_post_iner">
                            <a href="category.html">
                                <h5>{{$bannerPosts[1]->category->name}}</h5>
                            </a>
                            <a href="single-blog.html">
                                <h2>{{$bannerPosts[1]->title}}</h2>
                            </a>
                            <p><span> By {{$bannerPosts[1]->author->name}}</span> / {{$bannerPosts[1]->created_at->format('F') . " " . $bannerPosts[1]->created_at->format('d') . ", " . $bannerPosts[1]->created_at->format('Y')}}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12">
                    <p class="text-center">no post to display</p>
                </div>
            @endif
        </div>
    </div>
</section>