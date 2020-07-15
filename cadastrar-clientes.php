<?php require_once 'includes/head.php'?>
<?php require_once 'includes/header.php'?>

<?php 

   if (!empty($_POST)){
       require_once 'config/autoload.php';
       $cliente = new Cliente();
       $cliente->cadastraCliente($cliente);
   }
?>




<div class="container center"> 
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
               Nome <h11>*</h11>
            </label>
            <div class="col-md-9">
               <input id="Nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
            </div>
         </div>
         <!-- Prepended text-->

         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">
               Sobrenome<h11>*</h11>
            </label>
            <div class="col-md-9">
               <input id="Nome" name="sobrenome" placeholder="" class="form-control input-md" required="" type="text">
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
                  <input id="prependedtext" name="email" class="form-control" placeholder="email@email.com" required="" type="email">
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
               <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
            </div>
         </div>
         <!-- Prepended text-->
         <div class="form-group">
            <label class="col-md-2 control-label" for="prependedtext">Telefone</label>
            <div class="col-md-9">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="prependedtext" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                     OnKeyPress="formatar('## #####-####', this)">
               </div>
            </div>
            <!-- Button (Double) -->
            <div class="form-group"> 
               <div class="col-md-8">
                  <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button> 
               </div>
            </div>
         </div>
      </div>
   </fieldset>
</form>
</div>
<?php require_once 'includes/footer.php'?>
