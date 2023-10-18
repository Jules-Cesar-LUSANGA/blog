@extends('base')

@section('title')
    Edit : {{$post->title}}
@endsection

@section('content')
    <div>
        <h1>Edit {{$post->title}}</h1>
        <form action="" method="post">
          @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" value="{{$post->title ? $post->title : old('title')}}" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Post title">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Post content</label>
              <textarea class="form-control" name="content" id="content" rows="3">{{$post->content ? $post->content : old('content')}}</textarea>
            </div>
            <x-alert-errors></x-alert-errors>
            <x-alert-success></x-alert-success>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection