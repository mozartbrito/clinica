<h2>Clínica CEO :: Perfis</h2>

<a href="<?php echo BASE_URL; ?>perfil/form"><button class="btn btn-default pull-right">Novo</button></a>

<table class="table table-hover table-striped table-bordered">
	<thead>
	  <tr>
	  	<th>#ID</th>
	  	<th>Perfil</th>
	  	<th>Descrição</th>
	  	<th>Ações</th>
	  </tr>
	</thead>

	<tbody>
		<?php foreach ($perfis as $perfil) { ?>
			<tr>
				<td><?php echo $perfil->getId(); ?></td>
				<td><?php echo $perfil->getPerfil(); ?></td>
				<td><?php echo $perfil->getDescricao(); ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>perfil/form/id/<?php echo $perfil->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
					<a href="<?php echo BASE_URL; ?>perfil/remove/id/<?php echo $perfil->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>

</table>