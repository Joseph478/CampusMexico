@extends('layouts.template')

@section('content')

@include('layouts.title', array(
            'icon'          => 'culture',
            'title'         => 'Empresas',
            'description'   => 'Lista de Empresas',
            'button'           => 'REGISTRAR EMPRESA',
            'href'          => 'companies.create'))





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
                                <th scope="col" >#</th>
                                <th scope="col" >name</th>
                                <th scope="col" >Dirección</th>
                                <th scope="col" >state</th>
                                <th scope="col" >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td><span class="badge badge-pill badge-primary">{{ ($company->state=1 ? 'Visible': 'No visible') }}</span></td>
                                    <td nowrap>
                                        <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                        @can('company-edit')
                                            <a class="btn btn-warning btn-sm" href="{{ route('companies.edit',$company->id) }}">
                                                <i class="pe-7s-note"></i>
                                            </a>
                                        @endcan
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="pe-7s-junk"></i>
                                            </button>
                                        </form>
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

