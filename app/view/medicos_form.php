<h2>Clínica CEO :: Médicos / <?php echo ( isset( $medico ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>medicos/salvar">
  <?php if( isset( $medico ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $medico->getId(); ?>" />
  <?php } ?>

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Médico" value="<?php echo ( isset( $medico ) ) ? $medico->getNome() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="especialidade">Especialidade</label>
    <select class="form-control" name="especialidade_id" id="especialidade">
      <option value="">Selecione a Especialidade</option>
      <?php foreach ($especialidades as $especialidade) { ?>
        <option value="<?php echo $especialidade->getId(); ?>" <?php echo ( isset( $medico ) && $medico->getEspecialidade() == $especialidade->getId() ) ? "selected" : ""; ?>><?php echo $especialidade->getEspecialidade(); ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="turno">Turno</label>
    <select class="form-control" name="turno" id="turno">
      <option value="">Selecione o Turno</option>
      <option value="Matutino" <?php echo ( isset( $medico ) && $medico->getTurno() == "Matutino" ) ? "selected" : ""; ?>>Matutino</option>
      <option value="Vespertino" <?php echo ( isset( $medico ) && $medico->getTurno() == "Vespertino" ) ? "selected" : ""; ?>>Vespertino</option>
      <option value="Noturno" <?php echo ( isset( $medico ) && $medico->getTurno() == "Noturno" ) ? "selected" : ""; ?>>Noturno</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>