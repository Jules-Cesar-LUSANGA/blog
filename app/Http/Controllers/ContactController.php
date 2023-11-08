<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        // Valider les données
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'content' => 'required|min:3'
        ]);

        // Enregistrer la demande de contact
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->content = $request->content;
        $contact->save();

        // Renvoyer l'utilisateur sur la page avec un message de success
        return redirect()->back()->with('success','Votre message nous a été envoyé avec success');
    }
    public function messages()
    {
        // Récupérer toutes les demandes de contact
        $messages = Contact::orderBy('id','desc')->paginate(10);

        return view('contact.messages', compact('messages'));
    }
}
