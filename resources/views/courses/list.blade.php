@extends('layouts.template')

@section('content')
    @include('layouts.title', array(
                                    'icon'          => 'refresh-2',
                                    'title'         => 'Mis cursos',
                                    'description'   => 'Relación de cursos a los cuales estoy inscritos',
                                    'href'          => ''))


    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item"><a role="tab" href="" class="nav-link active"><span>Programados</span></a></li>
        <li class="nav-item"><a role="tab" href="" class="nav-link"><span>Finalizados</span></a></li>
    </ul>
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

        <div class="row courses-container ">
        @foreach ($classrooms as $classroom)
            <div class="col-sm-6 mb-4">
                <div class="d-flex bg-white course-card ">
                    <div class="course-card__img">

                        <img src="{{ $classroom->course->image() }}" style="width:155px; height:155px;" alt="">
                    </div>
                    <div class="course-card__content d-flex flex-column px-4 py-2">
                        <span class="course-card__item">Curso:</span>
                        <span class="mb-1 font-weight-light">{{ $classroom->course->name }}</span>
                        <span class="course-card__item">Facilitador:</span>
                        <span class="mb-1 font-weight-light">{{ $classroom->facilitator->getFullName() }}</span>
                        <span class="course-card__item">Fecha y Hora:</span>
                        <div class="course-card__action d-flex justify-content-between">
                            <span class="font-weight-light">{{ $classroom->start_datetime }}</span>
                            <a href="{{ route('courses.participant.detail', array($classroom->id,$user->id)) }}" class="btn btn-outline-primary btn-sm">Ver ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

@endsection
