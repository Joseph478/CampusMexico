
@extends('layouts.template')


@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>MODULO
                <div class="page-title-subheading">Lista de Modulos
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="{{route('modules.create',$course->id)}}"  class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Registrar Modulo
                    </a>
                </div>
            </div>
    </div>
</div>


@include('layouts.message')

    <div class="card-header card-header-tab">
        <div class="card-header-title text-capitalize">
            <i class="header-icon fas fa-book-open fa-xs icon-gradient bg-dark "></i>

        </div>
        <div class="btn-actions-pane-right text-capitalize">

            <a href="{{ route('modules.show',array($modules[0]->id,$course->id)) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fas fa-external-link-alt"></i> Ver </a>

        </div>
    </div>
<br>
    <div class="table-responsive">
        <table class="table table-hover table-bordered data" id="data">
        <thead>
            <tr>
                <th scope="col" >#</th>
                <th scope="col" >Curso</th>
                <th scope="col" >Nombre Modulo</th>
                <th scope="col" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $module->course->name }}</td>
                <td>{{ $module->name }}</td>
                <td style="white-space:nowrap;">
                    <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('modules.show',$module->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('modules.edit',$module->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['modules.destroy', $module->id],'style'=>'display:inline']) !!}
                    {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                    {!! Form::close() !!}
                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('banks.list',array($course->id, $module->id)) }}"><i class="fas fa-box-open btn-icon-wrapper"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection
@section('js')

@endsection


