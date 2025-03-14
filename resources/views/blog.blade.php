@extends('layout.app')

@section('content')
    <div>
        <!-- When there is no desire, all things are at peace. - Laozi -->
        {{$title}}
        dzasdazda

        @foreach($posts as $post)
            <hr>
            <p>
                {{$post->id}}:{{$post->userId}}
            </p>
            <h3>
                {{$post->title}}
            </h3>
            <p>
                {{$post->body}}
            </p>

            @php
                $url = route('post', [
                    'id' => $post->id
                ]);
            @endphp
            <a href= {{$url}}>Voir</a>
        @endforeach
    </div>
@endsection
