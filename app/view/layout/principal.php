<?php 
$this->view('layout/header');
$this->view('layout/menu');

$this->view($view, $data);

$this->view('layout/footer');
?>
