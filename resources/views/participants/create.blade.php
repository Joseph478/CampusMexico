@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
        'icon'          => 'add-user',
        'title'         => 'Registrar Particpante',
        'description'   => '',
        'button'        => 'Regresar',
        'href'          => 'participants.index',
        ))


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('participants.store') }}" method="POST" id="formParticipant" enctype="multipart/form-data">
        @include('participants.partials._form', ['btnText' => 'Guardar','btnTitle'=>'Ingrese los datos del Participante'])
    </form>
@endsection

