@props(['post'])
<div class="single_post media post_3">
    <div class="single_post_img">
        <img src="/storage/{{$post->thumbnail}}" style="max-width: 350px" alt="">
        <a href="{{route('category.posts', $post->category->name )}}" class="category_btn">{{$post->category->name}}</a>
    </div>
    <div class="post_text_1 media-body align-self-center">
        <p><span> By {{$post->author->name}}</span> / {{$post->created_at->format('F') . " " . $post->created_at->format('d') . ", " . $post->created_at->format('Y')}}</p>
        <a href="{{route('single.post', $post)}}">
            <h3>{{$post->title}}</h3>
        </a>
        <div class="post_icon">
            <ul>
                <li><i class="fa-regular fa-comment"></i>{{count($post->comments)}} Comments</li>
                <li><i class="fa-solid fa-eye"></i>{{$post->views}} Views</li>
            </ul>
        </div>
    </div>
</div>