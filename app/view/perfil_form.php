<h2>Clínica CEO :: Perfil / <?php echo ( isset( $perfil ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>perfil/salvar">
  <?php if( isset( $perfil ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $perfil->getId(); ?>" />
  <?php } ?>

  <div class="form-group">
    <label for="perfil">Perfil</label>
    <input type="text" class="form-control" id="perfil" name="perfil" placeholder="Nome do perfil" value="<?php echo ( isset( $perfil ) ) ? $perfil->getPerfil() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control" rows="3" placeholder="Descrição do perfil"><?php echo ( isset( $perfil ) ) ? $perfil->getDescricao() : ''; ?></textarea>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>