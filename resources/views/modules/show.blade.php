
@extends('layouts.template')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            @isset($modules)
            <div>MODULOS
                <div class="page-title-subheading"> GENERAL</div>
            </div>
            @endisset
            @empty($modules)
            <div>{{$module->name}}
                <div class="page-title-subheading">MODULO DEL CURSO : {{$module->course->name}}</div>
            </div>
            @endempty
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                @isset($modules)
                <a href="{{ route('modules.index',$course->id) }}" class="btn-shadow btn btn-info">
                @endisset
                @empty($modules)
                <a href="{{ route('modules.index',$module->course->id) }}" class="btn-shadow btn btn-info">
                @endempty
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        REGRESAR
                    </a>
                </div>


            </div>
    </div>
</div>

@include('layouts.message')

<div class=" bg-white container p-3 my-3 border">

@isset($modules)
@foreach ($modules as $module)
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="card-header card-header-tab">
                <div class="card-header-title text-capitalize">
                    <H6><strong>{{$module->name }}</strong></H6>
                </div>
            </div>
                <p class="lead">{!!$module->description !!}</p>
        </div>
    </div>
</div>
<br>

@endforeach

@endisset
@empty($modules)

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="card-header card-header-tab">
                <div class="card-header-title text-capitalize">
                <H6><strong>{{$module->name }}</strong></H6>
                </div>
            </div>
                <p class="lead">{!! $module->description !!}</p>
        </div>
    </div>
</div>

@endempty
</div>
<p class="text-center text-primary"><small>Campus Virtual</small></p>
@endsection
