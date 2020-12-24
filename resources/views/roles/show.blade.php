@extends('layouts.template')


@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Roles
                <div class="page-title-subheading">Lista de roles
                </div>
            </div>
        </div>

        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{ route('roles.index') }}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-plus"></i>
                    </span>
                    REGISTRAR
                </a>
            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card text-center">
            <div class="card-header text-center bg-primary text-white"> PERMISOS ASIGNADOS
            </div>
            <div class="card-body">
                @include('layouts.message')
                <div class="form-group">
                    <p class="lead text-uppercase">
                        <strong>{{ $role->name }}</strong>
                        </p>
                </div>

                <div class="row">
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                        <div class="col-sm">
                            <span class="badge badge-pill badge-info">{{ $v->name }}</span>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
