<form method="post" role="form" class="bg-white shadow p-3" wire:submit='save_post'>
  @csrf
  
  <div class="row">
    <div class="col-md-6 form-group">
      <input type="text" name="title" wire:model='title' value="{{old('title')}}" class="form-control rounded-0 py-2 px-3" id="title" placeholder="Titre de l'article" >
    </div>
    <div class="col-md-6 form-group mt-3 mt-md-0">
      <select name="category" wire:model='category' class="form-control rounded-0 py-2 px-3">
        
        <option value="">Selectionner une catégorie ou pas</option>

        @foreach ($categories as $category)
          
            <option value="{{$category->id}}">{{$category->name}}</option>
          
        @endforeach

      </select>
    </div>
  </div>
  <div class="form-group mt-3">
    <textarea wire:model='content' class="form-control rounded-0 py-2 px-3" name="content" rows="5" placeholder="Contenu">{{old('content')}}</textarea>
  </div>

  <x-alert-success></x-alert-success>
  <x-alert-errors></x-alert-errors>

  @if ($message != null)
    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>{{$message}}</strong>
    </div>      
  @endif

  <div class="text-center mt-3">
    <button type="submit" class="d-inline-block btn btn-dark rounded-0">Save Post</button>
  </div>
</form>