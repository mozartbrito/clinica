<?php 
namespace App\Model\Medico;
use System\Model;
	class MedicoDAO extends Model implements MedicoIntDAO  {
		public $_tabela = 'medico';
		public $_class = 'App\Model\Medico\Medico';

		public function listaTodos() {
			$this->_tabela = 'medico m';

			$select['fields'] = "m.*, e.id id_espec, e.especialidade";
			$select['join'] = "LEFT JOIN especialidade e ON m.especialidade_id = e.id";
			return $this->listar($this->_class, $select);
		}

		public function listaUnico($id){
			$this->_tabela = 'medico m';

			$select['fields'] = "m.*, e.id id_espec, e.especialidade";
			$select['join'] = "LEFT JOIN especialidade e ON m.especialidade_id = e.id";
			$select['where'] = "m.id = '" . $id . "'";
			return $this->listarUm($this->_class, $select);
		}

		public function insere(Medico $medico){
			$id_cadastrado = $this->criar( $medico );
			return $id_cadastrado;
		}

	}