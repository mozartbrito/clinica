<?php 
	//mensagem de sucesso
	if(isset($_SESSION['success'])) { 
?>
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<?php echo $_SESSION['success']; ?>
	</div>
<?php 
	} unset($_SESSION['success']);

	//mensagem de erro
	if(isset($_SESSION['danger'])) { 
?>
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<?php echo $_SESSION['danger']; ?>
	</div>
<?php 
	} unset($_SESSION['danger']);

	//mensagem de informação
	if(isset($_SESSION['info'])) { 
?>
	<div class="alert alert-info alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<?php echo $_SESSION['info']; ?>
	</div>
<?php 
	} unset($_SESSION['info']);
?>