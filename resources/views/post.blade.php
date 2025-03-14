<div>
    c'est un post: 
    @php
        $post = $posts[$id-1];
    @endphp
    <p>
        {{$post->id}}:{{$post->userId}}
    </p>
    <h3>
        {{$post->title}}
    </h3>
    <p>
        {{$post->body}}
    </p>

    <h2>add Comment</h2>

    <form action="{{ route('addComment') }}" method="post">
        @csrf
        <input type="hidden" name="postId" value="{{$post->id}}">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="comment" placeholder="body">
        <button type="submit">Add Comment</button>
    </form>

    @if(session('success'))
        <div>
            {{session('success')}}
        </div>
    @endif

    @foreach ($comments as $comment)
        <hr>
        <p>{{ $comment->firstname }}</p>
        <p>{{ $comment->lastname }}</p>
        <p>{{ $comment->email }}</p>
        <p>{{ $comment->comment }}</p>
        
        <form action="{{ route('supComment', $comment->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
        <form action="{{ route('ediComment', $comment->id) }}" method="POST">
            @csrf
            @method('GET')
            <button type="submit">Editer</button>
        </form>
    @endforeach


    @php
        $url = route('user', [
            'id' => $post->userId
        ]);
    @endphp
    <a href= {{$url}}>voir User</a>
    <br>
    @php
        $url = route('blog');
    @endphp
    <a href= {{$url}}>Retour</a>


</div>
 