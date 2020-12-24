@extends('layouts.template')


@section('content')

    @include('layouts.title', array(
                                'icon'         =>'home',
                                'title'         => 'Editar Curso',
                                'description'   => '',
                                'button'           => 'Regresar',
                                'href'          => 'courses.index'))


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Ingrese los datos del curso</h5>
            <form action="{{ route('courses.update', $course->id) }}"
                method="POST" id="formCourse"
                enctype="multipart/form-data">
                @method('PUT')
                @include('courses.partials._form', ['btnText' => 'Editar'])
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
