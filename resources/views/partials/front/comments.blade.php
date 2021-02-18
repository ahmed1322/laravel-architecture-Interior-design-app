<h3 class="comments-title">Comments <span>({{ $post->comments->count() }})</span></h3>
@forelse ($post->comments as $comment)
    <ol class="comment-list">
        <li class="comment even thread-even comment-item">
            <article class="comment-wrap clearfix">
                <div class="gravatar">
                    <img src="{{ Gravatar::src($comment->author->email)  }}" alt="{{ $comment->author->name }}" class="avatar">
                </div>
                <div class="comment-content">
                    <div class="comment-meta">
                        <h6 class="comment-author">{{ $comment->author->name }}</h6>
                        {{-- format('d Y M') --}}
                        <span class="comment-time">{{ $comment->created_at->diffForHumans()  }}</span>
                        <div class="comment-reply"><a class="comment-reply-link" href="#">Reply</a></div>
                    </div>
                    <div class="comment-text">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            </article>
        </li>
    </ol>
    {{-- <ul class="children">
        <li class="comment odd alt comment-item">
            <article class="comment-wrap clearfix">
                <div class="gravatar">
                    <img src="{{ Gravatar::src($comment->author->email)  }}" alt="{{ $comment->author->name }}" class="avatar">
                </div>

                <div class="comment-content">
                    <div class="comment-meta">
                        <h6 class="comment-author">Frank Barry</h6>
                        <span class="comment-time">2 Days ago</span>
                        <div class="comment-reply"><a class="comment-reply-link" href="#">Reply</a></div>
                    </div>
                    <div class="comment-text">
                        <p>I think natural materials has memory and appreciates to the culture, roots, archetypes.</p>
                    </div>
                </div>
            </article>
        </li>
        <!-- #comment-## -->
    </ul> --}}
@empty
    <p class="lead">No Comments Yet</p>
@endforelse
