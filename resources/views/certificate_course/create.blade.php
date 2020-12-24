
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
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header"> Lista de Certificados
                </div>
                <form action="{{route('courses.certificates.store',$course->id)}}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('layouts.message')
                        <div class="table-responsive">
                            <table class="align-middle table table-sm table-hover">
                                <thead class="thead-light">
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Certificado</th>
                                    <th>Seleccionar</th>
                                </thead>
                                <tbody>
                                    @foreach ($certificates as $certificate)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img  style= "width:100px;  background-color: #EFEFEF;" class="img-rounded"
                                        src="{{ $certificate->image()}}" alt="">
                                   </td>
                                    <td>{{$certificate->name}}</td>
                                        <td><input type="checkbox" name="certificate_ids[]" value="{{$certificate->id}}"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button class="btn btn-primary btn-lg" type="submit">Registrar</button> ó <a href="{{route('courses.certificates.index',$course->id)}}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
