
@extends('layouts.template')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Asistencias del dia {{ $assistance->assistance_date }}
                    <div class="page-title-subheading">
                        Relacion de {{$classroom->scheluded_participants_count }} particpantes
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('classrooms.assistances.index', [$classroom]) }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-plus"></i>
                        </span>
                        REGRESAR
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('layouts.message')
            <div class="main-card mb-3 card">
                <div class="card-header card-header-tab">
                    <div class="card-header-title text-capitalize">
                        <i class="header-icon fa fa-th-list fa-xs icon-gradient bg-primary"></i>
                        {{ $classroom->name }} / {{ $classroom->start_datetime }} / {{ $classroom->end_datetime }}
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <a href="{{ route('classrooms.Consolidated', [$classroom->id]) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-undo-alt"></i> REGRESAR</a>
                    </div>
                </div>
                <form action="{{ route('classrooms.assistances.register', ['classroom' => $classroom->id,'assistance' => $assistance->id]) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-sm table-hover data" id="data">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col" >Dni</th>
                                    <th scope="col" >Participante</th>
                                    <th scope="col" >Asistencia</th>
                                    <th scope="col" >Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($classroom->scheduledParticipants as $participant)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $participant->dni }} {{ $participant->pivot->id }} {{ $participant->id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $participant->full_name }}</div>
                                                        @if($participant->position || $participant->area)
                                                            <div class="widget-subheading opacity-7">{{ $participant->position }} {{ $participant->area }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input position-static" name="assistance[]" value="{{ $participant->pivot->id }}">
                                            </div>
                                        </td>
                                        <td style="white-space:nowrap;">
                                            <a class="btn btn-sm btn-icon-only btn-outline-success" href="{{ route('classrooms.assistances.show', [$classroom->id, $assistance->id]) }}">
                                                <i class="pe-7s-check btn-icon-wrapper"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <p class="text-center">No hay ninguna <f></f>echa de asistencia disponible</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                </div>
                    <div class="d-block text-left card-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable({

            });
        });
    </script>
@endsection


