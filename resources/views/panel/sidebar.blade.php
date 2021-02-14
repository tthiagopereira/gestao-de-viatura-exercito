    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    @can('view',\App\User::class)
                        <a class="nav-link" href="/"><i class="icon-speedometer"></i> Página Inicial </a>
                    @endcan
                </li>
                <li class="nav-title">
                    Menu
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="/sample/dashboard"><i class="icon-calculator"></i> Samples</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('servico.viatura')}}"><i class="icon-basket-loaded"></i> Pedido de Viatura</a>
                </li>
                @if(Auth::user()->tipo == 'Usuario')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuario.editar',Auth::user()->id)}}"><i class="icon-wrench"></i> Meus dados</a>
                    </li>
                @endif
                @can('restrito',\App\User::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuarios')}}"><i class="icon-people"></i> Ger de usuários</a>
                    </li>
                @endcan
                @can('view',\App\User::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('motorista')}}"><i class="fa fa-drivers-license"></i> Ger de motoristas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viaturas')}}"><i class="fa fa-car"></i> Viatura</a>
                    </li>
                @endcan
                @can('restrito',\App\User::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('escalao')}}"><i class="icon-list"></i> Escalão</a>
                    </li>
                @endcan
                @can('view',\App\User::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ficha')}}"><i class="icon-bag"></i> Ficha de Viaturas</a>
                    </li>
                @endcan
                @can('view',\App\User::class)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mapas')}}"><i class="icon-map"></i> Mapa de Viaturas</a>
                    </li>
                @endcan
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>