@extends('layouts.template')


@section('content')
<link rel="stylesheet" href="{{ asset('complements/forums.css') }}">

@include('layouts.title', array(
            'icon'          => 'home',
            'title'         => 'Preguntas y Respuestas',
            'description'   => '',
            'button'           => 'registrar',
            'href'          => 'forums.create'))


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">

            <div class="card-body">
                <div class="table-responsive">
                    @include('layouts.message')
                </table>
                <h2 class="h4 category mb-0 p-2 rounded-top text-light">Foros</h2>
                <table class="align-middle table table-sm table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th width="40%">Pregunta</th>
                        <th >Comentarios</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forums as $forum)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$forum->title}}</td>
                        <td>{{$forum->count_coments($forum)}}</td>
                        <td><span class="badge badge-success">{{$forum->state($forum->id)}}</span></td>
                        <td style="white-space:nowrap;">
                            @can('forum-list')
                            <a class="btn btn-sm btn-icon-only btn-outline-info"
                                href="{{route('forums.show',$forum->id)}}">
                                <i class="pe-7s-look btn-icon-wrapper"></i>
                            </a>
                            @endcan
                            @can('forum-edit')
                            <a class="btn btn-sm btn-icon-only btn-outline-warning"
                                href="#">
                                <i class="pe-7s-pen btn-icon-wrapper"></i>
                            </a>
                            @endcan
                            @can('forum-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['forums.destroy',$forum->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="pe-7s-trash btn-icon-wrapper"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-icon-only btn-outline-danger'] ) }}
                            {!! Form::close() !!}
                            @endcan

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    <!--end of Aside Section-->
    <!--Footer-->
    <footer class="small bg-info">
        <div class="container">
        <ul class="list-inline mb-0">
            <li class="list-inline-item text-light">&copy; 2020 Inveritas Global Holdings Peru SA</li>
            <li class="list-inline-item"><a href="#" class="text-light">Privacy Policy</a></li>
            </ul>
        </div>
    </footer>
        </div>
        </div>
    </div>
    </div>
</div>



    @endsection

    @section('js')

    @endsection
