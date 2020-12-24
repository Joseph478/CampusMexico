@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                <div class="card-header">
                    <ul class="nav-tabs nav nav-justified">
                        <li class="nav-item"><a href="#personal" class="nav-link active" data-toggle="tab">Individual</a></li>
                        <li class="nav-item"><a href="#Company" class="nav-link" data-toggle="tab">Empresa</a></li>
                    </ul>
                </div>


                <div class="card-body tab-content">
                    <div class="tab-pane fade show active" id="personal">
                        <h4 class="card-subtitle mb-3">Registre sus datos personales</h4>
                        <form method="POST" action="{{ route('register') }}">

                            @csrf

                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">Dni</label>
                                <div class="col-md-6">
                                    <input id="dni" type="text"
                                           class="form-control @error('dni') is-invalid @enderror" name="dni"
                                           value="{{ old('dni') }}" required autocomplete="dni" autofocus placeholder="Ingrese su dni">
                                    @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingrese su nombre">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Apellidos</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                           value="{{ old('last_name') }}" autocomplete="last_name" placeholder="Ingrese sus apellido">
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required
                                           autocomplete="phone" placeholder="Ingrese su telefono o celular">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese su email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password" placeholder="Ingrese su password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                           required autocomplete="new-password" placeholder="Repita su password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrate
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="company">
                        <h4 class="card-subtitle mb-3">Registre sus datos personales y de su empresa</h4>
                        <form method="POST" action="{{ route('register.company') }}">

                            @csrf

                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">Dni</label>
                                <div class="col-md-6">
                                    <input id="dni" type="text"
                                           class="form-control @error('dni1') is-invalid @enderror" name="dni1"
                                           value="{{ old('dni1') }}" required autocomplete="dni" autofocus placeholder="Ingrese su dni">
                                    @error('dni1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control @error('name1') is-invalid @enderror" name="name1"
                                           value="{{ old('name1') }}" required
                                           autocomplete="name" autofocus placeholder="Ingrese su nombre">
                                    @error('name1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Apellido Materno</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name1') is-invalid @enderror" name="last_name1"
                                           value="{{ old('last_name1') }}" required autocomplete="last_name1" autofocus
                                           placeholder="Ingrese sus apellidos">
                                    @error('last_name1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ruc" class="col-md-4 col-form-label text-md-right">Ruc</label>
                                <div class="col-md-6">
                                    <input id="ruc" type="text"
                                           class="form-control @error('ruc1') is-invalid @enderror" name="ruc1"
                                           value="{{ old('ruc1') }}" required autocomplete="ruc"
                                           autofocus placeholder="Ingrese ruc de la empresa">
                                    @error('ruc1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_company" class="col-md-4 col-form-label text-md-right">Razon Social</label>
                                <div class="col-md-6">
                                    <input id="nameCompany" type="text"
                                           class="form-control @error('name_company') is-invalid @enderror" name="name_company"
                                           value="{{ old('name_company') }}" required
                                           autocomplete="name_company" placeholder="Ingrese Razon social de la empresa">
                                    @error('name_company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone1" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone1') is-invalid @enderror" name="phone1"
                                           value="{{ old('phone1') }}" required
                                           autocomplete="phone" placeholder="Ingrese su telefono o celular">
                                    @error('phone1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email1" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                                <div class="col-md-6">
                                    <input id="email1" type="email" class="form-control @error('email1') is-invalid @enderror"
                                           name="email1" value="{{ old('email1') }}" required
                                           autocomplete="email1" placeholder="Ingrese su email">

                                    @error('email1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password1" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password1" type="password" class="form-control @error('password1') is-invalid @enderror" name="password1"
                                           required autocomplete="new-password" placeholder="Ingrese su password">

                                    @error('password1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password1-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password1-confirm" type="password" class="form-control"
                                            name="password1_confirmation" required
                                            autocomplete="new-password"
                                            placeholder="Repita su pasword">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrate
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
