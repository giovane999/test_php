<?php require_once 'includes/head.php'?>
<?php require_once 'includes/header.php'?>

<?php
    $cliente = new Cliente();
    $cliente->id = addslashes($_GET['id']); // Pega Id
    $res = $cliente->formEditarCliente($cliente);

    if (!empty($_POST)){
        $cliente->editarCliente($cliente);
    }
?>




<div class="container center">
    <?php foreach ($res as $cliente) : // Iniciando um Foreach ?>
    <form method="POST" class="form-horizontal col-md-6">
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">Cadastro de Cliente</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-11 control-label">
                            <p class="help-block">
                                <h11>*</h11>
                                Campo Obrigatório
                            </p>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Nome">
                            Nome
                            <h11>*</h11>
                        </label>
                        <div class="col-md-9">
                            <input id="Nome" name="nome" placeholder="" class="form-control input-md" required="" value="<?= htmlspecialchars($cliente['nome']); ?>" type="text">
                        </div>
                    </div>
                    <!-- Prepended text-->


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Nome">
                            Sobrenome<h11>*</h11>
                        </label>
                        <div class="col-md-9">
                            <input id="Nome" name="sobrenome" placeholder="" class="form-control input-md" required="" value="<?= htmlspecialchars($cliente['sobrenome']); ?>"  type="text">
                        </div>
                    </div>
                    <!-- Prepended text-->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Email
                            <h11>*</h11>
                        </label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="prependedtext" name="email" class="form-control" placeholder="email@email.com" value="<?= htmlspecialchars($cliente['email']); ?>" required="" type="email">
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Nome">
                            CPF
                            <h11>*</h11>
                        </label>
                        <div class="col-md-9">
                            <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" value="<?= htmlspecialchars($cliente['cpf']); ?>" required="" type="text" maxlength="11" pattern="[0-9]+$">
                        </div>
                    </div>
                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">Telefone</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input id="prependedtext" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13" value="<?= htmlspecialchars($cliente['telefone']); ?>" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                                       OnKeyPress="formatar('## #####-####', this)">
                            </div>
                        </div>
                        <!-- Button (Double) -->
                        <div class="form-group">
                            <div class="col-md-8">
                                <button id="Cadastrar" name="Editar" class="btn btn-success" type="Submit">Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
    </form>
    <?php endforeach; //  Fim Foreach ?>
</div>
<?php require_once 'includes/footer.php'?>
