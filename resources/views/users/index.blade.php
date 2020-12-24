@extends('layouts.template')


@section('content')
@include('layouts.title', array(
'icon'          => 'user',
'title'         => 'Usuarios',
'description'   => 'Lista de Usuarios',
'button'           => 'REGISTRAR USUARIO',
'href'          => 'users.create'))


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Lista de Usuarios
            </div>
            <div class="table-responsive">
                <table class="align-middle table table-borderless table-striped table-hover text-center">
                    <tr>
                        <th>NRO</th>
                        <th>DNI</th>
                        <th>PARTICIPANTE</th>
                        <th>EMPRESA</th>
                        <th>AREA</th>
                        <th>CARGO</th>
                        <th>EMAIL</th>
                        <th>ROL</th>
                        <th>OPC</th>
                    </tr>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->dni }}</td>
                            <td>{{ $user->fname }} {{ $user->lname }} {{ $user->name }}</td>
                            <td>
                               {{-- {{$user->companies->name}} --}}
                            </td>
                            <td>{{ $user->area }}</td>
                            <td>{{ $user->position }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <small class="badge badge-success">{{ $v }}</small>
                                    @endforeach
                                @endif
                            </td>
                            <td style="white-space:nowrap;">
                                <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('users.show',$user->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('users.edit',$user->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
