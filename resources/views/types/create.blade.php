@extends('layouts.template')

@section('content')

    @include('layouts.title', array(
                                    'icon'         =>'home',
                                    'title'         => 'Registrar Tipo Contenido',
                                    'description'   => '',
                                    'button'           => 'Regresar',
                                    'href'          => 'types.index'))

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
        <div class="card-body">
        {!! Form::open(['route' =>'types.store','id'=>'form_Type','method'=> 'POST','class' => 'form-horizontal']) !!}
                @include('types.partials.form', ['btnText' => 'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>

                
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#form_Type').submit(function()
            {
                $('.btnSubmit').prop('disabled',true);
                $('.btnSubmit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
            });
        });
    </script>
@endsection