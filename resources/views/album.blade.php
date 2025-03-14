<div>
    @php
    $album = $albums[$idAlbum-1]
    @endphp

    <hr>
    
    <h3>
        {{$album->title}}
    </h3>
    <p>
        {{$album->id}}:{{$album->userId}}
    </p>

    @php
        $url = route('user', [
            'id' => $album->userId
        ]);
    @endphp
    <a href= {{$url}}>voir User</a>

    <hr>
    <hr>

    @foreach($photos as $photo)
        @if ($photo->albumId == $idAlbum)
            <p>
                {{$photo->id}}
            </p>
            <h3>
                {{$photo->title}}
            </h3>
            <img src= {{$photo->thumbnailUrl}}>
            </img>
        @endif
    @endforeach
</div>
