
@extends('layouts.template')


@section('content')
<link rel="stylesheet" href="{{ asset('css/bootstrap4.4.1.min.css') }}">
<link rel="stylesheet" href="{{ asset('complements/profile.css') }}">

@include('layouts.title', array(
            'icon'          => 'user',
            'title'         => 'Participante',
            'description'   => 'Perfil de Participante',
            'button'           => 'Regresar',
            'href'          => 'participants.index'))


    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{$user->avatar()}}" alt="Admin" class="rounded-circle" width="150" height="150">
                        <div class="mt-3">
                        <h4>{{$user->name}}</h4>
                        <p class="text-muted font-size-sm">Area: {{$user->area}}</p>
                        <p class="text-secondary mb-1">Cargo: {{$user->position}}</p>


                        </div>
                    </div>
                    </div>
                </div>

                </div>
                <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Nombre Completo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$user->fullname}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Dni</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$user->dni}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$user->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Telefono</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$user->phone}}
                        </div>
                    </div>
                    <hr>

                    </div>
                </div>

                </div>
            </div>


            <div class="card table-responsive">
                    <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead class="thead-blue white-text">
                            <tr  class="text-center">
                                <th>NRO</th>
                                <th width="35%">CURSO</th>
                                <th>FECHA</th>
                                <th>NOTA</th>
                                <th>ESTADO</th>
                                <th>VIGENTE</th>
                                <th>CERTIFICADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->inscriptions as $inscription)
                            <tr class="text-center">
                                <td class="text-center text-muted" >{{ $loop->iteration }}</td>
                                <td>{{$inscription->classroom->name}}</td>
                                <td>{{$inscription->classroom->start_datetime}}</td>
                                <td>{{$inscription->grade}}</td>
                                @if($inscription->grade >= $inscription->grade_min)
                                <td><span class="badge badge-success">Aprobado</span></td>
                                @elseif($inscription->grade_tried == null)
                                <td><span class="badge badge-info">Pendiente</span></td>
                                @else
                                <td><span class="badge badge-secondary">Desaprobado</span></td>
                                @endif
                                <td>{{$validation}}</td>
                                @if($inscription->classroom->course->is_certificate ==1 && $inscription->grade >= $inscription->grade_min)
                                <td style="white-space:nowrap;">
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('users.certificate.inscriptions', $inscription->id) }}">
                                        Certificado
                                    </a>
                                </td>
                                @elseif(!is_null($inscription->grade) and ($inscription->classroom->course->is_certificate ==1 && $inscription->grade < $inscription->grade_min))
                                    <td style="white-space:nowrap;">
                                        <a class="btn btn-sm btn-warning"
                                           href="{{ route('users.certificate.inscriptions', $inscription->id) }}">
                                            Cert. por participar
                                        </a>
                                    </td>
                                @else
                                    <td><span class="badge badge-secondary">No Certificado</span></td>

                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @endsection

