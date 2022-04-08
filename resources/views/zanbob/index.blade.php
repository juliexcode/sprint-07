@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        @foreach($topics as $topic)
        <div class="card">
            <h4> {{$topic->titre}}</h4>
            <p>{{$topic->synopsis}}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection