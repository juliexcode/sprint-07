@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list">
        @foreach($topics as $topic)
        <a href="{{route('topics.show',$topic)}}">
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
</style>
@endsection