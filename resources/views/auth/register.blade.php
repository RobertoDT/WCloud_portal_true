@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nome -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Nome -->

                        <!-- Cognome -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="cognome" class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>

                            <div class="col-md-6">
                                <input id="cognome" type="text" class="form-control @error('cognome') is-invalid @enderror" name="cognome" value="{{ old('cognome') }}" required autocomplete="cognome" autofocus>

                                @error('cognome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Cognome -->

                        <!-- Ragione Sociale -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="ragione_sociale" class="col-md-4 col-form-label text-md-right">{{ __('Ragione Sociale') }}</label>

                            <div class="col-md-6">
                                <input id="ragione_sociale" type="text" class="form-control @error('ragione_sociale') is-invalid @enderror" name="ragione_sociale" value="{{ old('ragione_sociale') }}" autocomplete="ragione_sociale" autofocus>
                                
                                @error('ragione_sociale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Ragione Sociale -->

                        <!-- Email -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Email -->

                        <!-- Password -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Password -->

                        <!-- Confirm Password -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- /Confirm Password -->

                        <!-- Indirizzo -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="indirizzo" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="indirizzo" type="text" class="form-control @error('indirizzo') is-invalid @enderror" name="indirizzo" value="{{ old('indirizzo') }}" autocomplete="indirizzo">

                                @error('indirizzo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Indirizzo -->

                        <!-- Città -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="citta" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                            <div class="col-md-6">
                                <input id="citta" type="text" class="form-control @error('citta') is-invalid @enderror" name="citta" value="{{ old('citta') }}" autocomplete="indirizzo">

                                @error('citta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Città -->

                        <!-- Numero di telefono -->
                        <div class="form-group row" style="margin-bottom: 20px;">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Numero di Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /Numero di telefono -->

                        <!-- Pulsanti -->
                        <div class="row">
                            <div class="col-md-4 col-form-label text-md-right">

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 ">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <a style="color:white; text-decoration:none;" href="{{route('login')}}">
                                            <button type="button" class="btn btn-secondary">Hai già un account?</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Pulsanti -->

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
