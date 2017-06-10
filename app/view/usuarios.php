<h2>Clínica CEO :: Usuários</h2>

<a href="<?php echo BASE_URL; ?>usuarios/form"><button class="btn btn-default">Novo</button></a>

<br />
<br />

<table class="table table-hover table-striped table-bordered">
  <tr>
  	<th>#ID</th>
  	<th>Nome</th>
  	<th>Login</th>
  	<th>Fone(s)</th>
  	<th>Perfil</th>
  	<th>Ações</th>
  </tr>

	<?php foreach ($usuarios as $usuario) { ?>
		<tr>
			<td><?php echo $usuario->getId(); ?></td>
			<td><?php echo $usuario->getNome(); ?></td>
			<td><?php echo $usuario->getLogin(); ?></td>
			<td><?php echo $usuario->getFone().' / '.$usuario->getCelular(); ?></td>
			<td><?php echo $usuario->perfil; ?></td>
			<td>
				<a href="<?php echo BASE_URL; ?>usuarios/form/id/<?php echo $usuario->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
				<a href="<?php echo BASE_URL; ?>usuarios/remove/id/<?php echo $usuario->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
	<?php } ?>

</table>