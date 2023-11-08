<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    public function categories()
    {
        // Récupérer les catégories
        $categories = Category::all();

        return $categories;
    }

    public function index()
    {
        // Récupérer toutes les catégories
        $categories = $this->categories();

        // Renvoyer à la vue
        return view('category.index',compact('categories'));
    }
    public function create(Request $request)
    {
        // Création de la catégorie
        $category = new Category();
        $category->name = $request->name;

        /**
         * Recupérer la photo et ses informations* 
        */

        $file = $request->file('photo');
        $file_extension = $file->getClientOriginalExtension();
        $file_name = (Category::count() + 1) . '.' . $file_extension;

        $file->storeAs('avatars',$file_name,'public');

        /**
        * --- Fin du traitement de la photo ---
        */
        // Stocker le nom de la photo dans la base de données
        $category->photo = $file_name;
        
        $category->save();

        return redirect()->back();
    }

    public function update(Category $category)
    {
        // Récupérer les catégories
        $categories = $this->categories();

        // Renvoyer la catégorie pour l'éditer
        return view('category.index', compact('category','categories'));
    }
    public function store_update(Category $category, Request $request)
    {
        // Valider le nom de la catégorie

        $request->validate([
            'name' => 'required'
        ]);

        $category->name = $request->name;

        // Récupérer la photo s'il y en a
        $file = $request->file('photo');

        if ($file != null) {
            /* --- Traitement de la photo -- */
            $file_extension = $file->getClientOriginalExtension();
            $file_name = $category->id . '.' . $file_extension;

            $file->storeAs('avatars',$file_name,'public');
            /* --- Fin du traitement, et stockage du nom dans la base --*/
            $category->photo = $file_name;            
        }
        
        // Enregistrer les modifications
        $category->save();

        return to_route('category.index');
    }
}
