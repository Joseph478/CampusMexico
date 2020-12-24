
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Certificados
                    <div class="page-title-subheading">Lista
                    </div>
                </div>
            </div>
            @can('classroom-create')
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('courses.certificates.create',$course->id)}}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        AGREGAR CERTIFICADO
                    </a>
                </div>
            </div>
        @endcan
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header"> Lista de Certificados</div>
                <div class="card-body">
                    @include('layouts.message')
                    <div class="table-responsive">
                        <table class="align-middle table table-sm table-hover">
                            <thead class="thead-light">
                                <th>ID</th>
                                <th>Certificado</th>
                                <th>Imagen</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($course->certificates as $certificate)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$certificate->name}}</td>
                                <td><img  style= "width:100px;  background-color: #EFEFEF;" class="img-rounded"
                                    src="{{ $certificate->image()}}" alt=""></td>
                                <td>

                                    <a class="btn btn-sm btn-icon-only btn-outline-info" title="Ver"
                                    href="#"><i class="pe-7s-look btn-icon-wrapper"></i></a>

                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" title="Editar" href="{{ route('courses.certificates.edit',[$course->id,$certificate->id]) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['courses.certificates.destroy',[$course->id,$certificate->id]],'style'=>'display:inline']) !!}
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
