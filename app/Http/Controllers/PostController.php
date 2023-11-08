<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function all()
    {
        // Récupérer tous les posts, les paginer et les envoyer à la vue
        $posts = Post::with(['user','category'])
                    ->orderBy('id','desc')
                    ->paginate(10);
        
        return view('post.all',compact('posts'));
    }
    public function category($category)
    {
        // Recupérer les posts d'une certaine catégorie
        $posts = Post::with(['user','category'])
                        ->where('category_id', $category)
                        ->orderBy('created_at','desc')
                        ->paginate(10);
        
        // Si la catégorie n'est pas retrouvé, renvoyé la page 404
        if ($posts->first() == null) {
            return view('404');
        }

        return view('post.all',compact('posts'));
    }
    public function create() : View
    {
        // Vue pour la création d'un nouveau post
        return view('post.create');
    }

    public function show(Post $post) : View
    {
        // Charger le post avec toutes les rélations
        $post->load(['comments.user','user:id']);

        return view('post.show',compact('post'));
    }

    public function update(Post $post)
    {
        // Passer le post à la vue pour l'édition
        
        return view('post.update',compact('post'));
    }

    public function delete(Post $post)
    {
        // Supprimer un post
        $post->delete();
        
        return to_route('post.all')->with('Post has been deleted with success');
    }
}
