<div>
    @foreach($albums as $album)
        @if ($album->userId == $idUser)
            <hr>
            
            <h3>
                {{$album->title}}
            </h3>
            <p>
                {{$album->id}}:{{$album->userId}}
            </p>
            @php
                $url = route('album', [
                    'idUser' => $idUser,
                    'idAlbum' => $album->id
                ]);
            @endphp
            <a href= {{$url}}>Voir</a>
            @php
                $url = route('user', [
                    'id' => $album->userId
                ]);
            @endphp
            <a href= {{$url}}>voir User</a>
        @endif
    @endforeach
</div>
