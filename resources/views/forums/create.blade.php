@extends('layouts.template')


@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>CREAR FORO
                <div class="page-title-subheading">Ingrese su Pregunta
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="{{route('forums.index')}}"  class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Regresar
                    </a>
                </div>
            </div>
    </div>
</div>


    @include('layouts.message')

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Registre su Pregunta</h5>
            <form action="{{ route('forums.store') }}"
                method="POST" id="form_forums"
                enctype="multipart/form-data">
                @include('forums.partials.form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description')
        $(document).ready(function () {
            $('#form_forums').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
