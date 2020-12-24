<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{route('home')}}" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Inicio
                    </a>
                </li>
                <li class="app-sidebar__heading">Gestion</li>
                @can('company-list')
                    <li>
                        <a href="{{route('companies.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Empresas
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                    </li>
                @endcan
                @can('participant-list')
                    <li>
                        <a href="{{route('participants.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Participantes
                        </a>
                    </li>
                @endcan
                @can('course-list')
                    <li>
                        <a href="{{route('courses.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Cursos
                        </a>
                    </li>
                @endcan
                @can('course-mine')
                    <li >
                        <a href="{{ route('courses.participant.list') }}">
                            <i class="metismenu-icon pe-7s-diamond"> </i>
                            Mis Cursos
                        </a>
                    </li>
                @endcan

                @can('classroom-list')
                    <li>
                        <a href="{{route('classrooms.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Programacion
                        </a>
                    </li>
                @endcan

                @can('category-list')
                    <li>
                        <a href="{{route('categories.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Categorias
                        </a>
                    </li>
                @endcan
                @can('certificate-list')
                    <li>
                        <a href="{{route('certificates.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Certificados
                        </a>
                    </li>
                @endcan
                @can('inscription-mine')
                    <li>
                        <a href="{{route('inscriptions.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Mis Inscripciones
                        </a>
                    </li>
                    <li>
                        <a href="{{route('report')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Reporte
                        </a>
                    </li>
                @endcan
                @can('certificate-mine')
                    <li>
                        <a href="{{route('users.certificate')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Mis Certificados
                        </a>
                    </li>
                @endcan
                @can('role-list')
                    <li>
                        <a href="{{route('roles.index')}}">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Roles
                        </a>
                    </li>
                @endcan


            </ul>
        </div>
    </div>
</div>
