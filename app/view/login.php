<form method="POST" action="<?php echo BASE_URL; ?>login/logar">
	<div class="row">
		<div class="form-group col-md-3 col-sm-6 col-xs-12">
	    <label for="login">Login</label>
	    <input type="text" class="form-control" id="login" name="login" placeholder="Informe o usuário" />
	  </div>

	  <div class="form-group col-md-3 col-sm-6 col-xs-12">
			<label for="senha">Senha</label>
	    <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha" />
	  </div>
	</div>

	<button type="submit" class="btn btn-success">Logar</button>
</form>	