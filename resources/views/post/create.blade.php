@extends('layouts.base')

@section('title','Créer un nouvel article')

@section('heading')
    Creation d'un nouvel article
@endsection


@section('content')
    <div class="container">
        @livewire('create-post')
    </div>
@endsection