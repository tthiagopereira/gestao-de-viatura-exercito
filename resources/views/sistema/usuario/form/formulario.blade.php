<div class="container">

    <div class="row">

        <div class="col-md-6">
            {{--'name'--}}
            <div class="form-group">
                <label for="name" class="audiowide">Nome Completo</label>
                <input type="text" class="form-control caixa_alta" name="name" id="name" aria-describedby="nameHelp"  placeholder="Entre com o nome" required
                       value="{{isset($registro->name) ? $registro->name : ''}}" autofocus minlength="5" maxlength="60">
                <small id="nameHelp" class="form-text text-muted">Informe seu nome completo.</small>
            </div>
        </div>

        <div class="col-md-6">
            {{--nome_guerra--}}
            <div class="form-group">
                <label for="nome_guerra" class="audiowide">Nome de guerra</label>
                <input type="text" class="form-control caixa_alta" id="nome_guerra" name="nome_guerra" aria-describedby="guerraHelp" placeholder="Entre com seu nome de guerra" required
                       value="{{isset($registro->nome_guerra) ? $registro->nome_guerra : ''}}" >
                <small id="guerraHelp" class="form-text text-muted">Informe seu nome de guerra.</small>
            </div>
        </div>

    </div>

    <div class="row">
        @if(Auth::user()->tipo != 'Usuario')
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipo" class="audiowide">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        <option value="">Informe o tipo de usuario</option>

                        <option value="Administrador"
                                @if (isset($registro->tipo))
                                @if ($registro->tipo == "Administrador")
                                selected="selected"
                                @endif
                                @endif
                        >
                            Administrador
                        </option>

                        <option value="Gerente"
                                @if (isset($registro->tipo))
                                @if ($registro->tipo == "Gerente")
                                selected="selected"
                                @endif
                                @endif
                        >
                            Gerente
                        </option>
                        <option value="Usuario"
                                @if (isset($registro->tipo))
                                @if ($registro->tipo == "Usuario")
                                selected="selected"
                                @endif
                                @endif
                        >
                            Usuário
                        </option>

                    </select>
                    <small id="guerraHelp" class="form-text text-muted">Informe o tipo de usuário para o sistema.</small>
                </div>
            </div>
        @endif
        <div class="col-md-4">
            {{--Posto e Graduação--}}

            <div class="form-group">
                <label for="posto_graduacao" class="audiowide">Posto e Graduação</label>
                <div class="wrap-input100 validate-input">
                    <select class="form-control input100" name="posto_graduacao" id="posto_graduacao" aria-describedby="posto_gradHelp" required>
                        <option value="">POSTO/GRADUAÇÃO</option>
                        <option value="Gen Ex" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Gen Ex") selected="selected" @endif @endif>Gen Ex</option>
                        <option value="Gen Div" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Gen Div") selected="selected" @endif @endif>Gen Div</option>
                        <option value="Gen Bda" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Gen Bda") selected="selected" @endif @endif>Gen Bda</option>
                        <option value="Cel" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Cel") selected="selected" @endif @endif>Cel</option>
                        <option value="Ten Cel" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Ten Cel") selected="selected" @endif @endif>Ten Cel</option>
                        <option value="Maj" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Maj") selected="selected" @endif @endif>Maj</option>
                        <option value="Cap" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Cap") selected="selected" @endif @endif>Cap</option>
                        <option value="1º Ten" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "1º Ten") selected="selected" @endif @endif>1º Ten</option>
                        <option value="2º Ten" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "2º Ten") selected="selected" @endif @endif>2º Ten</option>
                        <option value="Asp" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Asp") selected="selected" @endif @endif>Asp</option>
                        <option value="ST" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "ST") selected="selected" @endif @endif>ST</option>
                        <option value="1º Sgt" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "1º Sgt") selected="selected" @endif @endif>1º Sgt</option>
                        <option value="2º Sgt" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "2º Sgt") selected="selected" @endif @endif>2º Sgt</option>
                        <option value="3º Sgt" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "3º Sgt") selected="selected" @endif @endif>3º Sgt</option>
                        <option value="Cb" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Cb") selected="selected" @endif @endif>Cb</option>
                        <option value="Taif" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Taif") selected="selected" @endif @endif>Taif</option>
                        <option value="Sd" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "Sd") selected="selected" @endif @endif>Sd</option>
                        <option value="SC" @if (isset($registro->posto_graduacao)) @if ($registro->posto_graduacao == "SC") selected="selected" @endif @endif>SC</option>
                    </select>
                </div>
                </select>
                <small id="guerraHelp" class="form-text text-muted">Informe o posto e graduação do militar.</small>
            </div>

        </div>
        <div class="col-md-4">
            {{--Escalão--}}
            <div class="form-group">
                <label for="escalao" class="audiowide">Escalão</label>
                <select class="form-control input100" name="escalao" id="escalao" aria-describedby="posto_gradHelp" required>
                    <option value="">Escalão</option>
                    @if($escalao)

                        @foreach($escalao as $escaloes)

                            @if(isset($registro->escalao))

                                @if($registro->escalao == $escaloes->nome)

                                    <option selected="selected" value="{{$escaloes->nome}}">{{$escaloes->nome}}</option>

                                @else

                                    <option value="{{$escaloes->nome}}">{{$escaloes->nome}}</option>

                                @endif

                            @endif

                        @endforeach

                        @if(!isset($registro->escalao))
                            @foreach($escalao as $escaloes)

                                <option value="{{$escaloes->nome}}">{{$escaloes->nome}}</option>

                            @endforeach

                        @endif

                    @endif

                </select>
                <small id="guerraHelp" class="form-text text-muted">Informe o escalão de usuário para o sistema.</small>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label for="contato" class="audiowide">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato" aria-describedby="guerraHelp" placeholder="Entre com contato"
                       value="{{isset($registro->contato) ? $registro->contato : ''}}" required>
                <small id="guerraHelp" class="form-text text-muted">Informe o contato.</small>
            </div>
        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label for="identidade_militar" class="audiowide">Identidade Militar</label>
                <input type="text" class="form-control" id="identidade_militar" name="identidade_militar" aria-describedby="guerraHelp" placeholder="Entre com a identidade militar" value="{{isset($registro->identidade_militar) ? $registro->identidade_militar : ''}}" required>
                <small id="guerraHelp" class="form-text text-muted">Informe a identidade militar.</small>
            </div>
        </div>
        <div class="col-md-5">
            {{--Password--}}
            <div class="form-group">
                <label for="password" class="audiowide">Senha</label>
                <input aria-describedby="passwordHelp" type="password" class="form-control" id="password" name="password" placeholder="Informe sua senha">
                <small id="passwordHelp" class="form-text text-muted">Informe sua senha</small>
            </div>
        </div>
    </div>
</div>