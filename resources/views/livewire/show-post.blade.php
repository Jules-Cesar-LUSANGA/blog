<article>
    <div class="bg-white my-3 p-4 shadow bg-body">
        <div class="mb-3 post-header">
            <h4>{{$post->title}}</h4>
            <p>
                <span class="d-inline-block">Par : <a href="{{route('about')}}" class="text-primary" wire:navigate>Jules-César LUSANGA</a></span>
                <span class="d-inline-block mx-3">Date : {{$post->created_at->toFormattedDateString()}}</span>

                @php
                    $comments_nb = $post->comments->count();
                @endphp

                <span>{{$comments_nb}} commentaire{{$comments_nb>1 ? 's' :''}}</span>
                
                @if(Auth::id() == 1)
                <span class="d-inline-block mx-3">
                    <a href="{{route('post.update',$post->slug)}}" wire:navigate>Edit</a>
                </span>
                @endif
            </p>            
        </div>
        <div class="content">
            {{$post->content}}
        </div>

    </div> 

    <div class="comments">

        <div class="bg-white bg-body shadow card rounded-0 border-0 px-3">
        @foreach ($post->comments as $comment)


        <div class="entry-comments-item p-2">
            

            @if($comment->user->id == 1)

                <img src="{{asset('assets/img/jc.jpg')}}" class="entry-comments-avatar" alt="">

            @else

                <img src="{{asset('assets_admin/img/profile-img.jpg')}}" class="entry-comments-avatar" alt="">

            @endif
            
            <div class="entry-comments-body">
              <span class="entry-comments-author text-primary d-inline-block pr-4 pb-2">{{$comment->user->name}}</span>
              <small class="text-muted">{{$comment->created_at->diffForHumans()}}</small>
              <p class="mb-10">
                {{$comment->content}} 
            </p>
            </div>
          </div>

        @endforeach        

        </div>


    @auth
        <form action="" method="post" wire:submit='add_comment' class="my-3 bg-transparent">   
        @csrf
            
            <textarea name="content" wire:model='content' rows="3" class="form-control rounded-0" aria-label="With textarea" placeholder="Ecrire quelque chose ..."></textarea>
            
            <button type="submit" class="btn btn-primary rounded-0 mt-2">Commenter</button>
        </form>
    @else
        <div class="alert alert-info" role="alert">
            Veuillez vous <a href="{{route('login')}}" wire:navigate>connecter</a> pour nous laisser un commentaire
        </div>
    @endauth
    </div>

</article>

