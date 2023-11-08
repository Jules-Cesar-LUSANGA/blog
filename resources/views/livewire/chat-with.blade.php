<div>

  @foreach ($chats as $chat)
    @if ($chat->sender->id == Auth::id())
      <div class="alert alert-secondary" role="alert">
        <h4 class="alert-heading">{{$chat->name}}</h4>
        <p>{{$chat->content}}</p>
      </div>        
    @else
      <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">{{$chat->name}}</h4>
          <p>{{$chat->content}}</p>
      </div>        
    @endif
  @endforeach    

    <form action="" method="post">
        @csrf
        <div class="input-group">
            <div class="mb-3">
              <textarea class="form-control" name="content" id="" rows="3">{{old('content')}}</textarea>
              <input type="submit" value="Send" class="btn btn-success">
            </div>
        </div>
    </form>
</div>
