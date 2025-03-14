<div>

    @php
        $info = $infos[$id-1];
    @endphp
    
    <div>
        {{$info->name}}<br>
        {{$info->username}}<br>
        {{$info->email}}<br>
        {{$info->address->street}}<br>
        {{$info->address->suite}}<br>
        {{$info->address->city}}<br>
        {{$info->address->zipcode}}<br>
        {{$info->address->geo->lat}}<br>
        {{$info->address->geo->lng}}<br>
        {{$info->phone}}<br>
        {{$info->website}}<br>
        {{$info->company->name}}<br>
        {{$info->company->catchPhrase}}<br>
        {{$info->company->bs}}<br>
    </div>

    @php
        $url = route('albums', [
            'idUser' => $id
        ]);
    @endphp
    <a href= {{$url}}>Voir albums</a>

    <hr><hr>

    ses posts: 
    @foreach($posts as $post)
        @if ($post->userId == $id)
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
        @endif
    @endforeach
</div>
