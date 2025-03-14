<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function readAll($idUser){

        $albums = file_get_contents('https://jsonplaceholder.typicode.com/albums');
        $albums = json_decode($albums);
        return view('albums', [
            'idUser' => $idUser,
            'albums' => $albums
        ]);
    }

    public function readOne($idUser, $idAlbum){

        $albums = file_get_contents('https://jsonplaceholder.typicode.com/albums');
        $albums = json_decode($albums);

        $photos = file_get_contents('https://jsonplaceholder.typicode.com/photos');
        $photos = json_decode($photos);

        return view('album', [
            'idUser' => $idUser,
            'idAlbum' => $idAlbum,
            'photos' => $photos,
            'albums' => $albums
        ]);
    }
}
