@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
        <img src="{{asset('images/elerning.png')}}" width="100%" alt="">
        <br><br>
        <div class="card">
            <div class="card-body">
                <h5 class="text-center"><strong>INGRESO AL SISTEMA</strong></h5>
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="dni" type="text"
                            class="form-control text-center @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}"
                            required autocomplete="dni" autofocus
                            placeholder="Ingrese su dni">

                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control text-center @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password"
                            placeholder="Ingrese su contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>

                    <div class="form-group row text-center">
                        <div class="col-md-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidastes tu contrseña?') }}
                                </a>
                            @endif
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                <i class="fas fa-sign-in-alt"></i> {{ __('INGRESAR') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
