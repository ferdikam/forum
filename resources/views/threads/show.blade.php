@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="/threads/?by={{ $thread->creator->name }}">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @if(auth()->check())

                            <form method="post" action="{{ $thread->path() . '/replies'}}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="body" placeholder="Have something to say ?" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </form>

                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#">{{ $thread->creator->name }}</a>, and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
