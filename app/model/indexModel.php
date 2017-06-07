<?php 
namespace App\Model;
use System\Model;
	class IndexModel extends Model {
		public $_tabela = 'medico';

		public function listaTodos() {
			return $this->listar();
		}
	}