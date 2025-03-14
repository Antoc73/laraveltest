<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Titre TEST controller';
        $posts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($posts);
        //dump($posts);
        
        return view('blog', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function test()
    {
        $data = 'test testé';

        return $data;
    }

    public function create(){
        
    }

    public function delete(){
        
    }
}
