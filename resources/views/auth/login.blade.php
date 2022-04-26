@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">



        <div id="cadre">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <label style="color:white;" for="email" class="col-md-4 col-form-label text-md-end">Adresse email</label>

                    <div class="col-md-2">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre adresse email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label style="color:white;" for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrez votre mot de passe" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label style="color:white;" class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" id="log" class="btn btn-primary">
                            Se connecter
                        </button>

                        @if (Route::has('password.request'))
                        <a style="color:rgba(44, 117, 255, 1);" class="btn btn-link" href="{{ route('password.request') }}">
                            Mot de passe oublié?
                        </a>
                        @endif


                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
<div style="height: 150px;">

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
</style>