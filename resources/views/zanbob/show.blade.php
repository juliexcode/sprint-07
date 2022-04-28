@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row ">

        <div style="text-align: center;" class="col">

            <img src="{{asset($topic->poster)}}" width="330px" height="480px">
        </div>

        <div style="text-align: center;" class="col">
            <h1 style="color: white;font-size:64px "> {{$topic->titre}}</h1>
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

    <br>

    <hr>
    <h5 style="color: white;margin-left:20px;">ESPACE COMMENTAIRES</h5>
    <div style=" width:100%; margin-left:20px;">
        @foreach($comments as $comment)
        <div id="espCom">
            <div style="padding-left: 20px; width:100%;padding-top:10px;padding-bottom:5px">
                <span style="font-size: 18px;color:white;text-transform:capitalize;font-style:italic;">{{$comment->user->name}} :</span>
                <span style="font-size: 15px;padding-left:20px;">{{$comment->content}}</span>

                <div style="justify-content: space-around;">
                    @can('update',$comment)
                    <div id="btnCom">
                        <a href="{{route('comments.edit',$comment)}}">
                            <button id="modBtn">Modifier</button></a>
                        @endcan
                        @can('delete',$comment)
                        <form action="{{route('comments.destroy',$comment->id)}}" class="delete_form" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="supBtn" type="submit">Supprimer</button>
                        </form>
                    </div>
                    @endcan
                    <div>

                        <small style="font-style:italic;">Posté le {{$comment->created_at->format('d/m/y')}}</small>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>

    <div style="width:100%; margin-left:20px; margin-top:50px">
        <form action="{{route('comments.store',$topic)}}" method="POST">
            @csrf
            <input class="visually-hidden" name='inputIdMovie' value="{{$topic->id}}" readonly>
            <textarea id="com" required class="form-control" name="content" placeholder="Écrivez votre commentaire ici"></textarea>
            <button id="envyCom" type="submit">Soumettre mon commentaire</button>
        </form>
    </div>
</div>
</div>
@endsection
<style>
    #date {
        color: white;
        font-size: 20px;

    }

    #genre {
        color: white;
        font-size: 20px;
    }

    #real {
        color: white;
        font-size: 20px;
    }

    #acteur {
        color: white;
        font-size: 20px;
    }

    #synopsis {
        font-size: 20px;
        color: rgba(44, 117, 255, 1);

    }

    #resume {
        color: white;
        font-size: 20px;
    }

    #btns {
        display: inline-flex;
    }

    #modif {

        background-color: rgba(44, 117, 255, 1);
        border: rgba(44, 117, 255, 1) solid;
        border-radius: 20px;
    }

    #modif:hover {
        box-shadow: 4px 4px 1px rgba(44, 117, 255, 0.5);
    }

    #sup {
        margin-left: 25px;
        display: inline;
        background-color: rgba(223, 56, 56, 1);
        border: rgba(223, 56, 56, 1) solid;
        border-radius: 20px;
    }

    #sup:hover {
        box-shadow: 4px 4px 1px rgba(223, 56, 56, 0.5);
    }


    #espCom {
        margin-top: 20px;
        border: 2px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 10px;
        color: white;

    }

    #btnCom {

        margin-top: -30px;
        width: 1200px;
        text-align: end;
    }

    #modBtn {
        border: 1px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: rgba(44, 117, 255, 1);
    }

    #modBtn:hover {
        border: 1px solid rgba(44, 255, 242, 1);
        background-color: rgba(39, 39, 39, 1);
        color: rgba(44, 255, 242, 1);
    }

    #supBtn {
        margin-top: 8px;
        border: 1px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: rgba(44, 117, 255, 1);
    }

    #supBtn:hover {
        border: 1px solid rgba(44, 255, 242, 1);
        background-color: rgba(39, 39, 39, 1);
        color: rgba(44, 255, 242, 1);
    }


    #com {
        border: 2px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: white;

    }

    #com:active {
        border: 2px solid rgba(44, 255, 242, 1);
    }


    #envyCom {
        margin-top: 15px;
        width: 238px;
        height: 35px;
        border: 1px solid rgba(44, 117, 255, 1);
        background-color: rgba(39, 39, 39, 1);
        border-radius: 5px;
        color: rgba(44, 117, 255, 1);
    }

    #envyCom:hover {
        border: 1px solid rgba(44, 255, 242, 1);
        background-color: rgba(39, 39, 39, 1);
        color: rgba(44, 255, 242, 1);
    }
</style>