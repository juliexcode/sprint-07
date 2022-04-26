@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row ">

        <div style="text-align: center;" class="col">

            <img src="{{asset($topic->poster)}}" width="330px" height="480px">
        </div>

        <div style="text-align: center;" class="col">
            <h1 style="color: white; "> {{$topic->titre}}</h1>
            <br>
            <p class="card-text" id="date">{{$topic->date}} / {{$topic->genre}}</p>

            <p class="card-text" id="real">Par {{$topic->realisateur}}</p>

            <p class="card-text" id="acteur">Avec {{$topic->acteur}}</p>
            <br>

            <h5 id="synopsis">Synopsis:</h5>
            <p class="card-text" id="resume">{{$topic->synopsis}}</p>

            <div id='btns'>
                @can('update',$topic)
                <a href="{{route('topics.edit',$topic)}}"><button id="modif" class="btn btn-dark">Modifier</button></a>
                @endcan
                @can('delete',$topic)
                <form action="{{route('topics.destroy',$topic)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="sup" class="btn btn-dark" type="submit">Supprimer</button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>

<hr>
<h5 style="color: white;margin-left:89px;">ESPACE COMMENTAIRES</h5>
<div style=" width:1262px; margin-left:89px;">
    @foreach($comments as $comment)
    <div id="espCom">
        <div style="padding-left: 20px;">
            <span style="font-size: 18px;color:white;">{{$comment->user->name}}:</span> <span style="font-size: 15px;padding-left:20px">{{$comment->content}}<span>
                    <div>

                        <small>Posté le {{$comment->created_at->format('d/m/y')}}</small>

                    </div>
                    @can('update',$comment)
                    <div id="btnCom">
                        <a href="{{route('comments.edit',$comment)}}">
                            <button id="modBtn">Modifier mon commentaire</button></a>
                        @endcan
                        @can('delete',$comment)
                        <form action="{{route('comments.destroy',$comment->id)}}" class="delete_form" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="supBtn" type="submit">Supprimer mon commentaire</button>
                        </form>
                    </div>
                    @endcan
        </div>
    </div>
    @endforeach
</div>
<br>
<div style="width:1262px; margin-left:89px;">
    <form action="{{route('comments.store',$topic)}}" method="POST">
        @csrf
        <input class="visually-hidden" name='inputIdMovie' value="{{$topic->id}}" readonly>
        <label style="color: white;" for="content">Votre commentaire</label>
        <textarea id="com" required class="form-control" name="content" placeholder="Écrivez votre commentaire ici"></textarea>
        <button id="envyCom" type="submit">Envoyer mon commentaire</button>
    </form>
</div>
</div>
@endsection
<style>
    h4 {
        color: white;

    }

    #date {
        color: white;

    }

    #genre {
        color: white;

    }

    #real {
        color: white;

    }

    #acteur {
        color: white;

    }

    #synopsis {

        color: rgba(44, 117, 255, 1);

    }

    #resume {
        color: white;

    }

    #btns {
        display: inline-flex;
    }

    #modif {

        background-color: rgba(44, 117, 255, 1);
        border: rgba(44, 117, 255, 1) solid;
        border-radius: 20px;


    }

    #sup {
        margin-left: 25px;
        display: inline;
        background-color: rgba(223, 56, 56, 1);
        border: rgba(223, 56, 56, 1) solid;
        border-radius: 20px;


    }

    #espCom {
        margin-top: 20px;
        border: 2px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 10px;
        color: white;

    }

    #btnCom {
        display: inline-flex;
    }

    #modBtn {
        border: 1px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: rgba(44, 117, 255, 1);
    }

    #supBtn {
        margin-left: 25px;
        display: inline;
        border: 1px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: rgba(44, 117, 255, 1);
    }

    #com {
        border: 2px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: white;

    }

    #envyCom {
        margin-top: 15px;
        width: 230px;
        height: 35px;
        border: 1px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: rgba(44, 117, 255, 1);
    }
</style>