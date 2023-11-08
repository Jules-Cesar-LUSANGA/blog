@extends('layouts.base')

@section('title')
    {{$post->title}}
@endsection

@section('content')

<div class="container px-3">

    @livewire('show-post',['post' => $post])

</div>


@endsection