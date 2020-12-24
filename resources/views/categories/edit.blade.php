@extends('layouts.template')


@section('content')

@include('layouts.title', array(
                                'icon'         =>'categories',
                                'title'         => 'Editar Categorias',
                                'description'   => '',
                                'button'           => 'Regresar',
                                'href'          => 'categories.index'))

    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {!! Form::open(array('route' => ['categories.update', $categories->id],'method'=>'PUT' ,'id'=>'form_categories' ,'class' => 'form-horizontal')) !!}
        @include('categories.partials.form', ['btnText' => 'Editar'])
        {!! Form::close() !!}
        
@endsection
@section('js')

<script>
        $(document).ready(function () {
            
            $('.selection-input').select2({
                theme: "bootstrap"
            });
            $('#form_categories').submit(function()
            {
            $('.btn_submit_course').prop('disabled',true);
            $('.btn_submit_course').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection