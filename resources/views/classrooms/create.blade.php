@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Registrar Programación',
                                    'description'   => '',
                                    'button'           => 'Regresar',
                                    'href'          => 'classrooms.index'))


    @include('layouts.message')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{ route('classrooms.store') }}"
                method="POST" id="formGeneral"
            >
                @include('classrooms.partials._form', ['btnText' => 'Guardar'])
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
            $('#formGeneral').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
