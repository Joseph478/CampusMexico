@extends('layouts.template')

@section('content')
@include('layouts.title', array(
                                'icon'          => 'rocket',
                                'title'         => 'Pagina de Inicio',
                                'description'   => 'Bienvenidos!',
                                'href'          => ''))

<div id="logo-container">
    <img src="../images/home/welcome.png" style="width:850px; height:580px;" class="img-fluid img-thumbnail"  alt="Responsive image">
</div>
@endsection

