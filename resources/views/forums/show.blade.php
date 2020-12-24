@extends('layouts.template')


@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>FORO
                <div class="page-title-subheading">Vista de Foro
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                <a href="{{route('forums.index')}}"  class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Regresar
                    </a>
                </div>
            </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
            <div class="media flex-wrap w-100 align-items-center"> <img style="width:45px;height:45px;" src="{{!(Auth::user()->avatar() === NULL) ? Auth::user()->avatar() : asset('img/image.png')}}" class="d-block ui-w-40 rounded-circle" alt="">
                    <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true">{{$user->fullname}}</a>
                        <div class="text-muted small">0 days ago</div>
                    </div>
                    <div class="text-muted small ml-3">
                        <div><strong>0</strong> posts</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>{{$forum->title}}</p>
            </div>
            <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                <div class="px-4 pt-3"><span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">0</span> </span> </div>
                <div class="px-4 pt-3"> <button type="button" disabled class="btn btn-primary"><i class="ion ion-md-create"></i>&nbsp; Reply</button> </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
