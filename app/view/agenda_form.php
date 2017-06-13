<h2>Clínica CEO :: Agendamento / <?php echo ( isset( $agenda ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>agenda/salvar">
  <?php if( isset( $agenda ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $agenda->getId(); ?>" />
  <?php } ?>

  <div class="row">
    <div class="form-group col-md-6 col-sm-12 col-xs-12">
      <label for="cliente_id">Cliente</label>
      <select type="text" class="form-control" id="cliente_id" name="cliente_id" required>
        <option value="">Selecione o Cliente</option>
        <?php foreach ($clientes as $cliente) { ?>
          <option value="<?php echo $cliente->getId(); ?>" <?php echo ( isset( $agenda ) && $agenda->getCliente()->getId() == $cliente->getId() ) ? 'selected' : ''; ?>><?php echo $cliente->getNome(); ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <label for="data_hora">Data / Hora</label>
      <input type="text" class="form-control datetimepicker" id="data_hora" name="data_hora" placeholder="Data / hora da consulta" value="<?php if( isset( $agenda ) ) echo $agenda->dataFormatada(); ?>">
    </div>
  </div>
    
  <div class="row">
    <div class="form-group col-md-6 col-sm-12 col-xs-12">
      <label for="medico_id">Médico</label>
      <select type="text" class="form-control" id="medico_id" name="medico_id" required>
        <option value="">Selecione o Médico</option>
        <?php foreach ($medicos as $medico) { ?>
          <option value="<?php echo $medico->getId(); ?>" <?php echo ( isset( $agenda ) && $agenda->getMedico()->getId() == $medico->getId() ) ? 'selected' : ''; ?>><?php echo $medico->getNome(); ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <label for="status">Situação</label>
      <select type="text" class="form-control" id="status" name="status" required>
        <option value="">Selecione</option>
        <option value="Agendado" <?php echo ( isset( $agenda ) && $agenda->getStatus() == "Agendado" ) ? 'selected' : ''; ?>>Agendado</option>
        <option value="Em espera" <?php echo ( isset( $agenda ) && $agenda->getStatus() == "Em espera" ) ? 'selected' : ''; ?>>Em espera</option>
        <option value="Cancelado" <?php echo ( isset( $agenda ) && $agenda->getStatus() == "Cancelado" ) ? 'selected' : ''; ?>>Cancelado</option>
        <option value="Realizado" <?php echo ( isset( $agenda ) && $agenda->getStatus() == "Realizado" ) ? 'selected' : ''; ?>>Realizado</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-12 col-sm-12 col-xs-12">
      <label for="descricao">Descrição</label>
      <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição a respeito da consulta" rows="4"><?php if( isset( $agenda ) ) echo $agenda->getDescricao(); ?></textarea>
    </div>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>