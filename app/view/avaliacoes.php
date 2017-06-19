<h2>Clínica CEO :: Avaliações</h2>

<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered">
		<thead>
		  <tr>
		  	<th>Data</th>
		  	<!-- <th>Descrição</th> -->
		  	<th>Médico</th>
		  	<th>Cliente</th>
		  	<th>Situação</th>
		  	<th>Ações</th>
		  </tr>
		  </thead>
		<tbody>
			<?php if( count( $avaliacoes ) < 1 ) echo "<p class='alert alert-info text-center'>Nenhum resultado encontrado!</p>"; ?>
			<?php foreach ($avaliacoes as $avaliacao) { ?>
				<tr class="<?php echo $avaliacao->verificaClasseCor(); ?>">
					<td><?php echo $avaliacao->dataFormatada(); ?></td>
					<!-- <td><?php //echo $avaliacao->getDescricao(); ?></td> -->
					<td><?php echo $avaliacao->getMedico()->getNome(); ?></td>
					<td><?php echo $avaliacao->getCliente()->getNome(); ?></td>
					<td style="text-transform: uppercase;"><?php echo $avaliacao->getStatus(); ?></td>
					<td>
						<a href="<?php echo BASE_URL; ?>avaliacoes/form/id/<?php echo $avaliacao->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
						<a href="<?php echo BASE_URL; ?>avaliacoes/remove/id/<?php echo $avaliacao->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>