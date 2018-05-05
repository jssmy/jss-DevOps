<header>
    <div class="navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" role="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a href="{{route('user.dashboard')}}" class="navbar-brand" title="{{trans('gitscrum.you-are-you-connected-using')}} {{Auth::user()->provider}}">
                    <strong>{{Config('app.name')}}</strong></a>
            </div>
            <div class="navbar-collapse collapse">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('product_backlogs.index')}}">
                        Proyectos</a>
                    </li>
                    <li><a href="{{route('sprints.index')}}">
                        Cronograma de actividades</a>
                    </li>
                    
                    <li>
                        <a aria-expanded="false" role="button" href="#" data-toggle="dropdown">
                            <img src="{{Auth::user()->avatar}}" class="avatar" />
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('user.profile',['slug' => Auth::user()->username])}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                    Perfil</a></li>
                            <li><a href="{{route('issues.index',['slug' => 0])}}">
                                <i class="fa fa-th" aria-hidden="true"></i>
                                    Cronogramas</a></li>
                            <li class="nav-divider"></li>
                            <li>
                                <a href="{{route('team.index')}}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                    Colaboradores
                                </a>
                            </li>
                            <li><a href="{{route('wizard.step1','github')}}">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                    Actualizar repositorios</a></li>
                            <li class="nav-divider"></li>
                            <li><a href="{{route('auth.logout')}}">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
