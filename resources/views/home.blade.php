@extends('layouts.base')

@section('title','Accueil')

@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center">
      <h1>Jules-César LUSANGA</h1>
      <h2 class="text-dark">Bienvenue sur mon blog</h2>
      <a href="{{route('post.all')}}" wire:navigate class="btn-about">Voir mes articles</a>
    </div>
</section>
@endsection
