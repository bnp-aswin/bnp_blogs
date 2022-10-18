@props(['comment'])
<div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                <img src="/img/comment/comment_1.png" alt="">
            </div>
            <div class="desc">
                <p class="comment">{{$comment->comment}}</p>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5>
                            <a href="#">{{$comment->username}}</a>
                        </h5>
                        <p class="date">{{$comment->created_at}} </p>
                    </div>
                    {{-- <div class="reply-btn">
                        <a href="#" class="btn-reply text-uppercase">reply</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>