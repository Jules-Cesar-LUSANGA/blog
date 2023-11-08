@extends('layouts.base')

@section('title','Demandes de contact')

@section('heading','Demandes de contact')

@section('content')

<div class="container mb-3">
	@forelse ($messages as $message)
	
	<article class="border-start border-info border-3 mb-2 px-3 py-1 shadow">
		<p class="mb-1 fw-bold">{{ $message->name }} ({{ $message->email }})</p>
		<div>
			{{ $message->content }}
		</div>
	</article>

	@empty

	<article class="border-start border-info border-3 mb-2 fw-bold px-3 py-2 shadow-lg">
		Aucun message pour l'instant
	</article>

	@endforelse

	{{ $messages->links() }}
</div>

@endsection