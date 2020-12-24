@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
        'icon'          => 'user',
        'title'         => 'Registrar Usuario',
        'description'   => '',
        'button'        => 'Regresar',
        'href'          => 'users.index',
        ))


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hubo algunos problemas con los campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        @include('users.partials.form')
    {!! Form::close() !!}
@endsection

