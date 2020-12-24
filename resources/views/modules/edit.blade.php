@extends('layouts.template')


@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>MODULO
                <div class="page-title-subheading">Editar Modulos
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="{{route('modules.index',$course->id)}}"  class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Regresar
                    </a>
                </div>
            </div>
    </div>
</div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @include('layouts.message')

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Ingrese los datos del Modulo</h5>
            <form action="{{ route('modules.update', $module->id) }}"
                method="POST" id="form_Module"
                enctype="multipart/form-data">
                @method('PUT')
                @include('modules.partials.form', ['btnText' => 'Editar'])
            </form>
        </div>
    </div>

@endsection

@section('js')
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description')
    $(document).ready(function () {
        $('#form_Module').submit(function()
        {
            $('.btnSubmit').prop('disabled',true);
            $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
        });
    });
</script>
@endsection
