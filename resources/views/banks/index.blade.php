
@extends('layouts.template')


@section('content')

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-home icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Banco
                        <div class="page-title-subheading">Lista de Banco
                        </div>
                    </div>
                </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                        <a href="{{ route('banks.save',$course->id) }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                                REGISTRAR BANCO
                            </a>
                        </div>


                    </div>
            </div>
        </div>

    @include('layouts.message')
    <div class="main-card mb-3 card">
        <div class="card-body">
    <div class="table-responsive">
    <table class="align-middle table table-sm table-hover" id="datatable">
        <thead class="thead-light">
            <tr>
                <th scope="col" >#</th>
                <th width="50%"scope="col" >Preguntas</th>
                <th scope="col" >Modulo</th>
                <th scope="col" >Acciones</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($banks as $bank)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $bank->title }}</td>
                <td>{{ $bank->content->name }}</td>

                <td style="white-space:nowrap;">
                                <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('banks.show',$bank->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('banks.edit',$bank->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['banks.destroy', $bank->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
    <p class="text-center text-primary"><small>Campus Virtual</small></p>
@endsection


@section('js')

@endsection
