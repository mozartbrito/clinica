<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Clínica CEO</title>

    <!-- Bootstrap -->
    <link href="<?php echo BASE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/estilo.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/jquery-ui.css" rel="stylesheet">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="container">
  <div class="row">
    <div class="painel log" align="center">
      <a href="<?php echo BASE_URL; ?>">
        <img src="<?php echo BASE_URL; ?>img/logo.png" class="" width="180">
      </a>
    </div>
    <div class="painel">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 align="center" class="text-primary"><strong>Área Restrita</strong></h3>
    </div>
    <div class="panel-body">
      <?php $this->view('layout/mensagem'); ?>
      <form method="POST" action="<?php echo BASE_URL; ?>login/logar">

      		<div class="form-group">
      	    <label for="login">Login</label>
      	    <input type="text" class="form-control" id="login" name="login" placeholder="Informe o usuário" />
      	  </div>

      	  <div class="form-group">
      			<label for="senha">Senha</label>
      	    <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha" />
      	  </div>


      	<button type="submit" class="btn btn-success pull-right">Logar</button>
      </form>	

    </div>
  </div>
</div> <!-- fecha painel -->
</div>


</div>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="<?php echo BASE_URL; ?>js/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
   

  </body>
</html>