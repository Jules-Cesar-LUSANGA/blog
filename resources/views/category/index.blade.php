@extends('layouts.base')

@section('title','Catégories')
@section('heading','Catégories')

@section('content')
	<div class="container">
		<form method="POST" enctype="multipart/form-data" action="{{Route::is('category.index') ? route('category.create') : ''}}" class="shadow p-3 mb-3">
			@csrf
			<div class="row">
				<div class="form-group col-6">
					<label class="form-label">Nom de la categorie</label>
					<input type="text" class="form-control rounded-0" name="name" value="{{Route::is('category.update') ? $category->name : ''}}" />
				</div>			
				<div class="form-group col-6">
					<label class="form-label">Photo de la categorie</label>
					<input class="form-control rounded-0" type="file" name="photo" />
				</div>			
			</div>

			<input type="submit" class="btn btn-primary my-2 rounded-0" value="Enregistrer">
		</form>

		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Nom</td>
					<td>Nombre d'articles</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>

				@foreach($categories as $category)

				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->posts()->count()}}</td>
					<td>
						<a href="{{route('category.update',$category->id)}}" class="btn btn-primary" wire:navigate>Editer</a>
					</td>
				</tr>

				@endforeach

			</tbody>
		</table>



	</div>


@endsection
