<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Clínica CEO</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Clínica CEO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo BASE_URL; ?>">Home</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Médicos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL; ?>medicos">Listar</a></li>
            <li><a href="<?php echo BASE_URL; ?>medicos/form">Cadastrar</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Especialidades <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL; ?>especialidades">Listar</a></li>
            <li><a href="<?php echo BASE_URL; ?>especialidades/form">Cadastrar</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL; ?>clientes">Listar</a></li>
            <li><a href="<?php echo BASE_URL; ?>clientes/form">Cadastrar</a></li>
          </ul>
        </li>
      </ul>

      <?php if ( isset( $_SESSION['autenticado'] ) ) { ?>
      
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="#">Link</a></li> -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['autenticado']['nome']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo BASE_URL; ?>" class="glyphicon glyphicon-cog"> Perfil</a></li>
              <li><a href="<?php echo BASE_URL; ?>usuarios" class="glyphicon glyphicon-user"> Usuários</a></li>
              <li><a href="<?php echo BASE_URL; ?>perfil" class="glyphicon glyphicon-user"> Perfils</a></li>
              <!-- <li><a href="<?php echo BASE_URL; ?>">Something else here</a></li> -->
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo BASE_URL; ?>login/logout" class="glyphicon glyphicon-log-out"> Sair</a></li>
            </ul>
          </li>
        </ul>

        <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>