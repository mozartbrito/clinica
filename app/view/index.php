<h2>Clínica CEO :: Agenda do dia</h2>

<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered">
		<thead>
		  <tr>
		  	<th>Data/Hora</th>
		  	<!-- <th>Descrição</th> -->
		  	<th>Médico</th>
		  	<th>Cliente</th>
		  	<th>Situação</th>
		  	<th>Ações</th>
		  </tr>
		  </thead>
		<tbody>
			<?php foreach ($agendas as $agenda) { ?>
				<tr>
					<td><?php echo $agenda->dataFormatada(); ?></td>
					<!-- <td><?php echo $agenda->getDescricao(); ?></td> -->
					<td><?php echo $agenda->getMedico()->getNome(); ?></td>
					<td><?php echo $agenda->getCliente()->getNome(); ?></td>
					<td><?php echo $agenda->getStatus(); ?></td>
					<td>
						<a href="<?php echo BASE_URL; ?>agenda/form/id/<?php echo $agenda->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
