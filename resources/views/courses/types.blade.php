@extends('layouts.template')

@section('content')
    @include('layouts.title', array(
                                    'icon'          => 'pen',
                                    'title'         => 'INFORMACIÓN DEL CURSO',
                                    'description'   => '',
                                    'button'           => 'REGRESAR',
                                    'href'          => 'courses.index'))

    <div class="row">
        <div class="col-12">
            <div class="mb-3 card">
                <div class="card-header">
                    {{ $course->name }}
                </div>
                <div class="card-body">
                    <div class="row">

                        @foreach($types as $type )
                            <div class="col-sm-4 d-flex flex-column align-items-center mb-4 card-detail">
                                <a href="{{route('courses.types.show',['course' => $course->id, 'type' => $type->id])}}" class="">
                                    <div class="bg__{{ Str::camel($type->name) }} mb-3 p-2 rounded-circle card-detail__img">
                                        <img src="{{ asset('img/icons/'.Str::camel($type->name).'.png') }}" alt="{{ Str::camel($type->name) }}" class="">
                                    </div>
                                </a>
                                <span class="font-weight-bold card-detail__title">{{ $type->name }}</span>
                            </div>
                        @endforeach

                        <div class="col-sm-4 d-flex flex-column align-items-center mb-4 card-detail">
                            <a href="{{route('banks.list',$course->id)}}" class="">
                                <div class="bg__test mb-3 p-2 rounded-circle card-detail__img">
                                    <img src="{{ asset('img/icons/tarea.png') }}" alt="tareas" class="">
                                </div>
                            </a>
                            <span class="font-weight-bold card-detail__title">Banco de Preguntas</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
