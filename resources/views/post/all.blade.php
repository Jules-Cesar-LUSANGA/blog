@extends('base')

@section('title','All posts')

@section('content')
<h1 class="h2 text-end">Blog Posts</h1>
<div class="row mb-2">
    @forelse ($posts as $post)

    <div class="col-xl-6 col-lg-6 col-xxl-4" style="">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success-emphasis">Laravel</strong>
          <h3 class="mb-0">{{$post->title}}</h3>
          <div class="row my-2">
            <div class="col-6 mb-1 text-body-secondary">{{$post->user->name}}</div>
            <div class="col-6 mb-1 text-body-secondary text-end">{{$post->created_at->diffForHumans()}}</div>
          </div>
          
          <p>{{substr($post->content,0,200)}} [...]</p>
          <a href="{{route('post.show',$post->id)}}" wire:navigate class="icon-link gap-1 text-primary icon-link-hover">
            Continue reading
            <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
          </a>
        </div>
      </div>
    </div>
    
    @empty
    <div class="alert alert-info">
        <strong>No post found !</strong>
    </div>
    @endforelse
</div>
    
{{$posts->links()}}

@endsection