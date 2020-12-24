
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Titulo
                    <div class="page-title-subheading">Lista
                    </div>
                </div>
            </div>
        @can('classroom-create')
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('classrooms.create')}}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        REGISTRAR 
                    </a>
                </div>
            </div>
        @endcan
        </div>
    </div>



<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"> TITULO
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                    <table class="align-middle table table-sm table-hover">
                        <thead class="thead-light">                            
                        </thead>                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection

