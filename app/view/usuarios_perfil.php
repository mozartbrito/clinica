<h2>Clínica CEO</h2>

<br />

<div class="panel panel-default">
  
  <div class="panel-heading">
    <h3 align="center" class="text-primary"><strong>Editar Perfil</strong></h3>
  </div>

	<div class="panel-body">

		<form method="POST" action="<?php echo BASE_URL; ?>usuarios/salvar">
	    <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>" />
	    <input type="hidden" name="page" value="meuPerfil" />

		  <div class="row">
			  <div class="form-group col-md-6 col-sm-12 col-xs-12">
			    <label for="nome">Nome</label>
			    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário" value="<?php echo $usuario->getNome(); ?>" required>
			  </div>

			  <div class="form-group col-md-3 col-sm-6 col-xs-12">
			    <label for="ci">Identidade</label>
			    <input type="text" class="form-control" id="ci" name="ci" placeholder="Identidade do usuário" value="<?php echo $usuario->getCi(); ?>">
			  </div>

			  <div class="form-group col-md-3 col-sm-6 col-xs-12">
			    <label for="cpf">CPF</label>
			    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do usuário" value="<?php echo $usuario->getCpf(); ?>">
			  </div>
		  </div>

		  <div class="row">
			  <div class="form-group col-md-6 col-sm-12 col-xs-12">
			    <label for="endereco">Endereço</label>
			    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço do usuário" value="<?php echo $usuario->getEndereco(); ?>">
			  </div>

			  <div class="form-group col-md-3 col-sm-6 col-xs-12">
			    <label for="fone">Telefone</label>
			    <input type="text" class="form-control telefone" id="fone" name="fone" placeholder="Telefone do usuário" value="<?php echo $usuario->getFone(); ?>">
			  </div>

			  <div class="form-group col-md-3 col-sm-6 col-xs-12">
			    <label for="celular">Celular</label>
			    <input type="text" class="form-control telefone" id="celular" name="celular" placeholder="Celular do usuário" value="<?php echo $usuario->getCelular(); ?>">
			  </div>
			</div>

			<div class="row">
			  <div class="form-group col-md-4 col-sm-4 col-xs-12">
			    <label for="login">Login</label>
			    <input type="text" class="form-control" id="login" name="login" placeholder="Login do usuário" value="<?php echo $usuario->getLogin(); ?>">
			  </div>

			  <div class="form-group col-md-4 col-sm-4 col-xs-12">
			    <label for="senha">Senha</label>
			    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha do usuário" value="<?php echo $usuario->getSenha(); ?>">
			  </div>

			  <div class="form-group col-md-4 col-sm-4 col-xs-12">
			    <label for="perfil_id">Perfil</label>
			    <select class="form-control" id="perfil_id" name="perfil_id">
			    	<option value="">Perfil de Usuário</option>
			    	<?php foreach ($perfis as $perfil) { ?>
			    		<option value="<?php echo $perfil->getId(); ?>" <?php echo ( $usuario->getPerfil()->getId() == $perfil->getId() ) ? 'selected' : ''; ?>><?php echo $perfil->getPerfil(); ?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>

		  <button type="submit" class="btn btn-success">Salvar</button>
		</form>

	</div>
</div>