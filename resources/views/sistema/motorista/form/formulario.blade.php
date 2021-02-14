<div class="container">

    <div class="row">

        <input type="text" id="user_id" name="user_id" value="{{$id}}" hidden="hidden">

        <div class="col-md-6">
            {{--'name'--}}
            <div class="form-group">
                <label for="name" class="audiowide">Nome Completo</label>
                <input type="text" class="form-control" aria-describedby="nameHelp" value="{{$nome}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            {{--nome_guerra--}}
            <div class="form-group">
                <label for="nome_guerra" class="audiowide">Nome de guerra</label>
                <input type="text" class="form-control" value="{{$nome_guerra}}" disabled>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label for="habilitacao" class="audiowide">1º Habilitação</label>
                <input type="date" class="form-control data" name="habilitacao" id="habilitacao" aria-describedby="nameHelp" required
                       value="{{isset($registro->habilitacao) ? $registro->habilitacao : ''}}" placeholder="Informe a data">
                <small id="nameHelp" class="form-text text-muted">Informe a data.</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="habilitacao_vencimento" class="audiowide">Vencimento da Habilitação</label>
                <input type="date" class="form-control data" name="habilitacao_vencimento" id="habilitacao_vencimento" aria-describedby="nameHelp" required
                       value="{{isset($registro->habilitacao_vencimento) ? $registro->habilitacao_vencimento : ''}}" placeholder="Informe a data de entrega da viatura">
                <small id="nameHelp" class="form-text text-muted">Informe a data.</small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="carteira_motorista" class="audiowide">Número da carteira de habilitação</label>
                <input type="text" class="form-control data" name="carteira_motorista" id="carteira_motorista" aria-describedby="nameHelp" required
                       value="{{isset($registro->carteira_motorista) ? $registro->carteira_motorista : ''}}" placeholder="Informe o numero da carteira de motorista"
                       onkeypress="return event.charCode >= 48 && event.charCode <=57">
                <small id="nameHelp" class="form-text text-muted">Informe o número da carteira de motorista.</small>
            </div>
        </div>

    </div>

    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="bi" class="audiowide">BI da publicação do motorista</label>
                <input type="text" class="form-control data" name="bi" id="bi" aria-describedby="nameHelp" required
                       value="{{isset($registro->bi) ? $registro->bi : ''}}" placeholder="Informe o bi publicado">
                <small id="nameHelp" class="form-text text-muted">Informe o bi publicado autorizando o militar a dirigir viatura.</small>
            </div>
        </div>
        
        <div class="col-md-8 ">
            <div class="alert alert-meu">
                <div class="row text-center">
                    <div class="col-md-2 text-left mt-3" >
                        <b>Categorias:</b>
                    </div>
                    <div class="col-md-2">
                        <div class="form-ckeck alert alert-dark">
                            <input type="checkbox" name="categoria_a" class="class form-check-input" value="{{isset($registro->categoria_a) ? $registro->categoria_a : 0}}"
                                   @if(isset($registro->categoria_a) && $registro->categoria_a == 1)
                                   checked
                                   @endif id="categoria_a">
                            <label for="categoria_a" class="class form-check-label audiowide">A</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-check alert alert-dark">
                            <input type="checkbox" name="categoria_b" class="class form-check-input" value="{{isset($registro->categoria_b) ? $registro->categoria_b: 0}}"
                                   @if(isset($registro->categoria_b) && $registro->categoria_b == 1)
                                   checked
                                   @endif id="categoria_b">
                            <label for="categoria_b" class="class form-check-label audiowide">B</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-chec alert alert-dark">
                            <input type="checkbox" name="categoria_c" class="class form-check-input" value="{{isset($registro->categoria_c) ? $registro->categoria_c: 0}}"
                                   @if(isset($registro->categoria_c) && $registro->categoria_c == 1)
                                   checked
                                   @endif id="categoria_c">
                            <label for="categoria_c" class="class form-check-label audiowide">C</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-check alert alert-dark">
                            <input type="checkbox" name="categoria_d" class="class form-check-input" value="{{isset($registro->categoria_d) ? $registro->categoria_d: 0}}"
                                   @if(isset($registro->categoria_d) && $registro->categoria_d == 1)
                                   checked
                                   @endif id="categoria_d">
                            <label for="categoria_d" class="class form-check-label audiowide">D</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-check alert alert-dark">
                            <input type="checkbox" name="categoria_e" class="class form-check-input" value="{{isset($registro->categoria_e) ? $registro->categoria_e: 0}}"
                                   @if(isset($registro->categoria_e) && $registro->categoria_e == 1)
                                   checked
                                   @endif id="categoria_e">
                            <label for="categoria_e" class="class form-check-label audiowide">E</label>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <di class="row">
        <div class="col-md-12">
            <div class="form-group">

                <label for="observacao" class="audiowide">
                    Observação
                    <span class="text-danger"> (Opcional)</span>
                </label>

                <br>

                <textarea name="observacao" id="observacao" cols="80" rows="5">

        @if(isset($registro->observacao))

                        {{$registro->observacao}}

                    @endif

    </textarea>

            </div>
        </div>
    </di>

</div>

@section('myscript')
    <script>
        $(document).ready(function () {

            $('#categoria_a').change(function () {
                var check = $("#categoria_a").is(':checked');
                if(check === true){
                    var troca = 1;
                    $(this).val(troca);
                }else{
                    var troca = 0;
                    $(this).val(troca);
                }
            });

            $('#categoria_b').change(function () {
                var check = $("#categoria_b").is(':checked');
                if(check === true){
                    var troca = 1;
                    $(this).val(troca);
                }else{
                    var troca = 0;
                    $(this).val(troca);
                }
            });

            $('#categoria_c').change(function () {
                var check = $("#categoria_c").is(':checked');
                if(check === true){
                    var troca = 1;
                    $(this).val(troca);
                }else{
                    var troca = 0;
                    $(this).val(troca);
                }
            });

            $('#categoria_d').change(function () {
                var check = $("#categoria_d").is(':checked');
                if(check === true){
                    var troca = 1;
                    $(this).val(troca);
                }else{
                    var troca = 0;
                    $(this).val(troca);
                }
            });

            $('#categoria_e').change(function () {
                var check = $("#categoria_e").is(':checked');
                if(check === true){
                    var troca = 1;
                    $(this).val(troca);
                }else{
                    var troca = 0;
                    $(this).val(troca);
                }
            });
        })
    </script>
@endsection