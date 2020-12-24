
@extends('layouts.template')

@section('content')


@can('type-list')
@include('layouts.title', array(
                                 'icon'         =>'home',
                                'title'         => 'Contenido',
                                'description'   => 'Lista',
                                'button'           => 'REGISTRAR TIPO CONTENIDO',
                                'href'          => 'types.create'))
@endcan

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"> TIPOS
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                    <table class="align-middle table table-sm table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Nombre</th>
                                <th scope="col" >Descripción</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($type as $types)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $types->name }}</td>
                                <td>{{ $types->description }}</td>
                                <td style="white-space:nowrap;">
                                @can('type-list')
                                    <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('types.show',$types->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                @endcan
                                @can('type-edit')
                                    <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('types.edit',$types->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                @endcan
                                @can('type-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['types.destroy', $types->id],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                        {!! Form::close() !!}
                                @endcan

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

