<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        // Récupérer les données validées
        $comment= new Comment();
        
        $comment -> lastname = $request->input('lastname');
        $comment -> firstname = $request->input('firstname');
        $comment -> email = $request->input('email');
        $comment -> postId = $request->input('postId');
        $comment -> comment = $request->input('comment');

        $comment->save();

        return redirect()->route('post', $request->input('postId'))->with('success','Commentaire enregistré avec succès');
    }

    public function supComment($id)
    {
        // Vérifier si le commentaire existe
        $comment = Comment::find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Commentaire introuvable.');
        }

        // Supprimer le commentaire
        $comment->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }

    public function ediComment($id)
    {
        $comment = Comment::findOrFail($id); // Trouver le commentaire
        return view('edit', compact('comment')); // Retourne la vue
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id); // Trouve le commentaire

        // Validation des données
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        // Mise à jour des données
        $comment->update([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
        ]);

        // Redirection avec message de succès
        return redirect()->route('post', ['id' => $comment->postId])
                        ->with('success', 'Commentaire modifié avec succès.');
    }



}