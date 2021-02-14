@extends('master')
@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col">
                                    <h3><span class="audiowide">Viaturas</span></h3>
                                </div>

                                <div class="col text-right">
                                    @can('view',\App\User::class)
                                        <a type="button" class="btn btn-primary cinza text-white pisca" data-toggle="tooltip" data-placement="top" title="Adicionar uma viatura no Sistema" href="{{route('viatura.adicionar')}}">
                                            <i class="fa fa-car">
                                                Adiciaonar viatura
                                            </i>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-body">



                            <div class="card ">

                                {{--card header Menus--}}

                                <div class="card-header bg-dark">

                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                        <a class="nav-item nav-link active" id="nav-cadastro-tab"
                                           data-toggle="tab" href="#nav-cadastro" role="tab" aria-controls="nav-cadastro"
                                           aria-selected="true"><i class="fa fa-newspaper-o"></i> <span class="audiowide text-success"> Ativas </span>
                                        </a>

                                        <a class="nav-item nav-link" id="nav-calculo-tab" data-toggle="tab"
                                           href="#nav-processando" role="tab" aria-controls="nav-processando" aria-selected="false">
                                            <i class="fa fa-yelp"></i><span class="audiowide text-danger"> Baixadas</span>
                                        </a>

                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="tab-content" id="">
                                        <div class="tab-pane fade show active" id="nav-cadastro" role="tabpanel" aria-labelledby="nav-cadastro-tab">
                                            <div class=" bg-light">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <table class="display viaturas" style="width:100%">
                                                                <thead>
                                                                <tr class="text-center">
                                                                    <th>Placa</th>
                                                                    <th>Qtd/Passageiros</th>
                                                                    <th>Modelo</th>
                                                                    <th>Documento</th>
                                                                    <th>Viatura</th>
                                                                    <th>EB</th>
                                                                    <th>Tipo</th>
                                                                    <th>Status</th>
                                                                    <th>Ações</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($registros as $registro)
                                                                    @if($registro->status == 'Ativa')
                                                                        <tr class="text-center">
                                                                            <td>{{$registro->placa}}</td>
                                                                            <td>{{$registro->qtd_passageiro}}</td>
                                                                            <td>{{$registro->modelo}}</td>
                                                                            <td>{{$registro->documento}}</td>
                                                                            <td>{{$registro->viatura}}</td>
                                                                            <td>{{$registro->eb}}</td>
                                                                            <td>{{$registro->tipo}}</td>
                                                                            <td>
                                                                                @if($registro->status === "Ativa")
                                                                                    <span class="verde">{{$registro->status}}</span>
                                                                                @else
                                                                                    <span class="vermelho">{{$registro->status}}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center">

                                                                                @can('view',\App\User::class)
                                                                                    <a href="{{route('viatura.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar usuário" class=""><i class="icon-pencil"></i></a>
                                                                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir usuário" class=""><i class="icon-trash"></i></a>
                                                                                @endcan
                                                                            </td>
                                                                        </tr>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModalCenter{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$registro->placa}}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row">
                                                                                            <div class="container">
                                                                                                <h4 class="audiowide">Tem certeza que deseja excluir esse Registro</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                                        <a href="{{route('viatura.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Placa</th>
                                                                    <th>Qtd/Passageiros</th>
                                                                    <th>Modelo</th>
                                                                    <th>Documento</th>
                                                                    <th>Viatura</th>
                                                                    <th>EB</th>
                                                                    <th>Tipo</th>
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

                                        <div class="tab-pane fade" id="nav-processando" role="tabpanel" aria-labelledby="nav-calculo-tab" >

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="table-responsive">

                                                        <table class="display viaturas" style="width:100%">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th>Placa</th>
                                                                <th>Qtd/Passageiros</th>
                                                                <th>Modelo</th>
                                                                <th>Documento</th>
                                                                <th>Viatura</th>
                                                                <th>EB</th>
                                                                <th>Tipo</th>
                                                                <th>Status</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($registros as $registro)
                                                                @if($registro->status == 'Baixada')
                                                                    <tr class="text-center">
                                                                        <td>{{$registro->placa}}</td>
                                                                        <td>{{$registro->qtd_passageiro}}</td>
                                                                        <td>{{$registro->modelo}}</td>
                                                                        <td>{{$registro->documento}}</td>
                                                                        <td>{{$registro->viatura}}</td>
                                                                        <td>{{$registro->eb}}</td>
                                                                        <td>{{$registro->tipo}}</td>
                                                                        <td>
                                                                            @if($registro->status === "Ativa")
                                                                                <span class="verde">{{$registro->status}}</span>
                                                                            @else
                                                                                <span class="vermelho">{{$registro->status}}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-center">

                                                                            @can('view',\App\User::class)
                                                                                <a href="{{route('viatura.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar usuário" class=""><i class="icon-pencil"></i></a>
                                                                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir usuário" class=""><i class="icon-trash"></i></a>
                                                                            @endcan
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModalCenter{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$registro->placa}}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="container">
                                                                                            <h4 class="audiowide">Tem certeza que deseja excluir esse Registro</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                                    <a href="{{route('viatura.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Placa</th>
                                                                <th>Qtd/Passageiros</th>
                                                                <th>Modelo</th>
                                                                <th>Documento</th>
                                                                <th>Viatura</th>
                                                                <th>EB</th>
                                                                <th>Tipo</th>
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
            $('.viaturas').DataTable({

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
                    // {
                    //     extend: 'pdfHtml5',
                    //     //Colocar em paisagem
                    //     // orientation: 'landscape',
                    //     pageSize: 'LEGAL',
                    //     exportOptions: {
                    //
                    //         columns: [0,1,2,3,4,5,6 ]
                    //     }
                    // },


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