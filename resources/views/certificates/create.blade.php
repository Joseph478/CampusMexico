@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Registrar Certificado',
                                    'description'   => '',
                                    'button'           => 'Regresar',
                                    'href'          => 'certificates.index'))


    @include('layouts.message')
    <div class="main-card mb-3 card">
        <div class="card-body">
        {!! Form::open([
                'route' =>'certificates.store',
                'id'=>'form_certificate',
                'files'=>'true','method'=> 'POST','class' => 'form-horizontal'
                ]) !!}
                @include('certificates.partials.form', ['btnText' => 'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>


@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#form_certificate').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
