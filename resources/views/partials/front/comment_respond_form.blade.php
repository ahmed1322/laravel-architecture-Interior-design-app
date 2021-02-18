<h3 class="comment-reply-title">Leave a comment</h3>
    @if ( Auth::check() )

    <form action="{{ route('comment.add', [ 'post' => $post->id, 'user' => auth()->user()->id ]) }}" method="post" class="comment-form">
        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
        {{-- <div class="row">
            <p class="comment-form-author col-md-6">
                <input id="author" name="name" type="text" value="" size="30" placeholder="Name*" required="">
            </p>
            <p class="comment-form-email col-md-6">
                <input id="email" name="email" type="text" value="" size="30" placeholder="Email*" required="">
            </p>
        </div> --}}
        <p class="comment-form-comment">
            <div class="form-group">
                @csrf
            </div>
            <div class="form-group">
                <label for="comment"> Add Comment</label>
                <textarea
                    id="comment"
                    name="comment"
                    cols="45"
                    rows="8"
                    class="@error('comment') is-invalid @enderror"
                    placeholder="Comment*">{{ old('comment') }}</textarea>
                @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </p>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" class="octf-btn" value="Post Comment">
        </p>
    </form>
    @else
        <p class="lead">Please Login to Add Comment</p>
        <a class="btn btn-lg btn-success" href="{{ route('login') }}">Login</a>
    @endif
