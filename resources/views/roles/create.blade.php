@extends('layouts.template')


@section('content')
@include('layouts.title', array(
                                 'icon'         =>'home',
                                'title'         => 'Crear Roles',
                                'description'   => '',
                                'button'           => 'Regresar',
                                'href'          => 'roles.index'))


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-header"> NUEVO ROL
            </div>
            <div class="card-body">
                @include('layouts.message')
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Ingres nombre Rol">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button> ó
                    <a href="{{ route('roles.index') }}">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
