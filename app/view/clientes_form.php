<h2>Clínica CEO :: Clientes / <?php echo ( isset( $cliente ) ) ? 'Atualizar' : 'Novo'; ?></h2>

<br />

<form method="POST" action="<?php echo BASE_URL; ?>clientes/salvar">
  <?php if( isset( $cliente ) ) { ?>
    <input type="hidden" name="id" value="<?php echo $cliente->getId(); ?>" />
  <?php } ?>

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getNome() : ''; ?>" required>
  </div>

  <div class="form-group">
    <label for="data_nascimento">Data de Nascimento</label>
    <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Data de nascimento" value="<?php echo ( isset( $cliente ) ) ? $cliente->getDataNascimento() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="ci">Identidade</label>
    <input type="text" class="form-control" id="ci" name="ci" placeholder="Identidade do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getCi() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getCpf() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getEndereco() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="fone">Telefone</label>
    <input type="text" class="form-control" id="fone" name="fone" placeholder="Telefone do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getFone() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getCelular() : ''; ?>">
  </div>

  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do cliente" value="<?php echo ( isset( $cliente ) ) ? $cliente->getEmail() : ''; ?>">
  </div>

  

  <button type="submit" class="btn btn-success">Salvar</button>
</form>