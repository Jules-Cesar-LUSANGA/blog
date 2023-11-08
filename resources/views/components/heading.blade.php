<h1 class="h2">
	@if (Route::is('post.category'))
		Tous les articles sur {{$slot}}
    @else
		Tous les articles
	@endif
</h1>