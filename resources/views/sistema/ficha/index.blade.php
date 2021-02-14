@extends('master')
@section('content')

    <div class="container-fluid">

        <div class="card ">

            {{--card header Menus--}}

            <div class="card-header bg-dark">

                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-cadastro-tab"
                       data-toggle="tab" href="#nav-cadastro" role="tab" aria-controls="nav-cadastro"
                       aria-selected="true"><i class="fa fa-newspaper-o"></i> <span class="audiowide text-danger"> Pedidos em analise</span>
                    </a>

                    <a class="nav-item nav-link" id="nav-calculo-tab" data-toggle="tab"
                       href="#nav-processando" role="tab" aria-controls="nav-processando" aria-selected="false">
                        <i class="fa fa-yelp"></i><span class="audiowide text-info"> Pedidos em Processando</span>
                    </a>

                    <a class="nav-item nav-link" id="nav-calculo-tab" data-toggle="tab"
                       href="#nav-aprovado" role="tab" aria-controls="nav-aprovado" aria-selected="false">
                        <i class="fa fa-yelp"></i><span class="audiowide text-success"> Pedidos em Aprovados</span>
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
                                                <table class="compact hover pedidos" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Solicitante</th>
                                                        <th >Data/saída</th>
                                                        <th class="text-center">H /saída</th>
                                                        <th>Local de Saída</th>
                                                        <th>Destino</th>
                                                        <th class="text-center">Qtd/Pessoas</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Antecedencia</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($servicos_analise as $registro)
                                                        @if($registro->status == 'Analise' || $registro->status == 'Negado')
                                                            <tr>
                                                                <td>{{$registro->usuario->nome_guerra}}</td>
                                                                <td>{{date('d/m/Y', strtotime($registro->data_saida))}}</td>
                                                                <td class="text-center">{{$registro->hora_saida}}</td>
                                                                <td>{{$registro->local_saida}}</td>
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
                                                                <td class="text-center">

                                                                    @if($registro->antecedencia > 1)
                                                                        <span class="verde">{{$registro->antecedencia}}</span>
                                                                    @else
                                                                        <span class="vermelho">{{$registro->antecedencia}}</span>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    <a href="{{route('ficha.adicionar',$registro->id)}}" data-toggle="tooltip"
                                                                       data-placement="top" title="Editar pedido" class="link btn cinza text-white">Monte a ficha</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
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

                                        <table class="display compact hover pedidos" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Chefe de viatura</th>
                                                <th>Motorista</th>
                                                <th>Missão</th>
                                                <th>Viatura</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($registros as $registro)
                                                @if($registro->servicos->status === 'Processando')
                                                    <tr>
                                                        <td>{{$registro->chefe_viatura}}</td>
                                                        <td>{{$registro->motoristas->usuarios->nome_guerra}}</td>
                                                        <td>{{$registro->servicos->missao}}</td>
                                                        <td>{{$registro->viaturas->modelo}}</td>
                                                        @if($registro->servicos->status === 'Analise')
                                                            <td class="vermelho">{{$registro->servicos->status}}</td>
                                                        @elseif($registro->servicos->status === 'Processando')
                                                            <td class="amarelo">{{$registro->servicos->status}}</td>
                                                        @elseif($registro->servicos->status === 'Aprovado')
                                                            <td class="verde">{{$registro->servicos->status}}</td>
                                                        @endif

                                                        <td>
                                                            <a href="{{route('ficha.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar pedido" class="link"><i class="icon-pencil"></i></a>
                                                            <a href="{{route('detalhe',$registro->servicos->id)}}" data-toggle="tooltip" data-placement="top" title="Detalhe do pedido" class="link"><i class="icon-magnifier"></i></a>
                                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir pedido" class="link"><i class="icon-trash"></i></a>

                                                            @if(Auth::user()->tipo === 'Administrador' && $registro->servicos->status === 'Processando')
                                                                <a href="{{route('ficha.aprovar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Aprovar pedido" class="link"><i class="icon-like"></i></a>
                                                            @endif

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
                                                                            <h4 class="audiowide">Tem certeza que deseja excluir esse registro</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                    <a href="{{route('ficha.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Chefe de viatura</th>
                                                <th>Motorista</th>
                                                <th>Missão</th>
                                                <th>Viatura</th>
                                                <th>Status</th>
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

                    {{--Aprovados--}}
                    <div class="tab-pane fade" id="nav-aprovado" role="tabpanel" aria-labelledby="nav-calculo-tab" >

                        <div class="card-body">

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="table-responsive">

                                        <table class="display compact hover pedidos" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Chefe de viatura</th>
                                                <th>Motorista</th>
                                                <th>Missão</th>
                                                <th>Viatura</th>
                                                <th>Status</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($registros as $registro)
                                                @if($registro->servicos->status === 'Aprovado')
                                                    <tr>
                                                        <td>{{$registro->chefe_viatura}}</td>
                                                        <td>{{$registro->motoristas->usuarios->nome_guerra}}</td>
                                                        <td>{{$registro->servicos->missao}}</td>
                                                        <td>{{$registro->viaturas->modelo}}</td>
                                                        @if($registro->servicos->status === 'Analise')
                                                            <td class="vermelho">{{$registro->servicos->status}}</td>
                                                        @elseif($registro->servicos->status === 'Processando')
                                                            <td class="amarelo">{{$registro->servicos->status}}</td>
                                                        @elseif($registro->servicos->status === 'Aprovado')
                                                            <td class="verde">{{$registro->servicos->status}}</td>
                                                        @endif

                                                        <td>
                                                            <a href="{{route('ficha.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar pedido" class="link"><i class="icon-pencil"></i></a>
                                                            <a href="{{route('detalhe',$registro->servicos->id)}}" data-toggle="tooltip" data-placement="top" title="Detalhe do pedido" class="link"><i class="icon-magnifier"></i></a>
                                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir pedido" class="link"><i class="icon-trash"></i></a>

                                                            @if(Auth::user()->tipo === 'Administrador' && $registro->servicos->status === 'Processando')
                                                                <a href="{{route('ficha.aprovar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Aprovar pedido" class="link"><i class="icon-like"></i></a>
                                                            @endif

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
                                                                            <h4 class="audiowide">Tem certeza que deseja excluir esse registro</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                    <a href="{{route('ficha.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Chefe de viatura</th>
                                                <th>Motorista</th>
                                                <th>Missão</th>
                                                <th>Viatura</th>
                                                <th>Status</th>
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

        </div>

    </div>

@endsection

@section('myscript')
    <script>
        $(document).ready(function() {
            $('.pedidos').DataTable({

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
                    {
                        extend: 'pdfHtml5',
                        //Colocar em paisagem
                        // orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {

                            columns: [0,1,2,3,4,5,6]
                        }
                    },


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