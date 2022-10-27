
@props(['post'])
<div class="single_catagory_post post_2 single_border_bottom">
    <div class="category_post_img">
        <img src="/storage/{{$post->thumbnail}}" alt="">
    </div>
    <div class="post_text_1 pr_30">
        <p><span> {{$post->author->name}}</span> / {{$post->created_at->format('F') . " " . $post->created_at->format('d') . ", " . $post->created_at->format('Y')}}</p>
        <a href="{{route('single.post', $post)}}">
            <h3>{{$post->title}}</h3>
        </a>
    </div>
</div>