@extends('layouts.app')

<script>
    function toggleReplyComment(id) {
        let element = document.getElementById('replycomment-' + id);
        element.classList.toggle('d-none');

    }
</script>

@section('content')
<div class="container">




    <div>
        <img src="{{asset($topic->poster)}}" width="500px" height="800px">
    </div>
    <div style="width: 500px;">
        <h4> {{$topic->titre}}</h4>
        <br>
        <p>{{$topic->date}}</p>
        <br>
        <p>{{$topic->genre}}</p>
        <br>
        <p>{{$topic->realisateur}}</p>
        <br>
        <p>{{$topic->acteur}}</p>
        <br>
        <p>{{$topic->synopsis}}</p>

    </div>
    <div>
        <a href="{{route('topics.edit',$topic)}}"><button>Modifier</button></a>
        <form action="{{route('topics.destroy',$topic)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>

    </div>
    <hr>
    <h5>COMMENTAIRES</h5>
    @forelse($topic->comments as $comment)
    <div style="background-color: white;">
        {{$comment->content}}
        <div class='d-flex justify-content-between align-items-center'>
            <small>Posté le {{$comment->created_at->format('d/m/y')}}</small>
            <span>{{$comment->user->name}}</span>
        </div>
    </div>
    @foreach ($comment->comments as $replycomment)
    <div class="card mb-2 ml-5" style="background-color: white;">
        {{$replycomment->content}}
        <div class='d-flex justify-content-between align-items-center'>
            <small>Posté le {{$replycomment->created_at->format('d/m/y')}}</small>
            <span>{{$replycomment->user->name}}</span>
        </div>
    </div>
    @endforeach
    @auth
    <button onclick="toggleReplyComment({{$comment->id}} )">Répondre</button>
    <form action="{{route('comments.storeReply',$comment)}}" method="POST" class="d-none" id="replycomment-{{ $comment->id }}">
        @csrf
        <label>Ma réponse</label>
        <textarea required class="form-control" name="replycomment" id="replycomment"></textarea>
        <input type="submit" value="Envoyer ma réponse">

    </form>
    @endauth
    @empty
    <div class="alert alert-info">aucun commentaire pour ce film

    </div>
    @endforelse
    <form action="{{route('comments.store',$topic)}}" method="POST">
        @csrf
        <label for="content">Votre commentaire</label>
        <textarea required class="form-control" name="content"></textarea>
        <button type="submit">Envoyer mon commentaire</button>
    </form>

</div>
@endsection