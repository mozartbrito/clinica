<h2>Clínica CEO :: Agenda</h2>
<?php echo date('d/m/Y'); ?>
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
			<?php if( count( $agendas) < 1 ) echo "<p class='alert alert-info text-center'>Não há consultas marcadas para hoje até o momento!</p>"; ?>
			<?php foreach ($agendas as $agenda) { ?>
				<tr class="<?php echo $agenda->verificaClasseCor(); ?>">
					<td><?php echo $agenda->dataFormatada(); ?></td>
					<!-- <td><?php //echo $agenda->getDescricao(); ?></td> -->
					<td><?php echo $agenda->getMedico()->getNome(); ?></td>
					<td><?php echo $agenda->getCliente()->getNome(); ?></td>
					<td style="text-transform: uppercase;"><?php echo $agenda->getStatus(); ?></td>
					<td>
						<a href="<?php echo BASE_URL; ?>agenda/form/id/<?php echo $agenda->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
						<?php if ( $agenda->getStatus() == 'Agendado' ) { ?>
								<a href="<?php echo BASE_URL; ?>agenda/altera/id/<?php echo $agenda->getId(); ?>/status/em_espera" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></a>
						<?php	} ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
