<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Normalizer\SlugNormalizer;
use Livewire\Attributes\Rule;

class CreatePost extends Component
{
    public $category = null;
    public $title = null;
    public $content = null;

    public $message = null;

    public function save_post()
    {
        // Créer un nouvel article
        $post = new Post();
        $post->user_id = Auth::id();

        // Vérifier si l'utilisateur n'a pas choisi une catégorie, afin de classer le post comme hors-categorie
        $post->category_id = $this->category != null ? $this->category : 1;

        $post->title = $this->title;
        $post->slug = \Str::slug($this->title);
        $post->content = $this->content;
    
        $post->save();

        $this->message = "L'article a été publié avec succèss !";

        $this->reset(['category','title','content']);
    }

    public function render()
    {
        // Récupérer les catégories des posts
        $categories = Category::all('id','name');
        return view('livewire.create-post', compact('categories'));
    }
}
