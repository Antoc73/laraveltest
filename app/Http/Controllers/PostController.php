<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class PostController extends Controller
{
    public function create(){
        
    }

    public function read($id)
    {
        // Récupérer les posts depuis l'API (si nécessaire)
        $posts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($posts);

        // Récupérer les commentaires depuis la base de données
        $comments = Comment::where('postId', $id)->get();
        dump($comments);

        return view('post', [
            'id' => $id,
            'posts' => $posts,
            'comments' => $comments
        ]);
    }
}
