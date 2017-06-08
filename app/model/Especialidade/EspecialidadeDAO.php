<?php 
namespace App\Model\Especialidade;
use System\Model;
	class EspecialidadeDAO extends Model implements EspecialidadeIntDAO  {
		public $_tabela = 'especialidade';
		public $_class = 'App\Model\Especialidade\Especialidade';

		public function listaTodos() {
			return $this->listar($this->_class);
		}
	}