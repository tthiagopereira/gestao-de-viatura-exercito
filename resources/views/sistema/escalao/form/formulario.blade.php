<div class="container">

    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label for="nome" class="audiowide">Escalão</label>
                <input type="text" class="form-control caixa_alta" name="nome" id="nome" aria-describedby="nameHelp"  placeholder="Entre com o escalão" required
                       value="{{isset($registro->nome) ? $registro->nome : ''}}" autofocus minlength="5" maxlength="60">
                <small id="nameHelp" class="form-text text-muted">Informe escalão.</small>
            </div>
        </div>

    </div>

</div>