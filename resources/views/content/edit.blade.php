
@extends('layouts.template')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Actualizar {{ $type->name }}
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('courses.types.show', [$course->id, $type->id]) }}" class="btn-shadow btn btn-info">
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
            Ingrese los datos del {{ $type->name }} / {{ $course->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('courses.types.contents.update', [$course->id, $type->id,$content->id] ) }}" method="POST" enctype="multipart/form-data" id="formGeneral">
                @method('PUT')
                @include('content.partials._form', ['btnText' => 'Editar'])
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description')
        $('input[type="file"]').change(function(e){
            let fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@endsection
