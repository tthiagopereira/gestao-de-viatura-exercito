<style>
    fieldset.scheduler-border {
        border: solid 1px #DDD !important;
        padding: 0 10px 10px 10px;
        border-bottom: none;
    }

    legend.scheduler-border {
        width: auto !important;
        border: none;

    }
</style>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <fieldset class="border p-2">
                <legend  class="audiowide">Detalhe do pedido</legend>
                <div class="row">
                    <div class="col md-4">
                        <ul>
                            <li>Solicitante: <strong>{{$servico->usuario->nome_guerra}}</strong></li>
                            <li>Data do pedido: <strong>{{date('d/m/Y', strtotime($servico->data_saida))}}</strong></li>
                            <li>Data de retorno: <strong>{{date('d/m/Y', strtotime($servico->data_entrada))}}</strong></li>
                            <li>Hora da saída: <strong>{{$servico->hora_saida}}</strong></li>
                            <li>Hora do retorno: <strong>{{$servico->hora_entrada}}</strong></li>
                            @if($servico->status === 'Analise')
                                <li class="audiowide" > <span class="vermelho">Status: {{$servico->status}}</span></li>
                            @endif
                            @if($servico->status === 'Processando')
                                <li class="audiowide" > <span class="amarelo">Status: {{$servico->status}}</span></li>
                            @endif
                            @if($servico->status === 'Aprovado')
                                <li class="audiowide" > <span class="verde">Status: {{$servico->status}}</span></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col md-4">
                        <ul>
                            <li>Local de partida: <strong>{{$servico->local_saida}}</strong></li>
                            <li>Destino: <strong>{{$servico->destino}}</strong></li>
                            <li>Missão: <strong>{{$servico->missao}}</strong></li>
                            <li>Viatura: <strong>{{$servico->viatura}}</strong></li>
                        </ul>
                    </div>
                    <div class="col md-4">
                        <ul>
                            <li>Transporte: <strong>{{$servico->transporte}}</strong></li>
                            <li>Quantidade de Pessoas: <strong>{{$servico->quantidade_pessoa}}</strong></li>
                            <li>Chefe de viatura: <strong>{{$servico->chefe_viatura}}</strong></li>
                            <li>Observação: <strong>{{$servico->observacao}}</strong></li>

                        </ul>
                    </div>
                </div>

                <input type="text" value="{{$servico->id}}" name="servico_viatura_id" hidden>

            </fieldset>
        </div>
    </div>

    {{--    Viatura--}}
    <div class="row mt-3">
        <div class="col-md-12">
            <fieldset class="border p-2">
                <legend class="audiowide">Selecione a Viatura</legend>
                <div class="form-group">
                    <label for="viatura_id" class="audiowide">Viatura</label>

                    <select class="form-control" id="viatura_id" name="viatura_id" required>

                        <option value="">Informe a viatura</option>

                        @foreach($viaturas as $viatura)

                            @if($viatura->status === 'Ativa')


                                @if(isset($registro->viatura_id))

                                    @if($viatura->id === $registro->viatura_id)

                                        <option selected="selected" value="{{$viatura->id}}">Modelo: {{$viatura->modelo}}; &nbsp;&nbsp;&nbsp;Lugares: {{$viatura->qtd_passageiro}}</option>

                                    @else

                                        <option value="{{$viatura->id}}">Modelo: {{$viatura->modelo}}; &nbsp;&nbsp;&nbsp;Lugares: {{$viatura->qtd_passageiro}}</option>

                                    @endif

                                @else

                                    @if($viatura->id === isset($registro->viatura_id))

                                        <option selected="selected" value="{{$viatura->id}}">Modelo: {{$viatura->modelo}}; &nbsp;&nbsp;&nbsp;Lugares: {{$viatura->qtd_passageiro}}</option>

                                    @else

                                        <option value="{{$viatura->id}}">Modelo: {{$viatura->modelo}}; &nbsp;&nbsp;&nbsp;Lugares: {{$viatura->qtd_passageiro}}</option>

                                    @endif

                                @endif

                                <small id="guerraHelp" class="form-text text-muted">Informe o nome do chefe de viatura que irar nesta missão.</small>

                            @endif

                        @endforeach

                    </select>

                </div>

            </fieldset>

        </div>

    </div>

    {{--    Itinerário--}}
    <div class="row mt-3">
        <div class="col-md-12">
            <fieldset class="border p-2">
                <legend class="audiowide">Informe o Itinerário</legend>
                <div class="form-group">

                    <label for="viatura_id" class="audiowide">Itinerário</label>

                    <input type="text" class="form-control caixa_alta" id="chefe_viatura" name="itinerario" aria-describedby="guerraHelp" placeholder="Informe o itinerario"

                           value="{{isset($registro->itinerario) ? $registro->itinerario : ''}}" required>


                </div>

            </fieldset>

        </div>

    </div>

    {{--    Motorista e o chefe de viatura--}}
    <div class="row mt-3">

        <div class="col-md-12">

            <fieldset class="border p-2">

                <legend class="audiowide">Chefe de viatura e Motorista</legend>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="local_saida" class="audiowide">Posto/graduação</label>

                            <select class="form-control input100" name="posto_chefe_de_viatura" id="posto_chefe_de_viatura" aria-describedby="posto_gradHelp">

                                <option value="">POSTO/GRADUAÇÃO</option>
                                <option value="Gen Ex" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Gen Ex") selected="selected" @endif @endif>Gen Ex</option>
                                <option value="Gen Div" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Gen Div") selected="selected" @endif @endif>Gen Div</option>
                                <option value="Gen Bda" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Gen Bda") selected="selected" @endif @endif>Gen Bda</option>
                                <option value="Cel" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Cel") selected="selected" @endif @endif>Cel</option>
                                <option value="Ten Cel" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Ten Cel") selected="selected" @endif @endif>Ten Cel</option>
                                <option value="Maj" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Maj") selected="selected" @endif @endif>Maj</option>
                                <option value="Cap" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Cap") selected="selected" @endif @endif>Cap</option>
                                <option value="1º Ten" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "1º Ten") selected="selected" @endif @endif>1º Ten</option>
                                <option value="2º Ten" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "2º Ten") selected="selected" @endif @endif>2º Ten</option>
                                <option value="Asp" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Asp") selected="selected" @endif @endif>Asp</option>
                                <option value="ST" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "ST") selected="selected" @endif @endif>ST</option>
                                <option value="1º Sgt" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "1º Sgt") selected="selected" @endif @endif>1º Sgt</option>
                                <option value="2º Sgt" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "2º Sgt") selected="selected" @endif @endif>2º Sgt</option>
                                <option value="3º Sgt" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "3º Sgt") selected="selected" @endif @endif>3º Sgt</option>
                                <option value="Cb" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Cb") selected="selected" @endif @endif>Cb</option>
                                <option value="Taif" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Taif") selected="selected" @endif @endif>Taif</option>
                                <option value="Sd" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "Sd") selected="selected" @endif @endif>Sd</option>
                                <option value="SC" @if (isset($registro->posto_chefe_de_viatura)) @if ($registro->posto_chefe_de_viatura == "SC") selected="selected" @endif @endif>SC</option>
                            </select>

                            <small id="guerraHelp" class="form-text text-muted">Escolha o posto/graduação.</small>

                        </div>

                    </div>

                    <div class="col-md-4">
                        {{--Chefe de viatura--}}

                        <div class="form-group">

                            <label for="local_saida" class="audiowide">Chefe de viatura</label>

                            <input type="text" class="form-control caixa_alta" id="chefe_viatura" name="chefe_viatura" aria-describedby="guerraHelp" placeholder="Informe o nome do chefe de viatura"

                                   value="{{isset($registro->chefe_viatura) ? $registro->chefe_viatura : ''}}">

                            <small id="guerraHelp" class="form-text text-muted">Informe o nome do chefe de viatura que irar nesta missão.</small>

                        </div>

                    </div>

                    <div class="col-md-4">
                        {{--contato--}}
                        <div class="form-group">
                            <label for="contato" class="audiowide">Contato do chefe de viatura</label>
                            <input type="text" class="form-control contato" id="contato" name="contato" aria-describedby="guerraHelp" placeholder="Entre com contato"
                                   value="{{isset($registro->contato) ? $registro->contato : ''}}">
                            <small id="guerraHelp" class="form-text text-muted">Informe o contato.</small>
                        </div>
                    </div>

                </div>

                <input type="text" name="data" value="{{date_format(now(),'Y-m-d')}}" hidden>

            </fieldset>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <fieldset class="border p-2">
                <legend class="audiowide">Selecione o Motorista</legend>
                <div class="form-group">
                    <label for="motorista_id" class="audiowide">Motoristas</label>

                    <select class="form-control" id="motorista_id" name="motorista_id" required>

                        <option value="">Escolha o motorista</option>

                        @foreach($motoristas as $motorista)

                            @if(isset($registro->motorista_id))

                                @if($motorista->id === $registro->motorista_id)

                                    <option selected="selected" value="{{$motorista->id}}">
                                        {{$motorista->usuarios->posto_graduacao}}&nbsp;&nbsp;&nbsp;
                                        {{$motorista->usuarios->nome_guerra}}&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;
                                        Carteiras:
                                        @if($motorista->categoria_a == 1)
                                            A
                                        @endif

                                        @if($motorista->categoria_b == 1)
                                            B
                                        @endif

                                        @if($motorista->categoria_c == 1)
                                            C
                                        @endif

                                        @if($motorista->categoria_d == 1)
                                            D
                                        @endif

                                        @if($motorista->categoria_e == 1)
                                            E
                                        @endif

                                    </option>

                                @else

                                    <option value="{{$motorista->id}}">
                                        {{$motorista->usuarios->posto_graduacao}}&nbsp;&nbsp;&nbsp;
                                        {{$motorista->usuarios->nome_guerra}}&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;
                                        Carteiras:
                                        @if($motorista->categoria_a == 1)
                                            A
                                        @endif

                                        @if($motorista->categoria_b == 1)
                                            B
                                        @endif

                                        @if($motorista->categoria_c == 1)
                                            C
                                        @endif

                                        @if($motorista->categoria_d == 1)
                                            D
                                        @endif

                                        @if($motorista->categoria_e == 1)
                                            E
                                        @endif

                                    </option>

                                @endif

                            @else

                                @if($motorista->id === isset($registro->motorista_id))

                                    <option selected="selected" value="{{$motorista->id}}">
                                        {{$motorista->usuarios->posto_graduacao}}&nbsp;&nbsp;&nbsp;
                                        {{$motorista->usuarios->nome_guerra}}&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;
                                        Carteiras:
                                        @if($motorista->categoria_a == 1)
                                            A
                                        @endif

                                        @if($motorista->categoria_b == 1)
                                            B
                                        @endif

                                        @if($motorista->categoria_c == 1)
                                            C
                                        @endif

                                        @if($motorista->categoria_d == 1)
                                            D
                                        @endif

                                        @if($motorista->categoria_e == 1)
                                            E
                                        @endif

                                    </option>

                                @else

                                    <option value="{{$motorista->id}}">
                                        {{$motorista->usuarios->posto_graduacao}}&nbsp;&nbsp;&nbsp;
                                        {{$motorista->usuarios->nome_guerra}}&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;
                                        Carteiras:
                                        @if($motorista->categoria_a == 1)
                                            A
                                        @endif

                                        @if($motorista->categoria_b == 1)
                                            B
                                        @endif

                                        @if($motorista->categoria_c == 1)
                                            C
                                        @endif

                                        @if($motorista->categoria_d == 1)
                                            D
                                        @endif

                                        @if($motorista->categoria_e == 1)
                                            E
                                        @endif

                                    </option>

                                @endif

                                <small id="guerraHelp" class="form-text text-muted">Informe o nome do chefe de viatura que irar nesta missão.</small>

                            @endif

                        @endforeach

                    </select>

                </div>

            </fieldset>

        </div>

    </div>

</div>