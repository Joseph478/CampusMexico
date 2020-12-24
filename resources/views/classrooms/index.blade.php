
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Programación
                    <div class="page-title-subheading">Lista
                    </div>
                </div>

            </div>

            <div class="page-title-actions">
                @can('classroom-list')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBanks">Banco De Preguntas</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalParticipants">Asignación masiva</button>
                @endcan
                @can('classroom-create')
                <div class="d-inline-block dropdown">
                    <a href="{{route('classrooms.create')}}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        REGISTRAR PROGRAMACIÓN
                    </a>
                </div>
                @endcan
            </div>

        </div>
    </div>



<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Hay
                <span class="mx-2 badge badge-primary"> {{ $classrooms_count }}</span>
                cursos Programados
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                    <table class="align-middle table table-sm table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Curso</th>
                                <th scope="col" >Tipo</th>
                                <th scope="col" >Modalidad</th>
                                <th scope="col" >Fecha y Hora</th>
                                <th scope="col" >Fecha de finalización</th>
                                <th scope="col" >Nota minima</th>
                                <th scope="col" >Vacantes</th>
                                <th scope="col" >Inscritos</th>
                                <th scope="col" >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($classrooms as $classroom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $classroom->name }}</td>
                                <td>{{ $classroom->type }}</td>
                                <td>{{ $classroom->modality }}</td>
                                <td>{{ $classroom->start_datetime }}</td>
                                <td>{{ $classroom->end_datetime }}</td>
                                <td>{{ $classroom->grade_min }}</td>
                                <td>{{ $classroom->vacancies }}</td>
                                <td>{{ $classroom->scheduled_participants_count }}</td>
                                <td style="white-space:nowrap;">
                                @can('meeting-list')
                                    <a class="btn btn-sm btn-icon-only btn-outline-alternate" title="Videconferencia"
                                        href="{{ route('classrooms.meetings.index', $classroom->id) }}">
                                        <i class="pe-7s-video btn-icon-wrapper"></i>
                                    </a>
                                @endcan
                                @can('test-list')
                                    <a class="btn btn-sm btn-icon-only btn-outline-focus" title="Evaluacion"
                                        href="{{ route('classrooms.list', $classroom->id) }}">
                                        <i class="pe-7s-note2 btn-icon-wrapper"></i>
                                    </a>
                                @endcan
                                @can('classroom-show')
                                    <a class="btn btn-sm btn-icon-only btn-outline-info" title="Ver"
                                    href="{{ route('classrooms.show',$classroom->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                @endcan
                                @can('classroom-edit')
                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" title="Editar" href="{{ route('classrooms.edit',$classroom->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['classrooms.destroy', $classroom->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                        {!! Form::close() !!}
                                @endcan
                                @can('inscription-mine')
                                    <a class="btn btn-sm btn-icon-only btn-outline-success {{ ($classroom->vacancies == 0) ? 'disabled' : '' }}"
                                        href="{{ route('inscriptions.register',$classroom->id) }}">
                                        <i class="pe-7s-pen btn-icon-wrapper"></i> Inscribir
                                    </a>
                                @endcan
                                @can('classroom-consolidated')
                                    <a class="btn btn-sm btn-outline-success"
                                    href="{{ route('classrooms.Consolidated', $classroom->id) }}">
                                        <i class="pe-7s-note btn-icon-wrapper"></i> Consolidado
                                    </a>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    <div class="modal fade"  id="modalParticipants"   role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registro masivo de Inscripciones</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('inscriptions.import')}}" enctype="multipart/form-data" method="post" >
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="file_up">Asignacion Masiva</label>
                            <input id="file_up" name="file_up" type="file" accept=".xlsx">
                            <p class="help-block">Subir archivos con formato .xlsx</p>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!--modalbanks-->
    <div class="modal fade"  id="modalBanks"   role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registro masivo de Bancos</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('banks.import')}}" enctype="multipart/form-data" method="post" >
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="file_up">Asignacion Masiva</label>
                            <input id="file_up" name="file_up" type="file" accept=".xlsx">
                            <p class="help-block">Subir archivos con formato .xlsx</p>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @endsection



@section('js')

@endsection

