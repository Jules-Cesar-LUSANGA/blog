@extends('base')

@section('title','Create a new post')

@section('content')
    <div>
        <h1>Create a new post</h1>
        <form action="" method="post">
          @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" value="{{old('title')}}" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Post title">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Post content</label>
              <textarea class="form-control" name="content" id="content" rows="3">{{old('content')}}</textarea>
            </div>
            <x-alert-errors></x-alert-errors>
            <x-alert-success></x-alert-success>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection