<h2>Clínica CEO :: Médicos</h2>

<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered">
		<thead>
		  <tr>
		  	<th>#ID</th>
		  	<th>Nome</th>
		  	<th>Turno</th>
		  	<th>Especialidade</th>
		  	<th>Ação</th>
		  </tr>
		</thead>

		<tbody>
			<?php foreach ($medicos as $medico) { ?>
				<tr>
					<td><?php echo $medico->getId(); ?></td>
					<td><?php echo $medico->getNome(); ?></td>
					<td><?php echo $medico->getTurno(); ?></td>
					<td><?php echo $medico->getEspecialidade()->getEspecialidade(); ?></td>
					<td>
						<a href="<?php echo BASE_URL; ?>medicos/form/id/<?php echo $medico->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
						<a href="<?php echo BASE_URL; ?>medicos/remove/id/<?php echo $medico->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>

	</table>
</div>