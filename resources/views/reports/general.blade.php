
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Reporte
                    <div class="page-title-subheading">Generacion de reportes
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ URL::previous() }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">REPORTE</div>
            <div class="card-body">
            <form action="{{route('exportExcel')}}" method="POST">
                @csrf
                <div class="form-row align-items-center">
                    <div class="form-group col-md-3">
                        <label>Fecha Inicio</label>
                        <input type="date" autocomplete="off" class="form-control" name="start_date" value="">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Fecha Termino</label>
                        <input type="date" autocomplete="off" class="form-control" name="end_date" value="">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Curso</label>
                        <select class="custom-select mr-sm-2" name="course_id">
                        <option selected value="-1">Todos</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-md-3">
                    <button type="submit" name ="general"  class="btn btn-primary">Exportar</button>
                    <a href="{{route('exportDetailGrade')}}" class="btn btn-primary">Exportar Detalle Nota</a>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection
