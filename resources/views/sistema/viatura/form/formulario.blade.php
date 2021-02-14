{{--//'placa','qtd_passageiro','modelo','viatura','eb','tipo','status'--}}

<div class="container">

    {{--Placa e Quantidade de pessoas--}}
    <div class="row">

        {{--Placa--}}
        <div class="col-md-3">

            {{--'placa'--}}

            <div class="form-group">

                <label for="placa" class="audiowide">Placa</label>

                <input type="text" class="form-control caixa_alta" name="placa" id="placa" aria-describedby="nameHelp" placeholder="Entre com a placa da viatura"

                       value="{{isset($registro->placa) ? $registro->placa : ''}}" autofocus minlength="1" maxlength="7">

                <small id="nameHelp" class="form-text text-muted">Informe a placa da viatura que será cadastrada no sistema.</small>

            </div>

        </div>

        {{--Quantidade de pessoas--}}

        <div class="col-md-3">

            {{--qtd_passageiro--}}

            <div class="form-group">

                <label for="qtd_passageiro" class="audiowide">Qtd/Pessoas na viatura</label>

                <input type="number" class="form-control caixa_alta" id="qtd_passageiro" name="qtd_passageiro" aria-describedby="guerraHelp" placeholder="Entre com a quantidade de pessoas" required

                       value="{{isset($registro->qtd_passageiro) ? $registro->qtd_passageiro : ''}}">

                <small id="guerraHelp" class="form-text text-muted">Informe a quantidade e pessoas que cabem dentro desta viatura.</small>

            </div>

        </div>

        {{--Moledo--}}

        <div class="col-md-3">

            {{--'placa'--}}

            <div class="form-group">

                <label for="modelo" class="audiowide">Modelo</label>

                <input type="text" class="form-control caixa_alta" name="modelo" id="modelo" aria-describedby="nameHelp" placeholder="Entre com o modelo" required

                       value="{{isset($registro->modelo) ? $registro->modelo : ''}}" autofocus minlength="1" maxlength="60">

                <small id="nameHelp" class="form-text text-muted">Informe o modelo da viatura que estar sendo cadastrada.</small>

            </div>

        </div>

        {{--Viatura--}}
        <div class="col-md-3">
            {{--viatura--}}
            <div class="form-group">
                <label for="viatura" class="audiowide">Viatura</label>
                <select class="form-control" id="viatura" name="viatura" required>
                    <option value="">Informe a viatura</option>

                    <option value="Operacional"
                            @if (isset($registro->viatura))
                            @if ($registro->viatura == "Operacional")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Operacional
                    </option>
                    <option value="Administrativo"
                            @if (isset($registro->viatura))
                            @if ($registro->viatura == "Administrativo")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Administrativo
                    </option>
                </select>
                <small id="guerraHelp" class="form-text text-muted">Informe a viatura e sua utilização.</small>
            </div>
        </div>



    </div>

    {{--viatura; eb; tipo; status--}}
    <div class="row">

        {{--eb--}}
        <div class="col-md-3">
            {{--'placa'--}}
            <div class="form-group">
                <label for="eb" class="audiowide">EB</label>
                <input type="text" class="form-control caixa_alta" name="eb" id="eb" aria-describedby="nameHelp" placeholder="Entre com o modelo"
                       value="{{isset($registro->eb) ? $registro->eb : ''}}" autofocus minlength="1" maxlength="60">
                <small id="nameHelp" class="form-text text-muted">Informe o EB da viatura Operacional caso tenha.</small>
            </div>
        </div>

        {{--tipo--}}
        <div class="col-md-3">
            {{--status--}}
            <div class="form-group">
                <label for="tipo" class="audiowide">Tipo de veiculo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Informe o tipo da viatura</option>

                    <option value="Moto"
                            @if (isset($registro->tipo))
                            @if ($registro->tipo == "Moto")
                            selected="selected"
                            @endif
                            @endif
                    >
                        <span ><i class="fa fa-anchor"></i>Moto</span>
                    </option>

                    <option value="Carro"
                            @if (isset($registro->tipo))
                            @if ($registro->tipo == "Carro")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Carro
                    </option>

                    <option value="Van"
                            @if (isset($registro->tipo))
                            @if ($registro->tipo == "Van")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Van
                    </option>

                    <option value="Onibus"
                            @if (isset($registro->tipo))
                            @if ($registro->tipo == "Onibus")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Ônibus
                    </option>

                    <option value="Caminhao"
                            @if (isset($registro->tipo))
                            @if ($registro->tipo == "Caminhao")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Caminhão
                    </option>

                    <option value="Outros"
                            @if (isset($registro->tipo))
                            @if ($registro->tipo == "Outros")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Outros
                    </option>

                </select>
                <small id="guerraHelp" class="form-text text-muted">Informe a siatuação da viatura.</small>
            </div>
        </div>

        {{--status--}}
        <div class="col-md-3">
            {{--status--}}
            <div class="form-group">
                <label for="status" class="audiowide">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Informe o status da viatura</option>

                    <option value="Ativa"
                            @if (isset($registro->status))
                            @if ($registro->status == "Ativa")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Ativa
                    </option>

                    <option value="Baixada"
                            @if (isset($registro->status))
                            @if ($registro->status == "Baixada")
                            selected="selected"
                            @endif
                            @endif
                    >
                        Baixada
                    </option>
                </select>
                <small id="guerraHelp" class="form-text text-muted">Informe a siatuação da viatura.</small>
            </div>
        </div>

        {{--documento--}}
        <div class="col-md-3">

            {{--documento--}}

            <div class="form-group">

                <label for="tipo" class="audiowide">Documento</label>

                <select class="form-control" id="documento" name="documento" required>

                    <option value="">Situação do documento</option>



                    <option value="sem pendencia"

                            @if (isset($registro->documento))

                            @if ($registro->documento == "sem pendencia")

                            selected="selected"

                            @endif

                            @endif

                    >

                        Sem pendência

                    </option>

                    <option value="pendente"

                            @if (isset($registro->documento))

                            @if ($registro->documento == "pendente")

                            selected="selected"

                            @endif

                            @endif

                    >

                        Com pendência

                    </option>




                </select>

                <small id="guerraHelp" class="form-text text-muted">Informe a siatuação da documentação da viatura.</small>

            </div>

        </div>

    </div>

</div>