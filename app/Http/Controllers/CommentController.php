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
}