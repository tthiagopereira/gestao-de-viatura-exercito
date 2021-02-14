<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema insterno de gerenciamento e controle de serviços que a companhia de comando e solicitado">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Gerenciamento de viaturas">
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
  <title>Parca - Sistema de pedido de viaturas</title>

  <!-- Icons -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- Styles required by this views -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script>

  <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>

  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">

  <link rel="stylesheet" href="{{asset('plugs/AmaranJS/dist/css/amaran.min.css')}}">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

@if(Session::has('mensagem'))
    <input type="text" value="{{Session::get('mensagem')['msg']}}" id="mensagem" hidden>
    <input type="text" value="{{Session::get('mensagem')['cor']}}" id="cor" hidden>
@endif

@include('panel.navbar')

<div class="app-body">
@include('panel.sidebar')
<!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
  @include('panel.breadcrumb')

  @yield('content')
  <!-- /.container-fluid -->
  </main>

  @include('panel.asidemenu')

</div>

@include('panel.footer')

@include('panel.scripts')
@yield('myscript')

</body>
</html>