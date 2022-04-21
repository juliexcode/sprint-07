@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row justify-content-md-center">


        <div class="col ">
            <img src="{{asset($topic->poster)}}" width="350px" height="500px">
        </div>
        <div class="col ">
            <h4> {{$topic->titre}}</h4>
            <br>
            <p id="date">{{$topic->id}}</p>
            <br>
            <p id="date">{{$topic->date}}</p>
            <br>
            <p id="genre">{{$topic->genre}}</p>
            <br>
            <p id="real">{{$topic->realisateur}}</p>
            <br>
            <p id="acteur">{{$topic->acteur}}</p>
            <br />

            <p id="synopsis">Synopsis</p>
            <p id="resume">{{$topic->synopsis}}</p>

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
    <br>

    <hr>
    <h5>COMMENTAIRES</h5>
    @foreach($comments as $comment)
    <div style="background-color: white;">
        {{$comment->content}}
        <div class='d-flex justify-content-between align-items-center'>
            <small>Posté le {{$comment->created_at->format('d/m/y')}}</small>
            <span>{{$comment->user->name}}</span>
        </div>
        @can('update',$comment)
        <a href="{{route('comments.edit',$comment)}}">
            <button>Modifier mon commentaire</button></a>
        @endcan
        @can('delete',$comment)
        <form action="{{route('comments.destroy',$comment->id)}}" class="delete_form" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer mon commentaire</button>
        </form>
        @endcan
    </div>

    @endforeach

    <form action="{{route('comments.store',$topic)}}" method="POST">
        @csrf
        <input class="visually-hidden" name='inputIdMovie' value="{{$topic->id}}" readonly>
        <label for="content">Votre commentaire</label>
        <textarea required class="form-control" name="content"></textarea>
        <button type="submit">Envoyer mon commentaire</button>
    </form>

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
        color: white;

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

        display: inline;
        background-color: rgba(223, 56, 56, 1);
        border: rgba(223, 56, 56, 1) solid;
        border-radius: 20px;


    }
</style>