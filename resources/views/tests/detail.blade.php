
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
        </div>
        </div>
@include('layouts.message')

@foreach($classroom->course->banks as $bank)
    <div class="card">
        <div class="card-body">
            <h6><strong>{{ $loop->iteration }}.- {{ $bank->title }}</strong></h6>
        </div>
    </div>

        <div class="card my-2">
            @foreach($bank->childs as $child)
            @if( in_array($child->id, $correct_answers))
                <div class="alert alert-success">
                <h5 class="alert-heading">Correcto!</h5>

                <div class="form-check">
                    <label  for="{{ $child->id }}">
                        {{ $child->title }}
                    </label>
                </div>
                </div>
            @elseif(in_array($child->id, $incorrect_answers))
            <div class="alert alert-danger">
                <h5 class="alert-heading">Incorrecto</h5>

                <div class="form-check">
                    <label  for="{{ $child->id }}">
                        {{ $child->title }}
                    </label>
                </div>
                </div>
            @else
                <div class="form-check card my-1 mx-4">

                    <label class="" for="{{ $child->id }}">
                        {{ $child->title }}
                    </label>
                </div>
            @endif
            @endforeach
        </div>
    @endforeach
    <div class="row my-4">
        <div class="col">
            <div>

                <a href="{{route('courses.test.result',[$classroom,$test_user])}}" class="btn btn-primary btn-lg">Regresar</a>
            </div>
        </div>
    </div>


@endsection

@section('js')
@endsection
