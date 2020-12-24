
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
                        {{ $type->name }}
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
                        {{ $content->name }}

                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        @if(Auth::user()->hasRole('participante'))
                            <a href="{{ route('courses.participant.type', [$classroom->id, $type->id]) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                                <i class="fa fa-undo-alt"></i> REGRESAR
                            </a>
                        @else
                            <a href="{{ route('courses.types.index', $course->id) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                                <i class="fa fa-undo-alt"></i> REGRESAR
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                                <div style="padding:42.19% 0 0 0;position:relative;">

                                    <iframe src="{{ $content->content_link }}?autoplay=1&byline=0&portrait=0"
                                            style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                            frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
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


