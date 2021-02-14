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
                                    <h3 class="audiowide">Situação:
                                        @if($registro->status === 'Analise')
                                            <span class="vermelho">{{$registro->status}}</span>
                                        @endif
                                        @if($registro->status === 'Processando')
                                            <span class="amarelo">{{$registro->status}}</span>
                                        @endif
                                        @if($registro->status === 'Aprovado')
                                            <span class="verde">{{$registro->status}}</span>
                                        @endif

                                    </h3>
                                </div>
                                <div class="col text-right">
                                    <a type="button" class="btn btn-primary cinza text-white" href="{{ url()->previous() }}">
                                        <i class="icon-logout">
                                            Voltar
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-2">
                                                                <legend  class="audiowide">Pedido</legend>
                                                                <div class="row">
                                                                    <div class="col md-4">
                                                                        <ul>
                                                                            <li>Solicitante: <strong>{{$registro->usuario->nome_guerra}}</strong></li>
                                                                            <li>Data do pedido: {{date('d/m/Y', strtotime($registro->data_saida))}}</li>
                                                                            <li>Data de retorno: {{date('d/m/Y', strtotime($registro->data_entrada))}}</li>
                                                                            <li>Hora da saída: {{$registro->hora_saida}}</li>
                                                                            <li>Hora do retorno: {{$registro->hora_entrada}}</li>
                                                                            @if($registro->status === 'Analise')
                                                                                <li class="audiowide" > <span class="vermelho">Status: {{$registro->status}}</span></li>
                                                                            @endif
                                                                            @if($registro->status === 'Processando')
                                                                                <li class="audiowide" > <span class="amarelo">Status: {{$registro->status}}</span></li>
                                                                            @endif
                                                                            @if($registro->status === 'Aprovado')
                                                                                <li class="audiowide" > <span class="verde">Status: {{$registro->status}}</span></li>
                                                                            @endif

                                                                            @if($registro->antecedencia < 2)

                                                                                <li class="audiowide" > <span class="vermelho">Dias de antecedencia do seu pedido: {{$registro->antecedencia}}</span></li>

                                                                            @else

                                                                                <li class="audiowide" > <span class="verde">Dias de antecedencia do seu pedido: {{$registro->antecedencia}}</span></li>

                                                                            @endif

                                                                        </ul>
                                                                    </div>
                                                                    <div class="col md-4">
                                                                        <ul>
                                                                            <li>Local de partida: {{$registro->local_saida}}</li>
                                                                            <li>Destino: {{$registro->destino}}</li>
                                                                            <li>Missão: {{$registro->missao}}</li>
                                                                            <li>Viatura: {{$registro->viatura}}</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col md-4">
                                                                        <ul>
                                                                            <li>Transporte: {{$registro->transporte}}</li>
                                                                            <li>Quantidade de Pessoas: {{$registro->quantidade_pessoa}}</li>
                                                                            <li>Chefe de viatura: {{$registro->chefe_viatura}}</li>
                                                                            <li>Observação: {{$registro->observacao}}</li>

                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <fieldset class="border p-2">
                                                                <legend  class="audiowide">Viatura</legend>
                                                                <div class="row mt-3">
                                                                    @foreach($registro->viaturas as $viatura)
                                                                        <div class="col md-4">

                                                                            <ul>
                                                                                <li>placa: <strong>{{$viatura->placa}}</strong></li>
                                                                                <li>Quantidade de pessoas que cabem na viatura: {{$viatura->qtd_passageiro}}</li>
                                                                                <li>Modelo do veículo: {{$viatura->modelo}}</li>
                                                                                <li>Viatura: {{$viatura->viatura}}</li>
                                                                                <li>EB: {{$viatura->eb}}</li>
                                                                                <li>Tipo de veiculo: {{$viatura->tipo}}</li>
                                                                                <li>Status do veiculo: {{$viatura->status}}</li>
                                                                            </ul>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <fieldset class="border p-2">
                                                                <legend  class="audiowide">Detalhes</legend>
                                                                <div class="row mt-3">
                                                                    @foreach($registro->fichas as $ficha)
                                                                        <div class="col md-4">
                                                                            <ul>
                                                                                <li>Chefe da viatura: <strong>{{$ficha->chefe_viatura}}</strong></li>
                                                                                <li>Contato: <strong>{{$ficha->contato}}</strong></li>
                                                                                <li>Motorista: {{$ficha->motoristas->usuarios->nome_guerra}}</li>
                                                                                <li>Contato: <strong>{{$ficha->motoristas->usuarios->contato}}</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </fieldset>
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
    </div>



@endsection
