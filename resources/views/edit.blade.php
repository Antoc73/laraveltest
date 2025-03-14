@extends('layout.app') <!-- Utilise un layout si tu en as un -->

@section('content')
    <h1>Modifier le commentaire</h1>

    <!-- Si un message de succès est disponible -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de modification -->
    <form action="{{ route('updateComment', $comment->id) }}" method="POST">
        @csrf
        @method('GET')
    
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" value="{{ old('lastname', $comment->lastname) }}" required>
    
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" value="{{ old('firstname', $comment->firstname) }}" required>
    
        <label for="email">Email :</label>
        <input type="text" name="email" value="{{ old('email', $comment->email) }}" required>
    
        <label for="comment">Commentaire :</label>
        <textarea name="comment" required>{{ old('comment', $comment->comment) }}</textarea>
    
        <button type="submit">Modifier</button>
    </form>
    
    
@endsection
