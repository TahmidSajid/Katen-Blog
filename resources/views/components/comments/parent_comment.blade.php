@forelse ($comments as $comment)
    <!-- comment item -->
    <li class="comment rounded">
        <div class="thumb">
            <img src="{{ asset('uploads/profile_photos') }}/{{ $comment->getUser->photo }}" class="rounded-circle"
                style="height: 50px; width: 50px;" alt="John Doe" />
        </div>
        <div class="details">
            <h4 class="name"><a href="#">{{ $comment->getUser->name }}</a></h4>
            <span class="date">{{ $comment->created_at }}</span>
            <p>{{ $comment->comment }}</p>

            <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $comment->id }}">
                Reply
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Replying Comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="comment-form" class="comment-form" method="post"
                                action="{{ route('comment.store') }}">
                                @csrf
                                <div class="messages"></div>

                                <div class="row">

                                    <div class="column col-md-12">
                                        <!-- Comment textarea -->
                                        <div class="form-group">
                                            <textarea id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required"
                                                name="comment"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="d-none" name="blog_id"
                                                value="{{ $post->id }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="d-none" name="parent_id"
                                                value="{{ $comment->id }}">
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" id="submit" value="Submit"
                                    class="btn btn-default">Submit</button><!-- Submit Button -->

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </li>

    @include('components.comments.child_comment',['comments'=>$comment->getComment, 'padding'=>'0px'])

@empty
@endforelse
