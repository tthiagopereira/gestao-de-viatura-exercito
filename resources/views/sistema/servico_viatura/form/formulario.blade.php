<div class="container">

    {{--usuario_id--}}
    <input type="number" name="usuario_id" id="usuario_id" value="{{auth()->user()->id}}" hidden>
    <input type="text" name="atraso" id="atraso" value="sim" hidden>
    {{--Datas de saida e de retorno--}}
    <div class="row">

        <div class="col-md-6">
            {{--'data_saida'--}}
            <div class="form-group">
                <label for="data_saida" class="audiowide">Data do pedido da viatura</label>
                <input type="date" class="form-control data" name="data_saida" id="data_saida" aria-describedby="nameHelp" required
                       value="{{isset($registro->data_saida) ? $registro->data_saida : ''}}" placeholder="Informe a data">
                <small id="nameHelp" class="form-text text-muted">Informe a data.</small>
            </div>
        </div>

        <div class="col-md-6">
            {{--'data_entrada'--}}
            <div class="form-group">
                <label for="data_entrada" class="audiowide">Data de retorno da viatura</label>
                <input type="date" class="form-control data" name="data_entrada" id="data_entrada" aria-describedby="nameHelp" required
                       value="{{isset($registro->data_entrada) ? $registro->data_entrada : ''}}" placeholder="Informe a data de entrega da viatura">
                <small id="nameHelp" class="form-text text-muted">Informe a data.</small>
            </div>
        </div>
    </div>

    {{--Hora de saída; hora de entrada; local da partida--}}
    <div class="row">
        <div class="col-md-3">
            {{--'hora_saida'--}}
            <div class="form-group">
                <label for="hora_saida" class="audiowide">Hora da saída</label>
                <input type="time" class="form-control" name="hora_saida" id="hora_saida" aria-describedby="nameHelp" required
                       value="{{isset($registro->hora_saida) ? $registro->hora_saida : ''}}">
                <small id="nameHelp" class="form-text text-muted">Informe o horario de saída da viatura.</small>
            </div>
        </div>

        <div class="col-md-3">
            {{--'hora_entrada'--}}
            <div class="form-group">
                <label for="hora_entrada" class="audiowide">Hora do retorno</label>
                <input type="time" class="form-control" name="hora_entrada" id="hora_entrada" aria-describedby="nameHelp" required
                       value="{{isset($registro->hora_entrada) ? $registro->hora_entrada : ''}}">
                <small id="nameHelp" class="form-text text-muted">Informe a previsão do retorno da viatura.</small>
            </div>
        </div>

        <div class="col-md-6">
            {{--local_saida--}}
            <div class="form-group">
                <label for="local_saida" class="audiowide">Local de partida</label>
                <input type="text" class="form-control caixa_alta" id="local_saida" name="local_saida" aria-describedby="guerraHelp" placeholder="Informe o localde saída" required
                       value="{{isset($registro->local_saida) ? $registro->local_saida : ''}}">
                <small id="guerraHelp" class="form-text text-muted">Informe o local onde a viatura devera estar aguardando.</small>
            </div>
        </div>

    </div>

    {{--Destino; Missão--}}
    <div class="row">
        <div class="col-md-6">
            {{--destino--}}
            <div class="form-group">
                <label for="destino" class="audiowide">Destino</label>
                <input type="text" class="form-control caixa_alta" id="destino" name="destino" aria-describedby="guerraHelp" placeholder="Informe o destino" required
                       value="{{isset($registro->destino) ? $registro->destino : ''}}">
                <small id="guerraHelp" class="form-text text-muted">Informe o destino que a viatura irar tomar.</small>
            </div>
        </div>
        <div class="col-md-6">
            {{--Missão--}}
            <div class="form-group">
                <label for="missao" class="audiowide">Missão</label>
                <input type="text" class="form-control caixa_alta" id="missao" name="missao" aria-describedby="guerraHelp" placeholder="Informe a missão" required
                       value="{{isset($registro->missao) ? $registro->missao : ''}}">
                <small id="guerraHelp" class="form-text text-muted">Informe a missão que a viatura irar participar.</small>
            </div>
        </div>
    </div>

    {{--Viatura; Transporte; Quantidade de pessoas--}}
    <div class="row">
        <div class="col-md-3">
            {{--viatura--}}
            <div class="form-group">
                <label for="viatura" class="audiowide">Viatura</label>
                <select class="form-control" id="viatura" name="viatura" required>
                    <option value="">Informe o tipo</option>

                    <option value="Administrativa"
                            @if (isset($registro->viatura))
                            @if ($registro->viatura == "Administrativa")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Administrativa
                    </option>
                    <option value="Operacional"
                            @if (isset($registro->viatura))
                            @if ($registro->viatura == "Operacional")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Operacional
                    </option>
                </select>
                <small id="guerraHelp" class="form-text text-muted">Informe o tipo de viatura.</small>
            </div>
        </div>
        <div class="col-md-3">
            {{--transporte--}}
            <div class="form-group">
                <label for="transporte" class="audiowide">Transporte</label>
                <select class="form-control" id="transporte" name="transporte" required>
                    <option value="">Informe o que irar ser transportado</option>

                    <option value="Pessoal"
                            @if (isset($registro->transporte))
                            @if ($registro->transporte == "Pessoal")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Pessoal
                    </option>
                    <option value="Material"
                            @if (isset($registro->transporte))
                            @if ($registro->transporte == "Material")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Material
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            {{--quantidade_pessoa--}}
            <div class="form-group">
                <label for="quantidade_pessoa" class="audiowide">Quantidade de pessoas</label>
                <input type="number" class="form-control caixa_alta" min="1" pattern="[0-9]+$" id="quantidade_pessoa" name="quantidade_pessoa" aria-describedby="guerraHelp" placeholder="Quantidade de pessoas" required
                       value="{{isset($registro->quantidade_pessoa) ? $registro->quantidade_pessoa : ''}}">
                <small id="guerraHelp" class="form-text text-muted">Informe a quantidade de pessoas.</small>
            </div>
        </div>
        <div class="col-md-3">
            {{--chefe_viatura--}}
            <div class="form-group">
                <label for="viatura" class="audiowide">Chefe de viatura</label>
                <select class="form-control" id="chefe_viatura" name="chefe_viatura" required>
                    <option value="">Chefe de viatura</option>

                    <option value="sim"
                            @if (isset($registro->chefe_viatura))
                            @if ($registro->chefe_viatura == "sim")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Sim
                    </option>
                    <option value="nao"
                            @if (isset($registro->chefe_viatura))
                            @if ($registro->chefe_viatura == "nao")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Não
                    </option>
                </select>
            </div>
        </div>
    </div>

    {{--Status--}}
    @if(isset($registro->status))

        <input type="text" name="status" id="status" value="{{$registro->status}}" hidden>

    @else

        <input type="text" name="status" id="status" value="Analise" hidden>

    @endif

    {{--observacao--}}
    <div class="form-group">

        <label for="observacao" class="audiowide">
            Observação
            <span class="vermelho"> (Opcional)</span>
        </label>

        <br>

        <textarea name="observacao" id="observacao" cols="80" rows="5">

        @if(isset($registro->observacao))

                {{$registro->observacao}}

            @endif

    </textarea>

    </div>
    @if(Auth::user()->tipo == 'Administrador' || Auth::user()->tipo == 'Gerente')
        <div class="row">
            <div class="col-md-12">
                {{--destino--}}
                <div class="form-group">
                    <label for="negar" class="audiowide">
                        Negar Pedido
                        <span class="vermelho"> (Informe o usuário sobre a negação do pedido)</span>
                    </label>

                    <br>

                    <textarea name="negar" id="negar" cols="80" rows="5">

                    @if(isset($registro->negar))

                            {{$registro->negar}}

                        @endif

    </textarea>
                </div>
            </div>
        </div>
    @endif
</div>