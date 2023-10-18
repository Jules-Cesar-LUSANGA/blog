@extends('base')

@section('title')
    {{strtoupper($post->title)}}
@endsection

@section('content')
    <div class="bg-white my-3 p-4">
        <div class="mb-3 post-header">
            <h4>{{strtoupper($post->title)}}</h4>
            <p>
                <span class="d-inline-block">By : {{$post->user->name}}</span>
                <span class="d-inline-block mx-3">Date : {{$post->created_at}}</span>
                <span>3 comments</span>
            </p>            
        </div>
        <div class="post-content">
            {{$post->content}}
        </div>

    </div>

    {{-- @dd($post->comments) --}}

    <div class="bg-white my-3 p-4">
    @forelse ($post->comments as $comment)
        <div class="comment mb-2">
            <p>
                <span class="d-inline-block fw-bold">{{$comment->author}}</span>
                <span class="mx-4">{{$comment->created_at->diffForHumans()}}</span>
            </p>
            <div class="comment-content">
                {{$comment->content}}
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            No comment at the moment
        </div>       
    @endforelse
    </div>
    
    
    <form action="" method="post">
    @csrf
        <div class="mb-3">
        <label for="author" class="form-label">Your name</label>
        <input type="text" value="{{old('author')}}" class="form-control" name="author" id="author" aria-describedby="helpId" placeholder="Your name">
        <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
        <label for="content" class="form-label">Comment content</label>
        <textarea class="form-control" name="content" id="content" rows="3">{{old('content')}}</textarea>
        </div>
        <x-alert-errors></x-alert-errors>
        <x-alert-success></x-alert-success>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection