@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new thread</div>

                    <div class="card-body">
                        <form action="/threads" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="channel_id">Choose a channel: </label>
                                <select id="channel_id" name="channel_id" class="form-control" required>
                                    <option value="">Choose one...</option>
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea type="text" class="form-control" id="body" name="body" rows="8" required>{{ old('body') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>

                        @if(count($errors))
                            <ul class="alert alert-danger mt-2" role="alert">
                                @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
