@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Cursos
                    <div class="page-title-subheading">Lista de cursos
                    </div>
                </div>
            </div>
        @can('course-create')
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('courses.create')}}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        REGISTRAR CURSO
                    </a>
                </div>
            </div>
        @endcan
        </div>
    </div>


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"> CURSOS
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                    <table class="align-middle table table-sm table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col" >Curso</th>
                            <th scope="col" >Horas Dictadas</th>
                            <th scope="col" >Nota Minima</th>
                            <th scope="col" >Imagen</th>
                            <th scope="col" >Certificado</th>
                            <th scope="col" >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->hour }}</td>
                            <td>{{ $course->grade_min }}</td>

                            <td>
                                <img  style= "width:100px;  background-color: #EFEFEF;" class="img-rounded"
                                src="{{ $course->image()}}" alt="">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-icon-only btn-outline-light"
                                    href="{{ route('courses.certificates.index',$course->id) }}" title="Certificado">
                                    <i class="pe-7s-id btn-icon-wrapper"></i>
                                </a>
                            </td>
                            <td style="white-space:nowrap;">

                                <a class="btn btn-sm btn-icon-only btn-outline-info"
                                    href="{{ route('courses.types.index',$course->id) }}">
                                    <i class="pe-7s-look btn-icon-wrapper"></i>
                                </a>
                                <a class="btn btn-sm btn-icon-only btn-outline-warning"
                                    href="{{ route('courses.edit',$course->id) }}">
                                    <i class="pe-7s-pen btn-icon-wrapper"></i>
                                </a>

                                {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $course->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                {!! Form::close() !!}
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


@section('js')

@endsection

