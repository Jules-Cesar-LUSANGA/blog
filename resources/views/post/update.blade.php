@extends('layouts.base')

@section('title')
  Modifier {{$post->title}}
@endsection

@section('heading')
  Modifier : {{$post->title}}
@endsection

@section('content')
  <div class="container">
    @livewire('update-post', ['post' => $post])    
  </div>
@endsection