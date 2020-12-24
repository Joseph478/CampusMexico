
@extends('layouts.template')


@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Lista de asistencias
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('classrooms.assistances.create', [$classroom]) }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        CREAR ASISTENCIA
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('layouts.message')
            <div class="main-card mb-3 card">
                <div class="card-header card-header-tab">
                    <div class="card-header-title text-capitalize">
                        <i class="header-icon fa fa-th-list fa-xs icon-gradient bg-primary"></i>
                        {{ $classroom->name }} / {{ $classroom->start_datetime }} / {{ $classroom->end_datetime }}
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <a href="{{ route('classrooms.Consolidated', [$classroom->id]) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-undo-alt"></i> REGRESAR</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover data" id="data">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Fecha</th>
                                <th scope="col" >Modalidad</th>
                                <th scope="col" >Asistentes</th>
                                <th scope="col" >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($classroom->assistances as $assistance)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><span class="text-nowrap">{{ $assistance->assistance_date }}</span></td>
                                    <td>
                                        @if($assistance->is_virtual == '0')
                                            <div class="badge badge-success">
                                                Presencial
                                            </div>
                                        @endif
                                        @if($assistance->is_virtual == '1')
                                            <div class="badge badge-info">
                                                Virtual
                                            </div>
                                        @endif
                                    </td>
                                    <td><span class="text-nowrap"></span></td>
                                    <td style="white-space:nowrap;">
                                        <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('classrooms.assistances.show',[$classroom->id, $assistance->id]) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                        <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('classrooms.assistances.edit',[$classroom->id, $assistance->id]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['classrooms.assistances.destroy', [$classroom->id, $assistance->id]],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <p class="text-center">No hay ninguna fecha de asistencia disponible</p>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable({

            });
        });
    </script>
@endsection


