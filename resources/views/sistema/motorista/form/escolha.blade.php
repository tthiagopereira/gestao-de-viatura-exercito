@extends('master')
@section('content')

    <script>
        jQuery(function ($) {
            $("#identidade_militar").mask("999999999-9");
            $("#contato").mask("(99) 99999-9999");
        });
    </script>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col">
                                    <h3><span class="audiowide">Escolha um motorista</span></h3>
                                </div>
                                <div class="col text-right">
                                    @can('view',\App\User::class)
                                        <a type="button" class="btn btn-primary cinza text-white" href="{{route('motorista')}}">
                                            <i class="fa fa-drivers-license">
                                                Voltar
                                            </i>
                                        </a>

                                    @endcan
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="container ">
                                    <table id="example" class="display compact hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nome de Guerra</th>
                                            <th class="text-center">Pos/Gra</th>
                                            <th class="text-center">Ind. Milit</th>
                                            <th class="text-center">Contato</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($registros as $registro)
                                            @if(!$registro->motoristas->count())
                                                <tr>
                                                    <td>{{$registro->id}}</td>
                                                    <td>{{$registro->nome_guerra}}</td>
                                                    <td class="text-center">{{$registro->posto_graduacao}}</td>
                                                    <td class="text-center">{{$registro->identidade_militar}}</td>
                                                    <td class="text-center">{{$registro->contato}}</td>
                                                    <td class="text-center">
                                                        @can('view',\App\User::class)
                                                            <a href="{{route('motorista.adicionar',$registro->id)}}"
                                                               data-toggle="tooltip"
                                                               data-placement="top"
                                                               title="Adicionar informações desse motorista" class=""><i class="fa fa-car"></i> Ad. Motorista </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Nome de Guerra</th>
                                            <th class="text-center">Pos/Gra</th>
                                            <th class="text-center">Ind. Milit</th>
                                            <th class="text-center">Contato</th>
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
                        "visible": false,
                        "searchable": false
                    },
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