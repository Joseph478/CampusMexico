
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Agregar evaluación
                    <div class="page-title-subheading">Lista
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ URL::previous() }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header">PARAMETROS DE EVALUACION</div>
            <div class="card-body">
                @include('layouts.message')
                <form method="POST" action="{{route('classrooms.tests.store', $classroom->id)}}">
                    @include('tests.partials._form', ['btnText' => 'Guardar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
