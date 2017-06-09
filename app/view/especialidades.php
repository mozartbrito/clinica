<h2>Clínica CEO :: Especialidades</h2>

<table class="table table-hover table-striped table-bordered">
  <tr>
  	<th>#ID</th>
  	<th>Especialidade</th>
  	<th>Descrição</th>
  	<th>Ação</th>
  </tr>

	<?php foreach ($especialidades as $especialidade) { ?>
	<tr>
			<td><?php echo $especialidade->getId(); ?></td>
			<td><?php echo $especialidade->getEspecialidade(); ?></td>
			<td><?php echo $especialidade->getDescricao(); ?></td>
			<td>
				<a href="<?php echo BASE_URL; ?>especialidades/form/id/<?php echo $especialidade->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
				<a href="<?php echo BASE_URL; ?>especialidades/remove/id/<?php echo $especialidade->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
	<?php } ?>

</table>