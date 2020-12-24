
@extends('layouts.template')


@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Preguntas
                <div class="page-title-subheading">Lista de Preguntas
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="#" data-toggle="modal" data-target="#Modal_create" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Agregar
                    </a>
                </div>
            </div>
    </div>
</div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

    <div class="table-responsive">
    <table class="table table-hover table-bordered" id="datatable">
        <thead>
            <tr>
                <th scope="col" >#</th>
                <th scope="col" >Titulo</th>
                <th scope="col" >Preguntas</th>
                <th scope="col" >Acciones</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($banks as $bank)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $bank->title }}</td>
                <td>{{ $bank->is_question }}</td>

                <td style="white-space:nowrap;">
                                <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('banks.show',$bank->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('banks.edit',$bank->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['banks.destroy', $bank->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                {!! Form::close() !!}
                                <a class="btn btn-sm btn-icon-only btn-outline-success" href="{{ route('questions.create',$bank->id) }}"><i class="pe-7s-note2 btn-icon-wrapper"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-center text-primary"><small>Campus Virtual</small></p>
@endsection

    @include('banks.questions.modal_create')


@section('js')

@endsection

