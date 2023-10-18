<?php

namespace App\Http\Controllers;

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
        $posts = Post::with('user')
                    ->orderBy('id','desc')
                    ->paginate(10);
        
        return view('post.all',compact('posts'))->with('post_url');
    }
    public function create() : View
    {
        // Vue pour la création d'un nouveau post
        return view('post.create');
    }
    public function store(Request $request) : RedirectResponse
    {
        // Valider les données
        $request->validate([
            'title' => ['required','min:5'],
            'content' => ['required','min:5']
        ]);

        // Création d'un nouveau post
        $post = new Post();
        $post->user_id = 1;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();


        return redirect()->back()->with('success','Post created successfull');
    }

    public function show(Post $post) : View
    {
        // Passer le post à la vue pour l'affichage
        $post->load('comments');
        return view('post.show',compact('post'));
    }

    public function update(Post $post)
    {
        // Passer le post à la vue pour l'édition
        
        return view('post.update',compact('post'));
    }
    public function store_update(Post $post, Request $request)
    {
        // Sauvegarder les modifications d'un post après la validation
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return to_route('post.show',$post->id)->with('success','Post updated successfull');
    }

    public function delete(Post $post)
    {
        // Supprimer un post
        $post->delete();
        
        return to_route('post.all')->with('Post has been deleted with success');
    }

    public function add_comment(Post $post, Request $request): RedirectResponse
    {
        // Commenter le post

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->author = $request->author;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('success','Comment has been saved !');
    }
}
