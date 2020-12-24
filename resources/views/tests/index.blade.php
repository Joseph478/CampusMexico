
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Lista de Evaluaciones
                    <div class="page-title-subheading">Lista
                    </div>
                </div>
            </div>
        @can('test-create')
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('classrooms.tests.create', [$classroom] )}}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        AGREGAR EVALUACION
                    </a>
                </div>
            </div>
        @endcan
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        @include('layouts.message')
        <div class="main-card mb-3 card">
            <div class="card-header card-header-tab">
                <div class="card-header-title text-capitalize">
                    <i class="header-icon fa fa-th-list fa-xs icon-gradient bg-primary"></i>
                    {{ $classroom->name }} / {{ $classroom->start_datetime }} / {{ $classroom->end_datetime }}
                </div>
                @if(Auth::user()->hasRole('participante'))
                <div class="btn-actions-pane-right text-capitalize">
                    <a href="{{ route('courses.participant.detail', [$classroom->id, Auth::id()]) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-undo-alt"></i> REGRESAR</a>
                </div>
                @else
                <div class="btn-actions-pane-right text-capitalize">
                    <a href="{{ route('classrooms.index') }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-undo-alt"></i> REGRESAR</a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover data" id="data">
                        <thead class="thead-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                @if(Auth::user()->hasRole('administrador'))
                                <th scope="col">Random</th>
                                <th scope="col">Calificado</th>
                                @endif
                                <th scope="col">Tiempo</th>
                                <th scope="col">Cantidad de Intento</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Termino</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($classroom->tests as $test)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$test->name}}</td>
                                @if(Auth::user()->hasRole('administrador'))
                                <td>{{($test->random==1 ? 'Si':'No')}}</td>
                                <td>{{$test->is_qualified==1 ? 'Si':'No'}}</td>
                                @endif
                                <td>{{$test->time}} minutos</td>
                                <td>{{$test->tried- $test->testuser->count()}} intento(s)</td>
                                <td>{{$test->start_date}}</td>
                                <td>{{$test->end_date}}</td>
                                <td style="white-space:nowrap;">
                                    @can('course-test-show')
                                    <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('classrooms.tests.show',[$classroom->id, $test->id]) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                    @endcan
                                    @can('course-test-edit')
                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('classrooms.tests.edit',[$classroom->id, $test->id]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                    @endcan
                                    @can('course-test-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['classrooms.tests.destroy', [$classroom->id, $test->id]],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                    {!! Form::close() !!}
                                    @endcan
                                    @can('course-test-mine')
                                    @if($test->tried- $test->testuser->count()>0 && $disabled==false)
                                    <a class="btn btn-sm btn-icon-only btn-outline-success" id="btn-start" href="{{ route('courses.test',[$classroom->id, $test->id]) }}"><i class="pe-7s-note2 btn-icon-wrapper btn-start"></i></a>
                                    @else
                                    <a class="btn btn-sm btn-icon-only btn-outline-success disabled" id="btn-start"  href="{{ route('courses.test',[$classroom->id, $test->id]) }}"><i class="pe-7s-note2 btn-icon-wrapper btn-start"></i></a>
                                    @endif
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <p class="text-center">No hay ninguna evaluacion disponible disponible</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>
@endsection

