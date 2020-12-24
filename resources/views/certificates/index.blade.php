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
                    <a href="{{route('certificates.create')}}" class="btn-shadow btn btn-info">
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
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Lista de certificados</div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                    <table class="align-middle table table-sm table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Nombre</th>
                                <th scope="col" >Descripción</th>
                                <th scope="col" >Modelo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($certificate as $certificates)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $certificates->name }}</td>
                                <td>{{ $certificates->description }}</td>
                                <td><img src="{{ $certificates->image() }}" alt=""></td>
                                <td style="white-space:nowrap;">
                                @can('certificate-list')
                                    <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('certificates.show',$certificates->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                @endcan
                                @can('certificate-edit')
                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('certificates.edit',$certificates->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                @endcan
                                @can('certificate-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['certificates.destroy', $certificates->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                        {!! Form::close() !!}
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

@section('js')

@endsection
