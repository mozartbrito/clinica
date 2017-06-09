<h2>Clínica CEO :: Especialidades / <?php echo ( isset( $especialidade ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>especialidades/salvar">
  <?php if( isset( $especialidade ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $especialidade->getId(); ?>" />
  <?php } ?>

  <div class="form-group">
    <label for="especialidade">Especialidade</label>
    <input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="Nome do Médico" value="<?php echo ( isset( $especialidade ) ) ? $especialidade->getEspecialidade() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome do Médico" value="<?php echo ( isset( $especialidade ) ) ? $especialidade->getDescricao() : ''; ?>">
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>