@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'editar Programación',
                                    'description'   => '',
                                    'button'           => 'Regresar',
                                    'href'          => 'classrooms.index'))

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
            <form action="{{ route('classrooms.update', $classroom) }}"
                  method="POST" id="formClassroom"
            >
                @method('PATCH')
                @include('classrooms.partials._form', ['btnText' => 'Editar'])
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(function () {
            $('.datetimepicker').datetimepicker({
                format: '{{ config('app.datetime_format_js') }}',
                locale: 'es',
            });
            $('.datepicker').datetimepicker({
                locale: 'es',
                format: '{{ config('app.date_format_js') }}',
            });
        });

        $(document).ready(function () {
            $('.select-input').select2({
                theme: 'bootstrap4',
            });
            $('#formCourse').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
