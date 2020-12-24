@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Programación del curso "'.$classroom->name.'"',
                                    'description'   => '',
                                    'button'           => 'Regresar',
                                    'href'          => 'classrooms.index'))

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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

    <div class="main-card mb-3 card">
        <div class="card-header">Información</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <dl>
                        <dt>FECHA Y HORA DE INICIO</dt>
                        <dd>{{ $classroom->start_datetime }}</dd>
                        <dt>FECHA DE FINALIZACION</dt>
                        <dd>{{ $classroom->end_datetime }}</dd>
                        <dt>VACANTES DISPONIBLES</dt>
                        <dd>{{ $classroom->vacancies }}</dd>
                        <dt>MODALIDAD</dt>
                        <dd>{{ $classroom->modality }}</dd>
                    </dl>
                </div>
                <div class="col">
                    <dl>
                        <dt>DESCRIPCION</dt>
                        <dd>{{ $classroom->course->description }}</dd>
                        <dt>FACILITADOR</dt>
                        <dd>{{ $classroom->facilitator->full_name }}</dd>
                    </dl>
                </div>
            </div>

            <div class="divider"></div>

            <div class="card-title d-flex justify-content-start align-items-center">
                <span class="mr-2 d-flex">
                    hay <span class="badge badge-primary mr-1 ml-1">{{ $participants_inscription_count }}
                    </span>{{ Str::plural('participante', $participants_inscription_count) }} {{ Str::plural('inscrito', $participants_inscription_count) }}
                </span>
                @if($participants_inscription_count > 0)
                    <a href="{{ route('inscriptions.detail', $classroom->id )  }}" class="btn btn-info btn-sm"><i class="fa fa-reply"></i> Ver</a>
                @endif
            </div>
            <form action="{{ route('inscriptions.save',$classroom) }}"
                  method="POST" id="formInscription"
            >
                @include('inscriptions.partials._form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.select-input').select2({
                theme: 'bootstrap4',
            });
            $('#formInscription').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
