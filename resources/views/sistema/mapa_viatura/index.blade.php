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

                                    <h3><span class="audiowide">Mapa</span></h3>

                                </div>

                                <div class="col text-right">
                                    <form action="{{route('mapa.pdf')}}" method="post" target="_blank">
                                        {{csrf_field()}}
                                        <input hidden name="data_inicial" type="date" class="form-control" placeholder="Data Inicial" value="{{isset($data_inicial) ? $data_inicial : ''}}">
                                        <input hidden type="date" name="data_final" class="form-control" placeholder="Data Final" value="{{isset($data_final) ? $data_final : ''}}">
                                        <button class="btn cinza text-white pisca" >Imprimir</button>
                                    </form>
                                </div>

                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="{{route('mapa.pesquisa')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-4">

                                                <input name="data_inicial" type="date" class="form-control" placeholder="Data Inicial" value="{{isset($data_inicial) ? $data_inicial : ''}}" required>

                                                <small id="guerraHelp" class="form-text text-muted">Informe a data inicial do pedido.</small>

                                            </div>
                                            <div class="col-md-4">

                                                <input type="date" name="data_final" class="form-control" placeholder="Data Final" value="{{isset($data_final) ? $data_final : ''}}" required>

                                                <small id="guerraHelp" class="form-text text-muted">Informe a data final do pedido.</small>

                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn cinza text-white" >Buscar</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3 text-right">

                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="container ">

                                    <div class="card ">

                                        {{--card header Menus--}}

                                        <div class="card-header bg-dark">

                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                                <a class="nav-item nav-link active" id="nav-cadastro-tab"
                                                   data-toggle="tab" href="#nav-cadastro" role="tab" aria-controls="nav-cadastro"
                                                   aria-selected="true"><i class="fa fa-newspaper-o"></i> <span class="audiowide text-danger"> Viaturas </span>
                                                </a>

                                                <a class="nav-item nav-link" id="nav-calculo-tab" data-toggle="tab"
                                                   href="#nav-processando" role="tab" aria-controls="nav-processando" aria-selected="false">
                                                    <i class="fa fa-yelp"></i><span class="audiowide text-info"> Viaturas Fixas</span>
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
                                                                    <div class="row ">
                                                                        <table class="display compact hover pedidos" style="width:100%">

                                                                            <thead>

                                                                            <tr class="text-center">
                                                                                <th>id</th>
                                                                                <th>CHE DE VTR</th>
                                                                                <th>MISSÃO</th>
                                                                                <th>DATA</th>
                                                                                <th>ITINERÁRIO</th>
                                                                                <th>H INICIO/FINAL</th>
                                                                                <th>VIATURA</th>
                                                                                <th>DOC</th>
                                                                                <th>MOROTISTA</th>
                                                                                <th>TELEFONE</th>
                                                                                <th>FICHA</th>
                                                                                <th>AÇÕES</th>

                                                                            </tr>

                                                                            </thead>

                                                                            <tbody class="text-center">

                                                                            @foreach($registros as $registro)

                                                                                <tr>
                                                                                    <td>{{$registro->id}}</td>
                                                                                    <td>{{$registro->chefe_viatura}}</td>
                                                                                    <td>{{$registro->missao}}</td>
                                                                                    <td>{{date('d/m/Y', strtotime($registro->data_inicial))}}</td>
                                                                                    <td>{{$registro->itinerario}}</td>
                                                                                    <td>{{date('H:i',strtotime($registro->hora_saida))}} - {{date('H:i',strtotime($registro->hora_entrada))}}</td>
                                                                                    <td>{{$registro->modelo}} - {{$registro->placa}} @if($registro->eb) - @endif {{$registro->eb}}</td>
                                                                                    <td>@if($registro->documento === 'sem pendencia') ok @else {{$registro->documento}} @endif </td>
                                                                                    <td>{{$registro->motorista}}</td>
                                                                                    <td>{{$registro->contato}}<br>{{$registro->contato_motorista}}</td>
                                                                                    <td>{{$registro->ficha}} </td>
                                                                                    <td>
                                                                                        <a href="{{route('mapa.update',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar mapa" class="link"><i class="icon-pencil"></i></a>
                                                                                    </td>

                                                                                </tr>

                                                                            @endforeach

                                                                            </tbody>

                                                                            <tfoot>

                                                                            <tr class="text-center">
                                                                                <th>id</th>
                                                                                <th>CHE DE VTR</th>
                                                                                <th>MISSÃO</th>
                                                                                <th>DATA</th>
                                                                                <th>ITINERÁRIO</th>
                                                                                <th>H INICIO/FINAL</th>
                                                                                <th>VIATURA</th>
                                                                                <th>DOC</th>
                                                                                <th>MOROTISTA</th>
                                                                                <th>TELEFONE</th>
                                                                                <th>FICHA</th>
                                                                                <th>AÇÕES</th>

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

                                                <div class="tab-pane fade" id="nav-processando" role="tabpanel" aria-labelledby="nav-calculo-tab" >

                                                    <div class="card-body">

                                                        <div class="row">

                                                            <div class="table-responsive">

                                                                <table class="display compact hover pedidos" style="width:100%">

                                                                    <thead>

                                                                    <tr class="text-center">
                                                                        <th>id</th>
                                                                        <th>CHE DE VTR</th>
                                                                        <th>MISSÃO</th>
                                                                        <th>DATA</th>
                                                                        <th>ITINERÁRIO</th>
                                                                        <th>H INICIO/FINAL</th>
                                                                        <th>VIATURA</th>
                                                                        <th>DOC</th>
                                                                        <th>MOROTISTA</th>
                                                                        <th>TELEFONE</th>
                                                                        <th>FICHA</th>
                                                                        <th>AÇÕES</th>

                                                                    </tr>

                                                                    </thead>

                                                                    <tbody class="text-center">

                                                                    @foreach($fixos as $registro)
                                                                        <tr>

                                                                            <td>{{$registro->id}}</td>
                                                                            <td>{{$registro->chefe_viatura}}</td>
                                                                            <td>{{$registro->missao}}</td>
                                                                            <td>{{date('d/m/Y', strtotime($registro->data_inicial))}}</td>
                                                                            <td>{{$registro->itinerario}}</td>
                                                                            <td>{{date('H:i',strtotime($registro->hora_saida))}} - {{date('H:i',strtotime($registro->hora_entrada))}}</td>
                                                                            <td>{{$registro->modelo}} - {{$registro->placa}} @if($registro->eb) - @endif {{$registro->eb}}</td>
                                                                            <td>@if($registro->documento === 'sem pendencia') ok @else {{$registro->documento}} @endif </td>
                                                                            <td>{{$registro->motorista}}</td>
                                                                            <td>{{$registro->contato}}<br>{{$registro->contato_motorista}}</td>
                                                                            <td>{{$registro->ficha}} </td>
                                                                            <td>
                                                                                <a href="{{route('mapa.update',$registro->id)}}" data-toggle="tooltip" data-placement="top" title="Editar mapa" class="link"><i class="icon-pencil"></i></a>
                                                                            </td>

                                                                        </tr>

                                                                    @endforeach

                                                                    </tbody>

                                                                    <tfoot>

                                                                    <tr class="text-center">
                                                                        <th>id</th>
                                                                        <th>CHE DE VTR</th>
                                                                        <th>MISSÃO</th>
                                                                        <th>DATA</th>
                                                                        <th>ITINERÁRIO</th>
                                                                        <th>H INICIO/FINAL</th>
                                                                        <th>VIATURA</th>
                                                                        <th>DOC</th>
                                                                        <th>MOROTISTA</th>
                                                                        <th>TELEFONE</th>
                                                                        <th>FICHA</th>
                                                                        <th>AÇÕES</th>

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
            $('.pedidos').DataTable({

                "order": [[10,"asc"]],

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
                    'excel'
                ],
                responsive: true,
            });
        } );
    </script>
@endsection
