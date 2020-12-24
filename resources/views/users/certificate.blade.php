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
                    <div class="page-title-subheading">Relación de participantes
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.message')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <span class="mr-2 d-flex">
                    hay
                        <span class="badge badge-primary mr-1 ml-1">{{ $user->scheduled_count }}</span>
                        {{ Str::plural('certificado', $user->participants_count) }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead class="thead-light">
                            <tr  class="text-center">

                                <th>NRO</th>
                                <th>CURSO</th>
                                <th>NOTA DE ENTRADA</th>
                                <th>NOTA FINAL</th>
                                <th>NOTA MINIMA</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            @foreach ($user->scheduled as $classroom)
                                <tr>
                                    <td class="text-center text-muted" >{{ $loop->iteration }} {{$classroom->pivot->id}}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td class="text-center">{{ $classroom->pivot->grade_begin }}</td>
                                    <td class="text-center">{{ $classroom->pivot->grade }}</td>
                                    <td class="text-center">{{ $classroom->pivot->grade_min }}</td>

                                    <td style="white-space:nowrap;">
                                        @if($classroom->pivot->grade_tried === null)
                                            <span class="text-black">Sin intentos</span>
                                        @else
                                            @if($classroom->pivot->grade >= $classroom->pivot->grade_min )
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('users.certificate.inscriptions', $classroom->pivot->id) }}">
                                                    Certificado
                                                </a>
                                            @else
                                                <span class="text-danger">Desaprobado</span>
                                            @endif

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




