
@extends('layouts.template')


@section('content')

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Detalle del Examen: {{$test_user->test->name}}
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="{{route('tests.list',[$classroom])}}" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        </div>
@include('layouts.message')

<div class="row">
        <div class="col-12">
        <div class="card mt-3 tab-card">
            <div class="card-header tab-card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Matching</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Respuestas Correctas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Respuestas Incorrectas</a>
                </li>
            </ul>
            </div>

            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                <h5 class="card-title"></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Entendido</a>
            </div>
            <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                <h5 class="card-title">Respuestas Incorrectas</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                <h5 class="card-title"></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>

            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
@endsection
