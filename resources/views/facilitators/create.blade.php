@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
        'icon'          => 'add-user',
        'title'         => 'Registrar Facilitador',
        'description'   => '',
        'button'        => 'Regresar',
        'href'          => 'facilitators.index',
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

    <form action="{{ route('facilitators.store') }}" method="POST" id="formParticipant" enctype="multipart/form-data">
        @include('participants.partials._form', ['btnText' => 'Guardar','btnTitle'=>'Ingrese los datos del Facilitador'])
    </form>
@endsection

