@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum threads</div>

                    @foreach($threads as $thread)
                        <div class="card-body">
                            <article>
                                <h4><a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a></h4>
                                <div class="body">{{ $thread->body }}</div>
                            </article>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
