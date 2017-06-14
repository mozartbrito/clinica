<h2>Clínica CEO :: Agenda</h2>

<div class="row">
	<div class="form-group col-md-12 col-sm-12 col-xs-12">
		<label>Filtros:</label>
		<form action="<?php echo BASE_URL; ?>agenda" method="POST">
			<div class="form-group col-md-4 col-sm-4 col-xs-12">
		    <input type="text" class="form-control datetimepicker" id="inicio" name="inicio" placeholder="Data Inicial" value="<?php if( isset( $inicio ) ) echo $inicio; ?>">
		  </div>

		  <div class="form-group col-md-4 col-sm-4 col-xs-12">
		    <input type="text" class="form-control datetimepicker" id="fim" name="fim" placeholder="Data Final" value="<?php if( isset( $fim ) ) echo $fim; ?>">
		  </div>

		  <div class="form-group col-md-4 col-sm-4 col-xs-12">
	      <select type="text" class="form-control" id="status" name="status">
	        <option value="">Por Situação</option>
	        <?php foreach ($situacoes as $situacao) { ?>
	          <option value="<?php echo $situacao; ?>" <?php echo ( isset( $status ) && $status == $situacao ) ? 'selected' : ''; ?>><?php echo $situacao; ?></option>
	        <?php } ?>
	      </select>
	    </div>
  		<!-- <div class="form-group col-sm-12 col-xs-12"> -->
	  		<button type="submit" class="btn btn-success pull-left">Filtrar</button>
			<!-- </div> -->

		</form>	

		<!-- <div class="form-group col-sm-6 col-xs-12"> -->
			<a href="<?php echo BASE_URL; ?>agenda"><button class="btn btn-default">Limpar</button></a>
			<a href="<?php echo BASE_URL; ?>agenda/form"><button class="btn btn-primary">Novo</button></a>
		<!-- </div> -->

	</div>
</div>

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
			<?php if( count( $agendas ) < 1 ) echo "<p class='alert alert-info text-center'>Nenhum resultado encontrado!</p>"; ?>
			<?php foreach ($agendas as $agenda) { ?>
				<tr class="<?php echo $agenda->verificaClasseCor(); ?>">
					<td><?php echo $agenda->dataFormatada(); ?></td>
					<!-- <td><?php //echo $agenda->getDescricao(); ?></td> -->
					<td><?php echo $agenda->getMedico()->getNome(); ?></td>
					<td><?php echo $agenda->getCliente()->getNome(); ?></td>
					<td style="text-transform: uppercase;"><?php echo $agenda->getStatus(); ?></td>
					<td>
						<a href="<?php echo BASE_URL; ?>agenda/form/id/<?php echo $agenda->getId(); ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
						<a href="<?php echo BASE_URL; ?>agenda/remove/id/<?php echo $agenda->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>