@extends('layouts.app')

@section('content')
<div class="container">



    <div class="list">
        @foreach($topics as $topic)
        <a id="lien" href="{{route('topics.show',$topic)}}">
            <div id="card">
                <div style="height: 60px;">
                    <h4 id="titre"> {{$topic->titre}}</h4>
                </div>
                <img src="{{asset($topic->poster)}}" width="222px" height="337px">
            </div>
        </a>
        @endforeach


    </div>
    <div class="d-flex justify-content-center mt-3">
        {{$topics->links()}}
    </div>
</div>
<style>
    #ajout {
        height: 40px;
        width: 150px;
        color: white;
        background-color: rgba(44, 117, 255, 1);
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 5px;
    }

    #ajout:hover {
        font-size: 17px;
        background-color: rgba(0, 88, 255, 1);
        border: 2px solid rgba(44, 117, 255, 1)
    }

    #ajout:active {
        font-size: 16px;
        background-color: rgba(13, 83, 217, 1);
        border: 3px solid rgba(0, 49, 142, 1);
        border-radius: 6px;

    }

    #card {
        text-align: center;
        width: 250px;
        height: 420px;
    }

    .list {
        justify-content: space-around;
        display: flex;
        flex-wrap: wrap;
    }

    #titre {
        word-wrap: break-word;
        color: rgba(44, 117, 255, 1);
        text-align: center;
    }

    a {
        text-decoration: none;
    }

    #lien:hover {
        text-decoration: overline;
    }
</style>
@endsection