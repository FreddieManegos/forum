@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($thread as $thread)
                    <div class="card-header">
                        <a href="">{{$thread->creator->name}}</a> tweeted
                        "{{$thread->title}}"
                    </div>

                    <div class="card-body">
                            <article>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <hr>
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
       </div>
        @if(auth()->check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{$thread->path().'/replies'}}">

                    {{csrf_field()}}
                    <div class="form-group">
                        {{--<label for="body">Body:</label>--}}
                        <textArea name="body" id="body" class="form-control" placeholder="Have something to say?"></textArea>
                    </div>

                    <button type="submit" class="btn btn-default">POST</button>
                </form>
            </div>
       </div>
            @else
            <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate</p>
        @endif
    </div>
@endsection
