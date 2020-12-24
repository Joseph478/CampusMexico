@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
        'icon'          => 'add-user',
        'title'         => 'Editar Facilitador',
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

    <form action="{{ route('facilitators.actualize',$user->id) }}" method="POST"  enctype="multipart/form-data" id="formParticipant">
        @method('PUT')
        @include('participants.partials._form', ['btnText' => 'Editar','btnTitle'=>'Ingrese los datos del Facilitador'])
    </form>
@endsection

