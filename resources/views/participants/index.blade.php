@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>PARTICIPANTES
                <div class="page-title-subheading">Lista de Participantes
                </div>
            </div>
        </div>
            <div class="page-title-actions">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalParticipants">Asignación masiva</button>
                <div class="d-inline-block dropdown">
                <a href="{{route('participants.create')}}"  class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-plus"></i>
                </span>
                        Registrar Participantes
                    </a>
                </div>
            </div>
    </div>
</div>

    @include('layouts.message')
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <span class="mr-2 d-flex">
                    hay <span class="badge badge-primary mr-1 ml-1">{{ $participants_count }}</span>{{ Str::plural('participante', $participants_count) }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="datatable">
                            <thead class="thead-light">
                                <tr  class="text-center">

                                <th>NRO</th>
                                <th>DNI</th>
                                <th>PARTICIPANTE</th>
                                <th>AREA</th>
                                <th>CARGO</th>
                                <th>EMAIL</th>
                                <th>OPC</th>
                            </tr>
                            </thead>
                            @foreach ($participants as $user)
                                <tr>
                                    <td class="text-center text-muted" >{{ $loop->iteration }}</td>
                                    <td>{{ $user->dni }}</td>
                                    <td> <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="width:50px; height:50px;" class="rounded-circle"  src="{{$user->avatar()}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{$user->getFullName()}}</div>
                                                    @isset($user->company)
                                                        <div class="widget-subheading opacity-7">{{ $user->company->name }}</div>
                                                    @else
                                                        <div class="widget-subheading opacity-7">Sin Empresa</div>
                                                    @endisset

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->area }}</td>
                                    <td>{{ $user->position }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td style="white-space:nowrap;">
                                        <a class="btn btn-sm btn-icon-only btn-outline-info" href="{{ route('participants.profile',$user->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-icon-only btn-outline-warning" href="{{ route('participants.modify',$user->id) }}"><i class="pe-7s-pen btn-icon-wrapper"></i></a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['participants.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection

    @section('modal')
    <div class="modal fade"  id="modalParticipants"   role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registro masivo de participantes</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('participants.import')}}" enctype="multipart/form-data" method="post" >
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="file_up">Asignacion Masiva</label>
                            <input id="file_up" name="file_up" type="file" accept=".xlsx">
                            <p class="help-block">Subir archivos con formato .xlsx</p>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @endsection


@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "lengthMenu": "Mostar _MENU_ registros",
                    "zeroRecords": "No hay registros encontrados",
                    "info": "Monstrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar"
                }
            });
        } );
    </script>
@endsection

