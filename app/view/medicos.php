<h1>Clínica CEO :: Médicos</h1>

<table class="table table-hover table-striped table-bordered">
  <tr>
  	<th>#ID</th>
  	<th>Nome</th>
  	<th>Turno</th>
  	<th>Especialidade</th>
  	<th>Ação</th>
  </tr>

	<?php foreach ($medicos as $medico) { ?>
		<tr>
			<td><?php echo $medico->getId(); ?></td>
			<td><?php echo $medico->getNome(); ?></td>
			<td><?php echo $medico->getTurno(); ?></td>
			<td><?php echo $medico->especialidade; ?></td>
			<td><a href="<?php echo BASE_URL; ?>medicos/form/id/<?php echo $medico->getId(); ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
		</tr>
	<?php } ?>

</table>