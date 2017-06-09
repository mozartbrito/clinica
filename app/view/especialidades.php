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
			<td><a href="<?php echo BASE_URL; ?>especialidades/visualizar/<?php echo $especialidade->getId(); ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
		</tr>
	<?php } ?>

</table>