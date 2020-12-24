
@extends('layouts.template')


@section('content')
@include('layouts.title', array(
                                 'icon'         =>'home',
                                'title'         => 'Categorias',
                                'description'   => 'Lista de Categorias',
                                'button'           => 'REGISTRAR CATEGORIA',
                                'href'          => 'categories.create'))
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header"> LISTA
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('layouts.message')
                        <table class="align-middle table table-sm table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>

                                    <td style="white-space:nowrap;">
                                                    <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('categories.show',$category->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('categories.edit',$category->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
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
        </div>
    </div>
@endsection

@section('js')

@endsection
