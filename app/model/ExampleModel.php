<?php 
	class ExampleModel extends Model {
		public $_tabela = 'table';

		public function listarTudo() {
			return $this->listar();
		}
	}