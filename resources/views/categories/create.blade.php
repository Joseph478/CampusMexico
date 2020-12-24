@extends('layouts.template')


@section('content')

@include('layouts.title', array(
                                'icon'         =>'categories',
                                'title'         => 'Registrar Categoria',
                                'description'   => '',
                                'button'           => 'Regresar',
                                'href'          => 'categories.index'))

    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {!! Form::open(array('route' => 'categories.store','id'=>'formCategory','method'=>'POST')) !!}
        @include('categories.partials.form', ['btnText' => 'Guardar'])
        {!! Form::close() !!}



@endsection
@section('js')

    <script>
        $(document).ready(function () {

            $('.selection-input').select2({
                theme: "bootstrap"
            });
            $('#formCategory').submit(function()
            {
                $('.btnSubmitCourse').prop('disabled',true);
                $('.btnSubmitCourse').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
