@extends('layouts.template')


@section('content')
    @include('layouts.title', array(
    'icon'          => 'users',
    'title'         => 'Facilitadores',
    'description'   => 'Lista de Facilitadores',
    'button'           => 'REGISTRAR FACILITADOR',
    'href'          => 'facilitators.create'))


    @if(session('message'))
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-{{ session('message')[0] }} alert-dismissible fade show" role="alert">
                    <strong>Mensaje!</strong> {{ session('message')[1] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Lista de Facilitadores
                </div>
                <div class="table-responsive">
                    <table class="align-middle table table-borderless table-striped table-hover text-center">
                        <tr>
                            
                            <th>NRO</th>
                            <th>FACILITADOR</th>
                            <th>DNI</th>
                            <th>EMPRESA</th>
                            <th>AREA</th>
                            <th>CARGO</th>
                            <th>EMAIL</th>
                            <th>OPC</th>
                        </tr>
                        @foreach ($facilitators as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$user->getFullName()}}</td>
                                <td>{{ $user->dni }}</td>
                                <td>
                                {{ $user->company->name }}
                                </td>
                                <td>{{ $user->area }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->email }}</td>
                                <td style="white-space:nowrap;">
                                    <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('facilitators.show',$user->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('facilitators.modify',$user->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['facilitators.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
