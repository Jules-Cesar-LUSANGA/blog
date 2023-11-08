<form action="" method="post" wire:submit='update_post'>
    @csrf
    <div class="form-group">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" wire:model='title' value="{{$post->title ? $post->title : old('title')}}" class="form-control rounded-0 py-2 px-3" id="title" placeholder="Your Post Title" >
    </div>

    @error('title')
        <div class="text-danger my-1">{{$message}}</div>   
    @enderror

    <div class="form-group mt-3">
        <label for="content" class="form-label">Content</label>
        <textarea wire:model='content' class="form-control rounded-0 py-2 px-3" name="content" rows="5" placeholder="Your content">{{$post->content ? $post->content : old('content')}}</textarea>
    </div>
    @error('content')
        <div class="text-danger my-1">{{$message}}</div>
    @enderror
    <div class="text-center mt-3">
        <button type="submit" class="d-inline-block btn btn-dark rounded-0">Update Post</button>
    </div>
</form>