<h2>Clínica CEO :: Clientes</h2>

<table class="table table-hover table-striped table-bordered">
	<thead>
	  <tr>
	  	<th>#ID</th>
	  	<th>Nome</th>
	  	<th>Nascimento</th>
	  	<th>Fone(s)</th>
	  	<th>E-mail</th>
	  	<th>Ações</th>
	  </tr>
	</thead>

	<tbody>
		<?php foreach ($clientes as $cliente) { ?>
			<tr>
				<td><?php echo $cliente->getId(); ?></td>
				<td><?php echo $cliente->getNome(); ?></td>
				<td><?php echo $cliente->dataFormatada(); ?></td>
				<td><?php echo $cliente->getFone().' / '.$cliente->getCelular(); ?></td>
				<td><?php echo $cliente->getEmail(); ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>clientes/form/id/<?php echo $cliente->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
					<a href="<?php echo BASE_URL; ?>clientes/remove/id/<?php echo $cliente->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
	
</table>