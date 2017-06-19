<h2>Clínica CEO :: Avaliação / <?php echo ( isset( $avaliacao ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>avaliacoes/salvar">
  <?php if( isset( $avaliacao ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $avaliacao->getId(); ?>" />
  <?php } ?>

  <div class="row">
    <div class="form-group col-md-6 col-sm-12 col-xs-12">
      <label for="cliente_id">Cliente</label>
      <select type="text" class="form-control" id="cliente_id" name="cliente_id" required>
        <option value="">Selecione o Cliente</option>
        <?php foreach ($clientes as $cliente) { ?>
          <option value="<?php echo $cliente->getId(); ?>" <?php echo ( ( isset( $avaliacao ) && $avaliacao->getCliente()->getId() == $cliente->getId() ) || ( isset( $cliente_id ) && $cliente_id == $cliente->getId() ) ) ? 'selected' : ''; ?>><?php echo $cliente->getNome(); ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <label for="data_avaliacao">Data</label>
      <input type="text" class="form-control datepicker" id="data_avaliacao" name="data_avaliacao" placeholder="Data da Avaliação" value="<?php if( isset( $avaliacao ) ) echo $avaliacao->dataFormatada(); ?>">
    </div>
  </div>
    
  <div class="row">
    <div class="form-group col-md-6 col-sm-12 col-xs-12">
      <label for="medico_id">Médico</label>
      <select type="text" class="form-control" id="medico_id" name="medico_id" required>
        <option value="">Selecione o Médico</option>
        <?php foreach ($medicos as $medico) { ?>
          <option value="<?php echo $medico->getId(); ?>" <?php echo ( isset( $avaliacao ) && $avaliacao->getMedico()->getId() == $medico->getId() ) ? 'selected' : ''; ?>><?php echo $medico->getNome(); ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <label for="status">Situação</label>
      <select type="text" class="form-control" id="status" name="status" required>
        <option value="">Selecione</option>
        <?php foreach ($situacoes as $situacao) { ?>
          <option value="<?php echo $situacao; ?>" <?php echo ( isset( $avaliacao ) && $avaliacao->getStatus() == $situacao ) ? 'selected' : ''; ?>><?php echo $situacao; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-12 col-sm-12 col-xs-12">
      <label for="descricao">Descrição</label>
      <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição a respeito da consulta" rows="4"><?php if( isset( $avaliacao ) ) echo $avaliacao->getDescricao(); ?></textarea>
    </div>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>