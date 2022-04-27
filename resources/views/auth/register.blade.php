@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div id="cadre">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" style="color:rgba(44, 117, 255, 1);" class="col-md-4 col-form-label text-md-end">Nom</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" style="color:rgba(44, 117, 255, 1);" class="col-md-4 col-form-label text-md-end">Adresse email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" style="color:rgba(44, 117, 255, 1);" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" style="color:rgba(44, 117, 255, 1);" class="col-md-4 col-form-label text-md-end">Confirmer le mot de passe</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                S'inscrire
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div style="height: 100px;">

</div>
@endsection
<style>
    #cadre {

        width: 750px;
        background-color: rgba(39, 39, 39, 1);
        border: 4px solid rgba(44, 117, 255, 1);
        border-radius: 30px;
    }

    form {
        margin-top: 35px;
        width: 500px;
        margin-left: 100px;
    }

    #email {
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 10px;
        width: 400px;
        background-color: black;
        color: white;
    }

    #email::placeholder {
        color: white;
    }

    #name {
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 10px;
        width: 400px;
        background-color: black;
        color: white;
    }

    #name::placeholder {
        color: white;
    }

    #password {
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 10px;
        width: 400px;
        background-color: black;
        color: white;
    }

    #password::placeholder {
        color: white;
    }

    #password-confirm {
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 10px;
        width: 400px;
        background-color: black;
        color: white;
    }

    #password-confirm::placeholder {
        color: white;
    }
</style>