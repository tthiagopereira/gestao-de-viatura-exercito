@extends('master')
@section('content')

    {{--Mensagem da ação - cadastrar, excluir,alterar--}}
    <script>
        function mensagemFuncition() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
        }
    </script>
    {{--Menssagem--}}
    @if(Session::has('mensagem'))
        <div id="snackbar">
            <span class="audiowide">
                {{Session::get('mensagem')['msg']}}
                {!! "<script>mensagemFuncition();</script>" !!}
            </span>
        </div>
    @endif
    @if(Auth::user()->tipo === 'Usuario')
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            <strong>Atenção!</strong> Os pedidos de viaturas terão que ser feitos 48 horas antes da eventual necessidade,
                            para o melhoramento da logística da <strong>GARAGEM</strong> e da <strong>COMPANHIA DE COMANDO da 12º RM</strong>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>

        </div>
    @endif
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3><span class="audiowide">Analise de Pedidos</span></h3>
                                </div>
                                <div class="col text-right">
                                    <a type="button" class="btn btn-primary cinza text-white" href="{{route('ficha')}}">
                                        <i class="icon-basket">
                                            Voltar
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="container ">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                        <tr>
                                            {{--'usuario_id','data_saida','data_entrada','hora_saida','hora_entrada','destino','missao','viatura','transporte','quantidade_pessoa','status','chefe_viatura','observacao'--}}
                                            <th>Solicitante</th>
                                            <th>Data/saída</th>
                                            <th>Hora de saída</th>
                                            <th>Local de Saída</th>
                                            <th>Destino</th>
                                            <th class="text-center">Qtd/Pessoas</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Antecedencia</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($registros as $registro)
                                            @if($registro->status === 'Analise')
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
                            <br>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>

    </div>

@endsection

@section('myscript')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({

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

@section('myscript')

@endsection