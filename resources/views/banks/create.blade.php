@extends('layouts.template')


@section('content')

@include('layouts.title', array(
                                'icon'         =>'home',
                                'title'         => 'Registrar Banco',
                                'description'   => '',
                                'button'           => 'Regresar',
                                'href'          => 'banks.index'))

    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {!! Form::open(array('route' => 'banks.store','files'=>true,'id'=>'formBanks','method'=> 'POST','class' => 'form-horizontal')) !!}
        @include('banks.partials.form', ['btnText' => 'Guardar'])
        {!! Form::close() !!}

@endsection
@section('js')

    <script>
        $(document).ready(function () {

            $('.selection-input').select2({
                theme: "bootstrap"
            });
            $('#formBanks').submit(function()
            {
                $('.btnSubmitCourse').prop('disabled',true);
                $('.btnSubmitCourse').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection
