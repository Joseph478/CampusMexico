
@extends('layouts.template')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Mis Incripciones
                    <div class="page-title-subheading">Lista
                    </div>
                </div>
            </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="{{route('classrooms.index')}}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-plus"></i>
                    </span>
                            IR A PROGRAMACION
                        </a>
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <span class="mr-2 d-flex">
                     hay <span class="badge badge-primary mr-1 ml-1">{{ $classrooms_count }}</span>{{ Str::plural('curso', $classrooms_count) }} pragramado
                    </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Curso</th>
                                <th scope="col" >Tipo</th>
                                <th scope="col" >Fecha y Hora</th>
                                <th scope="col" >Fecha de finalización</th>
                                <th scope="col" >Nota minima</th>
                                <th scope="col" >Num. Inscritos</th>
                                <th scope="col" >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse ($classrooms as $classroom)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->type }}</td>
                                    <td>{{ $classroom->start_datetime }}</td>
                                    <td>{{ $classroom->end_datetime }}</td>
                                    <td>{{ $classroom->grade_min }}</td>
                                    <td>{{ $classroom->scheduled_participants_count }}</td>
                                    <td style="white-space:nowrap;">
                                        <a
                                            class="btn btn-sm btn-icon-only btn-outline-primary"
                                            href="{{ route('inscriptions.detail', $classroom->id) }}">
                                            <i class="pe-7s-edit btn-icon-wrapper"></i> Detalle
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-center text-primary"><small>No tiene cursos programados</small></p>
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

@endsection
