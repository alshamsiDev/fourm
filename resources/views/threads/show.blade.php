@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{ $thread->creator->name }} </a> posted:
                        {{ $thread->title}}
                    </div>
                    <div class="card-body">
                        <article>
                            <div class="body">{{ $thread->body }}</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
        @if(auth()->check())
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <form action="{{ route('replies.store', $thread) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" rows="6"
                                      placeholder="Have something to say" required></textarea>
                        </div>
                        <button class="btn btn-success" type="submit">Sumbit</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

@endsection
