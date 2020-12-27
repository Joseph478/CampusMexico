@extends('layouts.template')

@section('content')
    @include('layouts.title', array(
                                    'icon'          => 'pen',
                                    'title'         => 'INFORMACIÓN DEL CURSO',
                                    'description'   => 'para conectarse al curso necesita conectarse desde preferencia o tener una buena señal de datos',
                                    'href'          => ''))

    <div class="row">
        <div class="col-12">
            <div class="mb-3 card">
                <div class="card-header">
                    {{ $classroom->name }}
                </div>
                <div class="card-body">

                    <div class="row">

                        @foreach($types as $type)
                            <div class="col-sm-4 d-flex flex-column align-items-center mb-4 card-detail">
                                <div class="bg__{{ Str::camel($type->name) }} mb-3 p-2 rounded-circle card-detail__img">
                                    <a href="{{ route('courses.participant.type', [$classroom->id, $type->id]) }}">
                                        <img src="{{ asset('img/icons/'.Str::camel($type->name).'.png') }}" alt="{{ Str::camel($type->name) }}" class="">
                                    </a>
                                </div>
                                @if($type->id == 1)
                                    <span class="font-weight-bold card-detail__title">Descripción del Curso</span>
                                @else
                                    <span class="font-weight-bold card-detail__title">{{ $type->name }}</span>
                                @endif
                            </div>

                        @endforeach


                        @if(count($classroom->meetings) > 0)
                            <div class="col-sm-4 d-flex flex-column align-items-center mb-4 card-detail">
                                <div class="bg__reunion mb-3 p-2 rounded-circle card-detail__img">
                                </div>
                                <span class="font-weight-bold card-detail__title">Video Conferencia</span>
                            </div>
                        @endif


                            @if(count($classroom->tests) > 0)
                            <div class="col-sm-4 d-flex flex-column align-items-center mb-4 card-detail">
                                <div class="bg__test mb-3 p-2 rounded-circle card-detail__img">
                                    <a href="{{ route('classrooms.list',array($classroom,$key)) }}">
                                        <img src="{{ asset('img/icons/examen.png') }}" alt="examen" class="">
                                    </a>
                                </div>
                                @if($key==1)
                                <span class="font-weight-bold card-detail__title">Examen De Inicio</span>
                                @else
                                <span class="font-weight-bold card-detail__title">Examenes</span>
                                @endif
                            </div>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
