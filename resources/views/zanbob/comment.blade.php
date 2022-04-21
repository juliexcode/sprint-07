@extends('layouts.app')

@section('content')
<div class="container-md">
    @if(session('status'))
    <h6 style="color: rgba(41, 226, 82, 1);">{{session('status')}}</h6>
    @endif
    <div id="cadre" class="container-md">
        <form action="{{Route('comments.update',$comment->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <input class="visually-hidden" name='inputIdMovie' value="{{$comment->id_movie}}" readonly>


                <br>
                <label style="color:white;" class="form-label">ommentaire</label> <br>
                <textarea id="champs" class="form-control" type="text" name="content" required autocomplete="off">
                {{$comment->content}}
                </textarea>




                <input id="btn" type="submit" value="Modifier" name="submit">
            </div>
        </form>



    </div>

</div>

<style>
    #cadre {
        background-color: rgba(39, 39, 39, 1);
        margin-left: 150px;
        height: 799px;
        width: 900px;
        border: 4px solid rgba(44, 117, 255, 1);
        border-radius: 30px;
    }

    form {
        margin-top: 35px;
        width: 500px;
        margin-left: 100px;
    }

    #champs {
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 10px;
        width: 650px;
        background-color: black;
        color: white;
    }

    #champs::placeholder {
        color: white;
    }



    #btn {
        margin-left: 535px;
        margin-top: 17px;
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 5px;
        background-color: black;
        color: white;
        width: 113px;
        height: 35px;
    }
</style>
@endsection