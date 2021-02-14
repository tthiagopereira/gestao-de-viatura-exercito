@extends('master')
@section('content')

    @if(Auth::user()->tipo === 'Usuario')

        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger pisca" role="alert">
                            <p><strong>Atenção!</strong> <br>
                                Os pedidos de viaturas terão que ser feitos 48 horas antes da eventual necessidade. <br>
                                Pedidos feitos antes de 48 horas será NECESSÁRIO entrar em conato com a <strong>GARAGEM</strong>.
                            </p>
                            <p>

                            </p>

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
                                    <h3><span class="audiowide">Pedidos de Viaturas</span></h3>
                                </div>
                                <div class="col text-right">
                                    <a type="button" class="btn btn-primary cinza text-white pisca" href="{{route('servico.viatura.adicionar')}}">
                                        <i class="icon-basket">
                                            Fazer pedido
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">

                                    <div class="row">
                                        {{--Pedidos em analise--}}
                                        <div class="col-sm-6">
                                            <div class="callout callout-danger">
                                                <small class="text-muted">Novos pedidos</small>
                                                <br>
                                                <strong class="h4">{{$registros->where('status','Analise')->count()}}</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        {{--Pedidos em Processamentos--}}
                                        <div class="col-sm-6">
                                            <div class="callout callout-info">
                                                <small class="text-muted">Processamento</small>
                                                <br>
                                                <strong class="h4">{{$registros->where('status','Processando')->count()}}</strong>
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
                                                <strong class="h4">{{$registros->where('status','Aprovado')->count()}}</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-3" width="100" height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        @can('view',\App\User::class)
                                            <div class="col-sm-6">
                                                <div class="callout callout-warning">
                                                    <small class="text-muted">Qtd de Pedidos</small>
                                                    <br>
                                                    <strong class="h4">{{$registros->count()}}</strong>
                                                    <div class="chart-wrapper">
                                                        <canvas id="sparkline-chart-4" width="100" height="30"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                    @endcan
                                    <!--/.col-->
                                    </div>
                                    <!--/.row-->
                                    <hr class="mt-0">
                                </div>
                                <!--/.col-->
                                <div class="col-sm-6 col-lg-4">
                                    @can('view',\App\User::class)
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="callout">
                                                    <small class="text-muted">Viaturas Ativas</small>
                                                    <br>
                                                    <strong class="h4">{{$viatura->where('status','Ativa')->count()}}</strong>
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
                                                    <strong class="h4">{{$viatura->where('status','Baixada')->count()}}</strong>
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
                                <!--/.col-->
                            </div>

                            <div class="row ">


                                <div class="container">

                                    <div class="card ">

                                        {{--card header Menus--}}

                                        <div class="card-header bg-dark">

                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                                <a class="nav-item nav-link active" id="nav-cadastro-tab"
                                                   data-toggle="tab" href="#nav-cadastro" role="tab" aria-controls="nav-cadastro"
                                                   aria-selected="true"><i class="fa fa-anchor"></i> <span class="audiowide text-danger"> Novos Pedidos</span>
                                                </a>

                                                <a class="nav-item nav-link" id="nav-calculo-tab" data-toggle="tab"
                                                   href="#nav-processando" role="tab" aria-controls="nav-processando" aria-selected="false">
                                                    <i class="fa fa-yelp"></i> <span class="audiowide text-info"> Pedidos em Processando</span>
                                                </a>

                                                <a class="nav-item nav-link" id="nav-calculo-tab" data-toggle="tab"
                                                   href="#nav-aprovado" role="tab" aria-controls="nav-aprovado" aria-selected="false">
                                                    <i class="fa fa-yelp"></i> <span class="audiowide text-success"> Pedidos em Aprovados</span>
                                                </a>

                                            </div>

                                        </div>

                                        {{--card body--}}

                                        <div class="card-body">

                                            <div class="tab-content" id="">

                                                {{--Analise--}}
                                                <div class="tab-pane fade show active" id="nav-cadastro" role="tabpanel" aria-labelledby="nav-cadastro-tab">

                                                    <div class=" bg-light">

                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="card-body">
                                                                    <div class="row ">
                                                                        <div class="container ">

                                                                            <table id="example" class="display example" style="width:100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>id</th>
                                                                                    <th>Nome Guerra</th>
                                                                                    <th>Data/saída</th>
                                                                                    <th>Destino</th>
                                                                                    <th class="text-center">Qtd/Pessoas</th>
                                                                                    <th class="text-center">Status</th>
                                                                                    <th>Mensagem</th>
                                                                                    <th class="text-center">Antecedencia</th>
                                                                                    <th>Ações</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($registros as $registro)
                                                                                    @if($registro->tipo != 'Administrador')
                                                                                        @if($registro->status === 'Analise' || $registro->status === 'Negado')
                                                                                            <tr>
                                                                                                <td>{{$registro->id}}</td>
                                                                                                <td>{{$registro->usuario->posto_graduacao}} {{$registro->usuario->nome_guerra}}</td>
                                                                                                <td>{{date('d/m/Y', strtotime($registro->data_saida))}}</td>
                                                                                                {{--<td>{{date('d/m/Y', strtotime($registro->data_entrada))}}</td>--}}
                                                                                                <td>
                                                                                                    @if(strlen($registro->destino) > 9)
                                                                                                        <span data-toggle="tooltip" data-placement="top" title="{{$registro->destino}}">{{substr($registro->destino,0,9)}}.. </span>
                                                                                                    @else
                                                                                                        {{$registro->destino}}
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td class="text-center">{{$registro->quantidade_pessoa}}</td>
                                                                                                <td class="text-center">
                                                                                                    @if($registro->status === 'Analise')
                                                                                                        <span class="vermelho">{{$registro->status}}</span>
                                                                                                    @endif
                                                                                                    @if($registro->status === 'Processando')
                                                                                                        <span class="amarelo">{{$registro->status}}</span>
                                                                                                    @endif
                                                                                                    @if($registro->status === 'Aprovado')
                                                                                                        <span class="verde">{{$registro->status}}</span>
                                                                                                    @endif
                                                                                                    @if($registro->status === 'Negado')
                                                                                                        <span class="pisca">{{$registro->status}}</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if($registro->negar)
                                                                                                        <span class="text-danger">{{$registro->negar}}</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td class="text-center">

                                                                                                    @if($registro->antecedencia > 1)
                                                                                                        <span class="verde">{{$registro->antecedencia}}</span>
                                                                                                    @else
                                                                                                        <span class="vermelho">{{$registro->antecedencia}}</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a href="{{route('servico.viatura.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar pedido" class="link"><i class="icon-pencil"></i></a>
                                                                                                    <a href="{{route('detalhe',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Detalhe do pedido" class="link"><i class="icon-magnifier"></i></a>
                                                                                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir pedido" class="link"><i class="icon-trash"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="exampleModalCenter{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="exampleModalLongTitle">{{$registro->name}}</h5>
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <div class="row">
                                                                                                                <div class="container">
                                                                                                                    <h4 class="audiowide">Tem certeza que deseja excluir esse usuário</h4>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                                                            <a href="{{route('servico.viatura.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                                <tfoot>
                                                                                <tr>
                                                                                    <th>id</th>
                                                                                    <th>Nome Guerra</th>
                                                                                    <th>Data/saída</th>
                                                                                    <th>Destino</th>
                                                                                    <th class="text-center">Qtd/Pessoas</th>
                                                                                    <th class="text-center">Status</th>
                                                                                    <th>Mensagem</th>
                                                                                    <th class="text-center">Antecedencia</th>
                                                                                    <th>Ações</th>
                                                                                </tr>
                                                                                </tfoot>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                {{--Processando--}}
                                                <div class="tab-pane fade" id="nav-processando" role="tabpanel" aria-labelledby="nav-calculo-tab" >

                                                    <div class="card-body">

                                                        <div class="container-fluid">

                                                            <div class="row">

                                                                <div class="table-responsive">

                                                                    <table id="example" class="display example" style="width:100%">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>Nome Guerra</th>
                                                                            <th>P/G</th>
                                                                            <th>Data/saída</th>
                                                                            <th>Data/retorno</th>
                                                                            <th>Destino</th>
                                                                            <th class="text-center">Qtd/Pessoas</th>
                                                                            <th class="text-center">Status</th>
                                                                            <th class="text-center">Antecedencia</th>
                                                                            <th>Ações</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($registros as $registro)
                                                                            @if($registro->tipo != 'Administrador')
                                                                                @if($registro->status === 'Processando')
                                                                                    <tr>
                                                                                        <td>{{$registro->id}}</td>
                                                                                        <td>{{$registro->usuario->nome_guerra}}</td>
                                                                                        <td>{{$registro->usuario->posto_graduacao}}</td>
                                                                                        <td>{{date('d/m/Y', strtotime($registro->data_saida))}}</td>
                                                                                        <td>{{date('d/m/Y', strtotime($registro->data_entrada))}}</td>
                                                                                        <td>
                                                                                            @if(strlen($registro->destino) > 9)
                                                                                                <span data-toggle="tooltip" data-placement="top" title="{{$registro->destino}}">{{substr($registro->destino,0,9)}}.. </span>
                                                                                            @else
                                                                                                {{$registro->destino}}
                                                                                            @endif
                                                                                        </td>
                                                                                        <td class="text-center">{{$registro->quantidade_pessoa}}</td>
                                                                                        <td class="text-center">
                                                                                            @if($registro->status === 'Analise')
                                                                                                <span class="vermelho">{{$registro->status}}</span>
                                                                                            @endif
                                                                                            @if($registro->status === 'Processando')
                                                                                                <span class="amarelo">{{$registro->status}}</span>
                                                                                            @endif
                                                                                            @if($registro->status === 'Aprovado')
                                                                                                <span class="verde">{{$registro->status}}</span>
                                                                                            @endif

                                                                                        </td>
                                                                                        <td class="text-center">

                                                                                            @if($registro->antecedencia > 1)
                                                                                                <span class="verde">{{$registro->antecedencia}}</span>
                                                                                            @else
                                                                                                <span class="vermelho">{{$registro->antecedencia}}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="{{route('servico.viatura.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar pedido" class="link"><i class="icon-pencil"></i></a>
                                                                                            <a href="{{route('detalhe',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Detalhe do pedido" class="link"><i class="icon-magnifier"></i></a>
                                                                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir pedido" class="link"><i class="icon-trash"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="exampleModalCenter{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$registro->name}}</h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                        <div class="container">
                                                                                                            <h4 class="audiowide">Tem certeza que deseja excluir esse usuário</h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                                                    <a href="{{route('servico.viatura.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>Nome Guerra</th>
                                                                            <th>P/G</th>
                                                                            <th>Data/saída</th>
                                                                            <th>Data/retorno</th>
                                                                            <th>Destino</th>
                                                                            <th class="text-center">Qtd/Pessoas</th>
                                                                            <th class="text-center">Status</th>
                                                                            <th class="text-center">Antecedencia</th>
                                                                            <th>Ações</th>                                        </tr>
                                                                        </tfoot>
                                                                        </tbody>
                                                                    </table>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                {{--Aprovados--}}
                                                <div class="tab-pane fade" id="nav-aprovado" role="tabpanel" aria-labelledby="nav-calculo-tab" >

                                                    <div class="card-body">

                                                        <div class="container-fluid">

                                                            <div class="row">

                                                                <div class="table-responsive">

                                                                    <table id="example" class="display example" style="width:100%">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>Nome Guerra</th>
                                                                            <th>P/G</th>
                                                                            <th>Data/saída</th>
                                                                            <th>Data/retorno</th>
                                                                            <th>Destino</th>
                                                                            <th class="text-center">Qtd/Pessoas</th>
                                                                            <th class="text-center">Status</th>
                                                                            <th class="text-center">Antecedencia</th>
                                                                            <th>Ações</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($registros as $registro)
                                                                            @if($registro->tipo != 'Administrador')
                                                                                @if($registro->status === 'Aprovado')
                                                                                    <tr>
                                                                                        <td>{{$registro->id}}</td>
                                                                                        <td>{{$registro->usuario->nome_guerra}}</td>
                                                                                        <td>{{$registro->usuario->posto_graduacao}}</td>
                                                                                        <td>{{date('d/m/Y', strtotime($registro->data_saida))}}</td>
                                                                                        <td>{{date('d/m/Y', strtotime($registro->data_entrada))}}</td>
                                                                                        <td>
                                                                                            @if(strlen($registro->destino) > 9)
                                                                                                <span data-toggle="tooltip" data-placement="top" title="{{$registro->destino}}">{{substr($registro->destino,0,9)}}.. </span>
                                                                                            @else
                                                                                                {{$registro->destino}}
                                                                                            @endif
                                                                                        </td>
                                                                                        <td class="text-center">{{$registro->quantidade_pessoa}}</td>
                                                                                        <td class="text-center">
                                                                                            @if($registro->status === 'Analise')
                                                                                                <span class="vermelho">{{$registro->status}}</span>
                                                                                            @endif
                                                                                            @if($registro->status === 'Processando')
                                                                                                <span class="amarelo">{{$registro->status}}</span>
                                                                                            @endif
                                                                                            @if($registro->status === 'Aprovado')
                                                                                                <span class="verde">{{$registro->status}}</span>
                                                                                            @endif

                                                                                        </td>
                                                                                        <td class="text-center">

                                                                                            @if($registro->antecedencia > 1)
                                                                                                <span class="verde">{{$registro->antecedencia}}</span>
                                                                                            @else
                                                                                                <span class="vermelho">{{$registro->antecedencia}}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="{{route('servico.viatura.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar pedido" class="link"><i class="icon-pencil"></i></a>
                                                                                            <a href="{{route('detalhe',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Detalhe do pedido" class="link"><i class="icon-magnifier"></i></a>
                                                                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir pedido" class="link"><i class="icon-trash"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="exampleModalCenter{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$registro->name}}</h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                        <div class="container">
                                                                                                            <h4 class="audiowide">Tem certeza que deseja excluir esse usuário</h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                                                    <a href="{{route('servico.viatura.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>Nome Guerra</th>
                                                                            <th>P/G</th>
                                                                            <th>Data/saída</th>
                                                                            <th>Data/retorno</th>
                                                                            <th>Destino</th>
                                                                            <th class="text-center">Qtd/Pessoas</th>
                                                                            <th class="text-center">Status</th>
                                                                            <th class="text-center">Antecedencia</th>
                                                                            <th>Ações</th>                                        </tr>
                                                                        </tfoot>
                                                                        </tbody>
                                                                    </table>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>

    </div>

@endsection

@section('myscript')
    <script>
        $(document).ready(function() {
            $('.example').DataTable({

                dom: 'Bfrtip',
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por página",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                    "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sSearch": "Pesquisar: ",


                    "oPaginate": {
                        "sFirst": "Início",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },

                buttons: [
                    'excel', 'print',
                ],
                "order": [[0,"desc"]],

                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 0 ],
                        "visible": false
                    }
                ],
                responsive: true,
            });

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );
        } );
    </script>
@endsection