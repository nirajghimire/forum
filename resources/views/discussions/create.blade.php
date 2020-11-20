@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('discussion.index') }}" class="btn btn-success mb-2">View all discussion</a>
    </div>
    <div class="card">
        <div class="card-header">Create Discussion</div>

        <div class="card-body">

            <form action="{{ route('discussion.store')}}" method="post">
                @csrf 
                <p>
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </p>
                <p>
                    <label>Content</label>
                    
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                    
                </p>
                <p>
                    <label>Channel</label>
                    <select name="channel_id" id="" class="form-control">
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <input type="submit" value="Add" class="btn btn-success">
                </p>
            </form>


        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script>
@endsection