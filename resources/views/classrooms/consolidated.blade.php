@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Inscripcion del curso "'.$classroom->name.'"',
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
        <div class="card-header">Lista De Participantes</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <dl>
                        <dt>FECHA Y HORA DE INICIO</dt>
                        <dd>{{ $classroom->start_datetime }}</dd>
                        <dt>FECHA DE FINALIZACION</dt>
                        <dd>{{ $classroom->end_datetime }}</dd>
                        <dt>INSCRITOS</dt>
                        <dd>{{ $classroom->scheduled_participants_count }}</dd>
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

            <div class="card-title d-flex justify-content-between align-items-center">
                <span class="mr-2 d-flex">
                    hay <span class="badge badge-primary mr-1 ml-1">{{ $classroom->scheduled_participants_count }}
                    </span>{{ Str::plural('participante', $classroom->scheduled_participants_count) }} {{ Str::plural('inscrito', $classroom->scheduled_participants_count) }}
                </span>
                <div>
{{--                    <a--}}
{{--                        href="{{ route('classrooms.assistances.index', [$classroom->id]) }}"--}}
{{--                        class="btn btn-sm btn-success">--}}
{{--                        <i class="fa fa-clipboard-list mr-1"></i>--}}
{{--                        Asistencia--}}
{{--                    </a>--}}
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalShow">subir</button>
                    <a href="{{ route('exportExcel.consolidated', $classroom) }}" class="btn btn-sm btn-primary">descargar</a>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Participante</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Nota De Entrada</th>
                        <th scope="col">Nota Final</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($classroom->scheduledParticipants as $participant)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $participant->dni }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $participant->full_name }}</div>
                                            @if($participant->position || $participant->area)
                                                <div class="widget-subheading opacity-7">{{ $participant->position }} {{ $participant->area }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $participant->pivot->assistance }}</td>
                            <td>{{ $participant->pivot->grade_begin }}</td>
                            <td>{{ $participant->pivot->grade }}</td>

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
                                <form action="{{ route('inscriptions.destroy', $participant->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        {{ $participant->state == 'Anulado' ? 'disabled' : '' }}
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

@section('modal')
    <div class="modal" tabindex="-1" role="dialog" id="modalShow">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('importExcel.consolidated', $classroom) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Subir Archivo para la asistencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="file">Selecione un archivo</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Cargar</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
