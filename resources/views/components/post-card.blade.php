@props(['post'])
<div class="single_post media post_3">
    <div class="single_post_img">
        <img src="{{$post->thumbnail}}" alt="">
        <a href="category.html" class="category_btn">{{$post->category->name}}</a>
    </div>
    <div class="post_text_1 media-body align-self-center">
        <p><span> By {{$post->author->name}}</span> / {{$post->created_at->format('F') . " " . $post->created_at->format('d') . ", " . $post->created_at->format('Y')}}</p>
        <a href="#">
            <h3>{{$post->title}}</h3>
        </a>
        <div class="post_icon">
            <ul>
                <li><i class="fa-regular fa-comment"></i>2 Comments</li>
                <li><i class="fa-solid fa-eye"></i>0 Views</li>
            </ul>
        </div>
    </div>
</div>