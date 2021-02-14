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
                                    <h3><span class="audiowide">Gerenciamento de Motoristas</span></h3>
                                </div>

                                <div class="col text-right">

                                    @can('view',\App\User::class)

                                        <a type="button" class="btn btn-primary cinza text-white pisca" href="{{route('motorista.escolher')}}">

                                            <i class="fa fa-drivers-license">

                                                Adiciaonar Motorista

                                            </i>

                                        </a>

                                    @endcan

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="container-fluid ">
                                    <table id="example" class="display compact hover" style="width:100%; height: 100%">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Motorista</th>
                                            <th class="text-center">Cat A</th>
                                            <th class="text-center">Cat B</th>
                                            <th class="text-center">Cat C</th>
                                            <th class="text-center">Cat D</th>
                                            <th class="text-center">Cat E</th>
                                            <th class="text-center">Cart. Mot</th>
                                            <th class="text-center">Dat Habil</th>
                                            <th class="text-center">Dat Venc</th>
                                            <th class="text-center">bi</th>
                                            <th class="text-center">observacao</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($registros as $registro)
                                            <tr>
                                                <td>{{$registro->id}}</td>
                                                <td>{{$registro->usuarios->nome_guerra}}</td>
                                                <td class="text-center">
                                                    @if($registro->categoria_a == 1)
                                                        <span class="text-success">Sim</span>
                                                    @else
                                                        <span class="text-danger">Não</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($registro->categoria_b == 1)
                                                        <span class="text-success">Sim</span>
                                                    @else
                                                        <span class="text-danger">Não</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($registro->categoria_c == 1)
                                                        <span class="text-success">Sim</span>
                                                    @else
                                                        <span class="text-danger">Não</span>
                                                    @endif</td>
                                                <td class="text-center">
                                                    @if($registro->categoria_d == 1)
                                                        <span class="text-success">Sim</span>
                                                    @else
                                                        <span class="text-danger">Não</span>
                                                    @endif</td>
                                                <td class="text-center">
                                                    @if($registro->categoria_e == 1)
                                                        <span class="text-success">Sim</span>
                                                    @else
                                                        <span class="text-danger">Não</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$registro->carteira_motorista}}</td>
                                                <td class="text-center">{{date('d/m/Y', strtotime($registro->habilitacao))}}</td>
                                                <td class="text-center">{{date('d/m/Y', strtotime($registro->habilitacao_vencimento))}}</td>
                                                <td class="text-center">{{$registro->bi}}</td>
                                                <td class="text-center">{{$registro->observacao}}</td>
                                                <td class="text-center">
                                                    @can('view',\App\User::class)
                                                        <a href="{{route('motorista.editar',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar usuário" class="link"><i class="icon-pencil"></i></a>
                                                        @can('delete',\App\User::class)
                                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $registro->id }}" data-toggle="tooltip" data-placement="top" title="Excluir usuário" class="link"><i class="icon-trash"></i></a>
                                                        @endcan
                                                    @endcan
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter{{ $registro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title audiowide text-danger" id="exampleModalLongTitle">Atenção!</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="container">
                                                                    <h4 class="audiowide">Tem certeza que deseja excluir o motorista: <span class="text-danger">{{$registro->usuarios->nome_guerra}}</span></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                            <a href="{{route('motorista.excluir',$registro->id)}}" type="button" class="btn btn-danger">Excluir</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Motorista</th>
                                            <th class="text-center">Cat A</th>
                                            <th class="text-center">Cat B</th>
                                            <th class="text-center">Cat C</th>
                                            <th class="text-center">Cat D</th>
                                            <th class="text-center">Cat E</th>
                                            <th class="text-center">Cart. Mot</th>
                                            <th class="text-center">Dat Habil</th>
                                            <th class="text-center">Dat Venc</th>
                                            <th class="text-center">bi</th>
                                            <th class="text-center">observacao</th>
                                            <th class="text-center">Ações</th>
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
                "order": [[0,"desc"]],

                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false
                    }
                ],

                buttons: [
                    'excel'
                ],
                responsive: true,
            });

        } );
    </script>
@endsection