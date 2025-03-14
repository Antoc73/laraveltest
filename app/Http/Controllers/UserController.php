<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function read($id){
        //dump($id);
        $posts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
        $infos = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $posts = json_decode($posts);
        $infos = json_decode($infos);

        return view('user', [
            'id' => $id,
            'posts' => $posts,
            'infos' => $infos
        ]);
    }
}
