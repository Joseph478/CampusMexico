@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Inscripcion del curso "'.$classroom->name.'"',
                                    'description'   => '',
                                    'button'           => 'Regresar',
                                    'href'          => 'inscriptions.index'))

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
                    </dl>
                    <dl>
                        <dt>FACILITADOR</dt>
                        <dd>{{ $classroom->facilitator->full_name }}</dd>
                    </dl>
                </div>
            </div>

            <div class="divider"></div>

            <div class="card-title d-flex justify-content-start align-items-center">
                <span class="mr-2 d-flex">
                    Hay <span class="badge badge-primary mr-1 ml-1">{{ $classroom->scheduled_participants_count }}
                    </span>{{ Str::plural('participante', $classroom->scheduled_participants_count) }} {{ Str::plural('inscrito', $classroom->scheduled_participants_count) }}
                </span>
                @if($classroom->vacancies > 0)
                    <a href="{{ route('inscriptions.register', $classroom->id) }}" class="btn btn-info btn-sm"><i class="fa fa-sm fa-reply mr-1"></i> Seguir Inscribiendo</a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Participante</th>
                        <th scope="col">Area</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($participants as $participant)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $participant->dni }}</td>
                        <td>{{ $participant->full_name }}</td>
                        <td>{{ $participant->area }}</td>
                        <td>{{ $participant->position }}</td>
                        <td>
                            @if($participant->pivot->state == '0')
                            <div class="badge badge-danger">
                                <small>Anulado</small>
                            </div>
                            @endif
                            @if($participant->pivot->state == '1')
                                <div class="badge badge-success">
                                    <small>Programado</small>
                                </div>
                            @endif
                            @if($participant->pivot->state == '2')
                                <div class="badge badge-info">
                                    <small>Reprogramado</small>
                                </div>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('inscriptions.destroy', $participant->pivot->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    {{ $participant->pivot->state == '0' ? 'disabled' : '' }}
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-sm fa-trash-alt"></i> Anular
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#formCourse').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
