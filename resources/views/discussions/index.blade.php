@extends('layouts.app')

@section('content')
  
    @if (session('status'))
        <div class="alert alert-success my-2" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @foreach($discussions as $discussion)
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{ Gravatar::src($discussion->user->email) }}" height="40" width="40" style="border-radius:50%" alt="">
                        <strong class="ml-2">{{ $discussion->user->name }}</strong>
                    </div>
                    <div>
                        <a href="{{ route('discussion.show',$discussion->slug) }}" class="btn btn-success btn-sm">View Thread</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
              
               <strong> {!! $discussion->title !!} </strong>

            </div>
        </div>
    @endforeach

    {{ $discussions->appends(['channel'=> request()->query('channel')])->links() }}
@endsection
