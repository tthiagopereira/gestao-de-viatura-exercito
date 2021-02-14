<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      {{--<a class="nav-link" href="/sample/dashboard">Samples</a>--}}
    </li>
  </ul>
  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        @if (Auth::check())
          <img src="{{ asset('img/10825-transportation-animation.gif') }}" class="img-avatar" alt="{{Auth::user()->email}}">
        @else
          <img src="{{ asset('img/avatars/6.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>Bem vindo: {{ auth()->user()->nome_guerra }}</strong>
        </div>
        <a class="dropdown-item" href="{{ route('logout') }}" 
          onclick="event.preventDefault(); 
          document.getElementById('logout-form').submit();">
          <i class="fa fa-lock"></i> Sair </a>
      </div>
    </li>
  </ul>
  <ul class="nav navbar-nav"><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li></ul>
  <ul class="nav navbar-nav"></ul>

  {{--<button class="navbar-toggler aside-menu-toggler" type="button">--}}
    {{--<span class="navbar-toggler-icon"></span>--}}
  {{--</button>--}}

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
</header>
