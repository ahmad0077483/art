@foreach($comments as $comment )
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between">
            <div class="commenter">
                <span style="font-size: 24px">{{$comment->user->name}}</span>
                @if($comment->approved==1)
                <span style="font-size: 24px" class="text-muted">{{ \Illuminate\Support\Carbon::parse($comment->created_at)->now()}}</span>
                @endif
            </div>

        </div>



        {{--                            bnejdeedhn--}}
        <div class="dropdown">
            <button style="font-size: 24px" class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-expanded="true">
                @auth
                    <span style="font-size: 24px"  data-target="#sendComment" data-toggle="on"
                           data-id="{{ $comment->id }}">  پاسخ</span>

                @endauth
            </button>
            <div style="font-size: 24px" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="form-group dropdown-item">
                    <label style="font-size: 24px" for="message-text" class="col-form-label">پیام دیدگاه:</label>
                    <textarea name="comment" class="form-control" id="message-text"></textarea>
                    <div >
                        <button style="font-size: 24px" type="submit" class="btn btn-primary"  >ارسال نظر</button>
                    </div>
                </div>
            </div>
        </div>





        <div class="card-body">
            {{ $comment->comment }}
            @include('layouts.comment',['comments'=>$comment->child ])

        </div>
    </div>
@endforeach
