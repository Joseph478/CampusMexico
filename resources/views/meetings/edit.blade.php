@extends('layouts.template')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Actualizar reunión
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
        <div class="card-header">
            Ingrese los datos de la reunión / {{ $classroom->name }} {{ $classroom->start_datetime }} / {{ $classroom->end_datetime }}
        </div>
        <div class="card-body">
            <form action="{{ route('classrooms.meetings.update', [$classroom->id, $meeting->id]) }}"
                  method="POST" id="formGeneral"
            >
                @method('PATCH')
                @include('meetings.partials._form', ['btnText' => 'Editar'])
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
