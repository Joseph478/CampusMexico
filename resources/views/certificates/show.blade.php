@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Certificacion
                    <div class="page-title-subheading">Lista
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header card-header-tab">
                <div class="card-header-title text-capitalize">
                    <i class="header-icon fa fa-th-list fa-xs icon-gradient bg-primary"></i>
                    {{$certificate->name}}
                </div>
                <div class="btn-actions-pane-right text-capitalize">
                    <a href="{{ route('classrooms.index') }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-undo-alt"></i> REGRESAR</a>
                </div>
            </div>
            <div class="card-body">
                Certificado Name:  {{$certificate->name}} <br/><br/>

                Certificado Description : {{$certificate->description}} <br/><br/>


                Image: <img src="{{ $certificate->getFirstMediaUrl('certificates', 'thumb') }}" />

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
