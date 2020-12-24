@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Programación del curso "'.$classroom->name.'"',
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
        <div class="card-header">Información</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <dl>
                        <dt>FECHA Y HORA DE INICIO</dt>
                        <dd>{{ $classroom->start_datetime }}</dd>
                        <dt>FECHA DE FINALIZACION</dt>
                        <dd>{{ $classroom->end_datetime }}</dd>
                        <dt>VACANTES</dt>
                        <dd>{{ $classroom->vacancies }}</dd>
                        <dt>MODALIDAD</dt>
                        <dd>{{ $classroom->modality }}</dd>
                    </dl>
                </div>
                <div class="col">
                    <dl>
                        <dt>DESCRIPCION</dt>
                        <dd>{{ $classroom->course->description }}</dd>
                    </dl>
                </div>
            </div>

            <div class="divider"></div>

            <div class="card-title d-flex justify-content-start align-items-center">
                <span class="mr-2">Tienes <span class="badge badge-primary">5</span> participantes inscritos</span>
                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-reply"></i> Ver</a>
            </div>
            <table>

            </table>
        </div>
    </div>

@endsection
@section('js')
    <script>
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
