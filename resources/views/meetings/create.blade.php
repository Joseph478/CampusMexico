@extends('layouts.template')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Registrar reunión
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('classrooms.meetings.index', [$classroom]) }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-undo-alt"></i>
                        </span>
                        REGRESAR
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.message')

    <div class="main-card mb-3 card">
        <div class="card-header">
            Ingrese los datos de la reunión / {{ $classroom->name }} {{ $classroom->start_datetime }} / {{ $classroom->end_datetime }}
        </div>
        <div class="card-body">
            <form action="{{ route('classrooms.meetings.store', $classroom->id) }}" method="POST" id="formGeneral">
                @include('meetings.partials._form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(function () {
            $('.datepicker').datetimepicker({
                locale: 'es',
                format: '{{ config('app.date_format_js') }}',
            });
        });
    </script>
@endsection
