@extends('layouts.base')

@section('title')
    @if (Route::is('post.category'))
      Tous les articles sur {{$posts->first()->category->name}}
    @else
      Tous les articles
    @endif
@endsection

@section('heading')
    @if (Route::is('post.category'))
      Tous les articles sur <span class="text-primary">{{$posts->first()->category->name}}</span>
    @else
      Tous les articles
    @endif
@endsection

@section('content')

<div class="container">
  <div class="row mb-2">
    

    @forelse ($posts as $post)

    <div class="col-md-12">
      <div class="row g-0 shadow border rounded overflow-hidden flex-md-row mb-4 shadosw-sm h-md-250 position-relative">
        <div class="col-auto d-none d-md-block d-lg-block">
          <img class="bd-placeholder-img" src="{{asset($post->category->photo != null ? 'storage/avatars/' . $post->category->photo : 'assets/img/hero-bg.jpg' )}}" width="250" height="250" />
        </div>
        <div class="col p-4 d-flex flex-column position-static pb-0">
          <strong class="d-inline-block mb-2 text-primary-emphasis">
            <a class="text-primary-emphasis" href="{{route('post.category',$post->category->id)}}" wire:navigate>{{$post->category->name}}</a>
          </strong>
          <h3 class="mb-0">{{$post->title}}</h3>
          <div class="mb-1 text-body-secondary">{{$post->created_at}}</div>
          <p class="card-text mb-auto">
            {{-- Vérifier si le contenu du post a +200 caractères afin de le couper --}}
            {{strlen($post->content) >= 200 ? substr($post->content,0,200) . ' [...]' : $post->content }} 
          </p>
          <p class="text-end">
            <a href="{{route('post.show',$post->slug)}}" class="btn rounded-pill btn-primary" wire:navigate >
              Continuer la lecture
            </a>
          </p>
        </div>
      </div>
    </div>

    @empty
    <div class="alert alert-info">
        <strong>Aucun article trouvé</strong>
    </div>
    @endforelse
  </div>
      
  {{$posts->links()}}  
</div>


@endsection