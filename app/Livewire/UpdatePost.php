<?php

namespace App\Livewire;

use App\Http\MyClasses\Str;
use Livewire\Component;

class UpdatePost extends Component
{
    public $post = null;
    public $title = null;
    public $content = null;


    public function mount($post)
    {
        $this->post = $post;
        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function update_post()
    {
        $this->validate([
            'title' => ['required','min:5', 'max:75'],
            'content' => ['required','min:5']
        ]);

        // Update this post
        $this->post->title = $this->title;
        $this->post->slug = \Str::slug($this->title);
        $this->post->content = $this->content;
        $this->post->save();

        return to_route('post.show', $this->post->slug)->with('Your post has been updated');
    }

    public function render()
    {
        return view('livewire.update-post');
    }
}
