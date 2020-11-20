@extends('layouts.app')

@section('content')
  
    @if (session('status'))
        <div class="alert alert-success my-2" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ Gravatar::src($discussion->user->email) }}" height="40" width="40" style="border-radius:50%" alt="">
                    <strong class="ml-2">{{ $discussion->user->name }}</strong>
                </div>
                
            </div>
        </div>

        <div class="card-body">
            
            <strong> {!! $discussion->title !!} </strong>

            <hr>

            {!! $discussion->content !!}

            @if($discussion->bestReply)
            <div class="card bg-success my-5 text-white">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img src="{{ Gravatar::src($discussion->bestReply->user->email) }}" height="40" width="40" style="border-radius:50%" alt="">
                            <strong class="ml-2">{{ $discussion->bestReply->user->name }}</strong>
                        </div>
                        <div>
                        
                        </div>
                    </div>
                    <div>
                    
                    </div>
                </div>
                <div class="card-body">
                    {!! $discussion->bestReply->content !!}
                </div>
            </div>
            @endif

        </div>
    </div>
    <h3 class="mt-5">Replies on this thread</h3>
    @foreach($discussion->replies()->paginate(2) as $reply)
        <div class="card my-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{ Gravatar::src($reply->user->email) }}" height="40" width="40" style="border-radius:50%" alt="">
                        <strong class="ml-2">{{ $reply->user->name }}</strong>
                    </div>
                    <div>
                       
                            @if( auth()->user()->id == $discussion->user_id )
                                <form action="{{ route('discussion.best-reply',['discussion'=> $discussion->slug, 'reply'=>$reply->id ]) }}" method="post">
                                    <button type="submit" class="btn btn-sm btn-info text-white">Mark as best</button>
                                    @csrf
                                </form>

                            @endif
                    </div>
                </div>
                <div>
                  
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach
    {{ $discussion->replies()->paginate(2)->links() }}
    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{ route('replies.store', $discussion->slug) }}" method="post">
                    @csrf
                    
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>

                    <input type="submit" value="Add Reply" class="btn btn-sm my-2 btn-success">
                </form>
            @else 
                <a href="{{ route('/login') }}" class="btn btn-success">Sign in to reply</a>
            @endauth
        </div>
    </div>


@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script>
@endsection