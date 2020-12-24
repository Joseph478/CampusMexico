
@extends('layouts.template')


@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    {{ $type->name }}
                    <div class="page-title-subheading">
                        Lista
                    </div>
                </div>
            </div>
            @can('type-create')
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="{{ route('courses.types.contents.create', [$course->id, $type->id]) }}" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-1 opacity-8">
                                <i class="fa fa-plus"></i>
                            </span>
                            REGISTRAR {{ Str::upper($type->name) }}
                        </a>
                    </div>
                </div>
            @endcan

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.message')
            <div class="main-card mb-3 card">
                <div class="card-header card-header-tab">
                    <div class="card-header-title text-capitalize">
                        <i class="header-icon fa fa-th-list fa-xs icon-gradient bg-primary"></i>
                        {{ $course->name }}
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        {{--<a href="{{ route('modules.show',array($course->contents[0]->id,$course->id)) }}"
                           class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                            <i class="fas fa-external-link-alt"></i>
                            Ver
                        </a>--}}
                        @if(Auth::user()->hasRole('participante'))
                            <a href="{{ route('courses.participant.detail', [$classroom->id, Auth::id()]) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                                <i class="fa fa-undo-alt"></i> REGRESAR
                            </a>
                        @else
                            <a href="{{ route('courses.types.index', $course->id) }}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                                <i class="fa fa-undo-alt"></i> REGRESAR
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data" id="data">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Nombre</th>
                                @if($type->id == '1')
                                    <th scope="col" >Orden</th>
                                @endif
                                <th scope="col" >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($course->contents as $content)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $content->name }}</td>
                                    @if($type->id == '1')
                                        <td>{{ $content->order }}</td>
                                    @endif
                                    <td style="white-space:nowrap;">
                                        @can('module-list')
                                            <a class="btn btn-sm btn-icon-only btn-outline-info"
                                            href="{{ route('modules.show',$content->id) }}"><i class="pe-7s-look btn-icon-wrapper"></i></a>
                                        @endcan
                                        @can('type-show')
                                            <a class="btn btn-sm btn-icon-only btn-outline-info"
                                               href="{{ route('courses.types.contents.show',[$course->id, $type->id, $content->id]) }}">
                                                <i class="pe-7s-look btn-icon-wrapper"></i>
                                            </a>
                                        @endcan
                                        @can('type-edit')
                                            <a class="btn btn-sm btn-icon-only btn-outline-warning"
                                               href="{{ route('courses.types.contents.edit',[$course->id, $type->id, $content->id]) }}">
                                                <i class="pe-7s-pen btn-icon-wrapper"></i>
                                            </a>
                                        @endcan
                                        @can('type-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['courses.types.contents.destroy', [$course->id, $type->id, $content->id]],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                                        {!! Form::close() !!}
                                        @endcan

                                        @if($content->media->first())
                                            <a class="btn btn-sm btn-icon-only btn-outline-success"
                                               href="{{ route('contents.download',[$content->media->first()->id]) }}">
                                                <i class="fas fa-cloud-download-alt btn-icon-wrapper"></i> Descargar
                                            </a>
                                        @endif
                                        @if($content->content_link)
                                            {{--<a class="btn btn-sm btn-icon-only btn-outline-info"
                                               href="{{  }}" target="_blank">
                                                <i class="fas fa-file btn-icon-wrapper"></i>
                                            </a>--}}
                                            @if(Auth::user()->hasRole('participante'))
                                                <a class="btn btn-sm btn-icon-only btn-outline-info"
                                                   href="{{ route('courses.participant.play', [$classroom->id, $type->id, $content->id]) }}">
                                                    <i class="fas fa-play-circle btn-icon-wrapper"></i> Ver
                                                </a>
                                            @else
                                                <a class="btn btn-sm btn-icon-only btn-outline-info"
{{--                                                   href="{{ route('courses.types.contents.play', [$course->id, $type->id, $content->id]) }}"--}}
                                                >
                                                    <i class="fas fa-play-circle btn-icon-wrapper"></i>
                                                </a>
                                            @endif

                                        @endif
                                        @can('bank-list')
                                            <a class="btn btn-sm btn-icon-only btn-outline-warning"
                                            href="{{ route('banks.list',array($course->id, $content->id)) }}"><i class="fas fa-box-open btn-icon-wrapper"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <p class="text-center">No hay ninguna reunión disponible</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
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


