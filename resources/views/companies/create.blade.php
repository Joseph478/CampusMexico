@extends('layouts.template')

@section('content')

@include('layouts.title', array(
            'icon'          => 'culture',
            'title'         => 'Empresas',
            'description'   => 'Lista de empresas',
            'button'           => 'REGRESAR',
            'href'          => 'companies.index'))

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-header"> REGISTRAR EMPRESA
            </div>
            <div class="card-body">
                @include('layouts.message')
                <form action="{{ route('companies.store') }}" method="POST">
                    @include('companies.partials._form', ['btnText' => 'Registrar Empresa'])
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
