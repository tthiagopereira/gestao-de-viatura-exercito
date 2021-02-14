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
<script>

    function mensagemFuncition() {

        var x = document.getElementById("snackbar");

        x.className = "show";

        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);

    }
</script>

<div class="container">
    {{--    Motorista e o chefe de viatura--}}
    <div class="row mt-3">

        <div class="col-md-12">

            <fieldset class="border p-2">

                <legend class="audiowide text-center">Chefe de viatura e Motorista</legend>

                <div class="row">

                    <div class="col-md-2"></div>

                    <div class="col-md-2">
                        {{--Chefe de viatura--}}

                        <div class="form-group">

                            <label for="ficha" class="audiowide">Ficha</label>

                            <input type="text" class="form-control caixa_alta" id="ficha" name="ficha" aria-describedby="guerraHelp"

                                   value="{{isset($registro->ficha) ? $registro->ficha : ''}}">

                            <small id="guerraHelp" class="form-text text-muted">Informe a ficha.</small>

                        </div>

                    </div>

                    <div class="col-md-3">
                        {{--Chefe de viatura--}}

                        <div class="form-group">

                            <label for="local_saida" class="audiowide">Chefe de viatura</label>

                            <input type="text" class="form-control caixa_alta" id="chefe_viatura" name="chefe_viatura" aria-describedby="guerraHelp" placeholder="Informe o nome do chefe de viatura"

                                   value="{{isset($registro->chefe_viatura) ? $registro->chefe_viatura : ''}}">

                            <small id="guerraHelp" class="form-text text-muted">Chefe de viatura que irar nesta missão.</small>

                        </div>

                    </div>

                    <div class="col-md-3">
                        {{--contato--}}
                        <div class="form-group">
                            <label for="contato" class="audiowide">Contato do chefe de viatura</label>
                            <input type="text" class="form-control contato" id="contato" name="contato" aria-describedby="guerraHelp" placeholder="Entre com contato"
                                   value="{{isset($registro->contato) ? $registro->contato : ''}}">
                            <small id="guerraHelp" class="form-text text-muted">Informe o contato.</small>
                        </div>
                    </div>

                    <div class="col-md-2"></div>

                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label for="viatura" class="audiowide">Viatura</label>
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

                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-2">

                    <div class="col-md-2"></div>

                    <div class="col-md-4">
                        {{--Motorista--}}
                        <div class="form-group">
                            <label for="local_saida" class="audiowide">Motorista</label>
                            <input type="text" class="form-control caixa_alta" id="motorista" name="motorista" aria-describedby="guerraHelp" placeholder="Informe o motorista"
                                   value="{{isset($registro->motorista) ? $registro->motorista : ''}}" required>
                            <small id="guerraHelp" class="form-text text-muted">Informe o motorista desta missão.</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        {{--contato--}}

                        <div class="form-group">
                            <label for="contato" class="audiowide">Contato</label>
                            <input type="text" class="form-control" id="contato2" name="contato2" aria-describedby="guerraHelp" placeholder="Entre com contato"
                                   value="{{isset($registro->contato_motorista) ? $registro->contato_motorista : ''}}" required>
                            <small id="guerraHelp" class="form-text text-muted">Informe o contato.</small>
                        </div>

                    </div>

                    <div class="col-md-2"></div>

                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="tipo" class="audiowide">Fixar no mapa</label>
                            <select class="form-control" id="fixo" name="fixo" required>
                                <option value="">Escolha</option>

                                <option value="1"
                                        @if (isset($registro->fixo))
                                        @if ($registro->fixo == 1)
                                        selected="selected"
                                        @endif
                                        @endif
                                >
                                    Sim
                                </option>
                                <option value="0"
                                        @if (isset($registro->fixo))
                                        @if ($registro->fixo == 0)
                                        selected="selected"
                                        @endif
                                        @endif
                                >
                                    Não
                                </option>

                            </select>
                            <small id="guerraHelp" class="form-text text-muted">Informe se e fixa no mapa ou não</small>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>


                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_inicial" class="audiowide">Data do pedido da viatura</label>
                            <input type="date" class="form-control data" name="data_inicial" id="data_inicial" aria-describedby="nameHelp" required
                                   value="{{isset($registro->data_inicial) ? $registro->data_inicial : ''}}" placeholder="Informe a data">
                            <small id="nameHelp" class="form-text text-muted">Informe a data.</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_final" class="audiowide">Data de retorno da viatura</label>
                            <input type="date" class="form-control data" name="data_final" id="data_final" aria-describedby="nameHelp" required
                                   value="{{isset($registro->data_final) ? $registro->data_final : ''}}" placeholder="Informe a data de entrega da viatura">
                            <small id="nameHelp" class="form-text text-muted">Informe a data.</small>
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                </div>

                <input type="text" name="data" value="{{date_format(now(),'Y-m-d')}}" hidden>

            </fieldset>
        </div>
    </div>

</div>
