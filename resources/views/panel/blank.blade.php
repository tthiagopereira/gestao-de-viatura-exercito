@extends('master')

@section('content')

    @if(Auth::user()->tipo === 'Usuario')

        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <p><strong>Atenção!</strong> Os pedidos de viaturas terão que ser feitos 48 horas antes da eventual necessidade,
                                para o melhoramento da logística da <strong>GARAGEM</strong> e da <strong>COMPANHIA DE COMANDO da 12º RM</strong>
                                para melhor atender suas necessidades</p>

                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>

        </div>
    @endif

    <div class="container-fluid mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="audiowide">Trafego &amp; Viaturas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-12 col-lg-4">

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="callout callout-danger">
                                                <small class="text-muted">Novos pedidos</small>
                                                <br>
                                                <h4 class="audiowide"><strong><span class="analise" id="analise"></span></strong></h4>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="callout callout-info">
                                                <small class="text-muted">Processamento</small>
                                                <br>
                                                <h4 class="audiowide"><strong><span class="processando"></span></strong></h4>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-2" width="100" height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-0">

                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="callout callout-success">
                                                <small class="text-muted">Aprovados</small>
                                                <br>
                                                <h4 class="audiowide"><strong><span class="aprovado"></span></strong></h4>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-3" width="100" height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="callout callout-warning">
                                                <small class="text-muted">Qtd de Pedidos</small>
                                                <br>
                                                <h4 class="audiowide"><strong><span class="qtd_pedidos"></span></strong></h4>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-4" width="100" height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="mt-0">
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    @can('view',\App\User::class)
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="callout">
                                                    <small class="text-muted">Viaturas Ativas</small>
                                                    <br>
                                                    <h4 class="audiowide"><strong><span class="viatura-ativa"></span></strong></h4>
                                                    <div class="chart-wrapper">
                                                        <canvas id="sparkline-chart-5" width="100" height="30"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/.col-->
                                            <div class="col-sm-6">
                                                <div class="callout callout-primary">
                                                    <small class="text-muted">Viaturas baixadas</small>
                                                    <br>
                                                    <h4 class="audiowide"><strong><span class="viatura-baixada"></span></strong></h4>
                                                    <div class="chart-wrapper">
                                                        <canvas id="sparkline-chart-6" width="100" height="30"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/.col-->
                                        </div>

                                        <!--/.row-->
                                        <hr class="mt-0">
                                    @endcan
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>

    </div>

    <div class="container-fluid">

        <div class="animated fadeIn">

            <div class="card-columns cols-2">

                <div class="card">
                    <div class="card-header">
                        <h4 class="audiowide">Serviços de Pedidos viaturas em %</h4>
                    </div>

                    <div class="card-body">
                        <div class="chart-wrapper">
                            <canvas id="pedido_viatura"></canvas>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="audiowide">Quantidade de missões cumpridas</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-wrapper">
                            <canvas id="canvas-2"></canvas>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4 class="audiowide">Viaturas em %</h4>
                    </div>

                    <div class="card-body">
                        <div class="chart-wrapper">
                            <canvas id="canvas-5"></canvas>
                        </div>
                    </div>
                </div>
                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                        {{--Doughnut Chart--}}
                        {{--<div class="card-actions">--}}
                            {{--<a href="http://www.chartjs.org">--}}
                                {{--<small class="text-muted">docs</small>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="chart-wrapper">--}}
                            {{--<canvas id="canvas-3"></canvas>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="card" hidden>
                    <div class="card-body">
                        <div class="chart-wrapper">
                            <canvas id="canvas-1"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
            <tr>
                <th>Escalões</th>
                <th>Quantidade Pedidos</th>
                <th class="text-center">Porcentagem %</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < $escaloes->count(); $i++)
                <tr>

                    <td>{{$escaloes[$i]->nome}}</td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left">
                                <strong>{{$escaloes[$i]->total}}</strong>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="clearfix">
                            <div class="float-left">
                                <strong>{{$porcent = number_format((($escaloes[$i]->total * 100)/$total),2,'.','')}}%</strong>
                                {{--number_format($number, 2, '.', '');--}}
                            </div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$porcent}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>

        <br>
    </div>

@endsection

@section('myscript')
    <script src="{{ asset('js/views/charts.js') }}"></script>
@endsection