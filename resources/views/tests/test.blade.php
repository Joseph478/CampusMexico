@extends('layouts.template')


@section('content')

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-home icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>{{$test->name}}
                        <div class="page-title-subheading">IGH Le desea suerte en su Examen <img src="{{asset('storage/feliz.png')}}" alt="">
                        </div>
                    </div>
                </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="#" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        </div>

@include('layouts.message')

<form action="{{ route('courses.test.register',[$classroom,$test]) }}"
            method="POST" id="formTestUser">
            <div class="body"onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
    @csrf

            <div  class="row"style="position:relative;right:-800px">
                    <div id="counter"></div>
            </div>
            <br>

@foreach($classroom->course->banks as $bank)
    <div class="card">
        <div class="card-body">
            <h6><strong>{{ $loop->iteration }}.- {{ $bank->title }}</strong></h6>
        </div>
    </div>

        <div class="card my-2">
            @foreach($bank->childs as $child)
                <div class="form-check card my-1 mx-4">
                    <input class="form-check-input" type="radio"
                        id="{{ $child->id }}"
                        name="inputs[{{$child->parent_id}}]"
                        value="{{ $child->id }}"
                        required>
                    <label class="" for="{{ $child->id }}">
                        {{ $child->title }}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
    <input type="hidden"  name="date" value="{{$date}}">


    <div class="row my-4">
        <div class="col">
            <div>
                <button type="submit" id="btn-test"  class="btn btn-primary btn_submit_register">Enviar</button>
            </div>
        </div>
    </div>
</div>
</form>



@endsection

@section('js')
<script>

    $("#counter").countdown({
        digitImages: 6,
        image: "../../../img/digits.png",
        format: 'hh:mm:ss',
        startTime: "{{$test->time}}",
        start: true,
        timerEnd: function() { document.forms["formTestUser"].submit(); },

    });
    $('#formTestUser').submit(function(){
        $('#btn-test').prop('disabled',true);
        $('#btn-test').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');

    });
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>
@endsection
