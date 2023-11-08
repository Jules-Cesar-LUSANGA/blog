<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;

    #[Rule('required')]
    public $content;

    public function mount($post){
        $this->post = $post;
    }


    public function add_comment()
    {
        $comment = new Comment();
        $comment->post_id = $this->post->id;       
        $comment->user_id = Auth::id();
        $comment->content = $this->content;
        $comment->save();

        $this->content = null;
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
