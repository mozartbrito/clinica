<?php 
	$this->view('layout/header');
	echo '<div class="conteudo">';
	$this->view('layout/menu');
	$this->view('layout/mensagem');

	$this->view($view, $data);
	echo '</div>';
	$this->view('layout/footer');