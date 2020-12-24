@extends('layouts.template')


@section('content')

@include('layouts.title', array(
                                'icon'         =>'home',
                                'title'         => 'Registrar Curso',
                                'description'   => '',
                                'button'           => 'Regresar',
                                'href'          => 'courses.index'))


    @include('layouts.message')

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Ingrese los datos del curso</h5>
            <form action="{{ route('courses.store') }}"
                method="POST" id="formCourse"
                enctype="multipart/form-data">
                @include('courses.partials._form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('temary')
        $(document).ready(function () {
            $('.select-input').select2({
                theme: 'bootstrap4',
            });

            $('#formCourse').submit(function()
            {
                $('.btnSubmitCourse').prop('disabled',true);
                $('.btnSubmitCourse').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
