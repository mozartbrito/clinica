<h2>Clínica CEO :: Especialidades / <?php echo ( isset( $especialidade ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>especialidades/salvar">
  <?php if( isset( $especialidade ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $especialidade->getId(); ?>" />
  <?php } ?>

  <div class="form-group">
    <label for="especialidade">Especialidade</label>
    <input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="Nome da Especialidade" value="<?php echo ( isset( $especialidade ) ) ? $especialidade->getEspecialidade() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control" rows="3" placeholder="Uma breve descrição da Especialidade"><?php echo ( isset( $especialidade ) ) ? $especialidade->getDescricao() : ''; ?></textarea>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>