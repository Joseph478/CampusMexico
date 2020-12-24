
@extends('layouts.template')


@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    {{ $classroom->course->name }}
                    <div class="page-title-subheading">
                        Encuesta
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.message')
            <div class="main-card mb-3 card">
                <div class="card-header card-header-tab">
                    <div class="card-header-title text-capitalize">
                        <i class="header-icon fa fa-th-list fa-xs icon-gradient bg-primary"></i>
                        Encuesta de Satisfacción

                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        @if(Auth::user()->hasRole('participante'))
                            <a href="{{ route('courses.participant.detail', [$classroom,$test_user->participant->id] ) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                                <i class="fa fa-undo-alt"></i> REGRESAR
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                                <div style="padding:42.19% 0 0 0;position:relative;">

                                            @if($classroom->course->id ==1)
                                            <!--Es identificacion de peligros -->
                                                <iframe src="{{'https://docs.google.com/forms/u/1/d/e/1FAIpQLScjBolHZqEzGwRlD67KNxuqc_Ja5KgjhikOgtp8HN0fUSKBrA/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==2)
                                            <!--Es Notificacion investigacion y resportes -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLSfNuHGmdkB6Soz8jfL_e8FDNGKBbaD7HDcggAOZr7iFdppQog/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==3)
                                            <!--Inspecciones de seguridad y salud en el trabajo -->
                                                <iframe src="{{'https://docs.google.com/forms/u/1/d/e/1FAIpQLSd35XK_k-XyL5XZxlNUcySUOfpyxTYjQbCWf_EqrV-ksQD88Q/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==4)
                                            <!--Comite de seguridad y salud en el trabajo -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLSdJ4JfbCCJ1prh7w5ih4xdgJ3rKlZdZ8ywNg1or3ihCi_av-Q/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            <!--Nuevos cursos SGA
                                            @if($classroom->course->id ==5)
                                            <!--Es SGA . Política – Plan de Manejo ambiental  -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLScrfT_5K-CdPBmBTK_IY7sYkNZ4JrHO8UF4OkrF7yGB65I7iw/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==6)
                                            <!--ISO 14001 – Ciclo de Vida de Identificación de aspecto -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLScnm7CzSOug3tjDKc3D9WzaXqo8ctT1xzxGoMeYLuyAGQrfuA/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==7)
                                            <!--Primera respuesta – control, mitigación -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLScnIY_sKE6Y4fRpFaqoODdNf595EIbN1qOY8L_T_Sdf12COdA/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==8)
                                            <!--Concientización del uso adecuado de recursos naturales -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLSeSOX0DljhcjISiHWX3OIeMHY-nZF3F8MPLHqNf0qyta2PyLw/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif
                                            @if($classroom->course->id ==9)
                                            <!--Conservación del Medio ambiente y conservación del área  -->
                                                <iframe src="{{'https://docs.google.com/forms/d/e/1FAIpQLSd5ShhMUEQjBsPzHjA-CEAaX7Z5EqpoBiH7GQYI9NSFuc9v1w/viewform'}}?autoplay=1&byline=0&portrait=0"
                                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                            @endif

                                </div>
                                <script src="https://player.vimeo.com/api/player.js"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection


