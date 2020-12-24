
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Promedio de Evaluación
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>


        </div>
    </div>
    @include('layouts.message')

    <div class="card text-center card_result">
        <div class="card-header">

            <div class="btn-actions-pane-right text-capitalize">

                <a href="{{route('courses.test.detail',[$classroom,$test_user])}}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-primary btn-sm"><i class="fas fa-folder-plus"></i> Detalles </a>

            </div>
        </div>
        <div class="card-body">
        <span class="card-title"><strong>Estimado(a) Participante: {{$test_user->participant->full_name}}</strong> </span> <img src="{{!($test_user->participant->avatar() === NULL) ? $test_user->participant->avatar() : asset('img/image.jpg')}}" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
            <p class="card-text"><h4>has obtenido un puntaje de:</h4></p>
            <p style="font-size:60px;font-weight:bold;">{{$test_user->grade}}</p>

            @if($aprobed==false && $test->type ==0 )


            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Desaprobado</h4>
                <hr>
                @if($message==true)
                <p class="mb-0">Recuerde que para volver a dar su segundo intento tiene que esperar 30 minutos. repase los documentos necesarios !</p>
                @endif
                <strong><p class="mb-0">Recuerde que la encuesta es opcional !</p></strong>
            </div>

            @elseif($test_user->test->type == '0')
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Aprobado</h4>
                <hr>
                <p class="mb-0">Felicidades !</p>
            </div>
            @endif
            @if($test_user->test->type == '0')

            <a href="{{ route('tests.encuesta', [$classroom,$test_user]) }}" class="btn btn-success btn-lg">Realizar Encuesta</a>
            @endif
            <a href="{{route('courses.participant.detail', [$classroom,$test_user->participant->id] )}}" class="btn btn-primary btn-lg">Regresar</a>

        </div>
        <div class="card-footer text-muted">
            <div class="footer">
                <p><i class="fa fa-copyright" aria-hidden="true"></i> Todos los derechos reservados - <strong>Inveritas Global Holdings Peru SA</strong> 2020 </p>
            </div>
        </div>
        </div>


@endsection

@section('js')
@endsection
