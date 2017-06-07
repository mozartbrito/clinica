<?php 
namespace App\Model\Medico;
use System\Model;
	class MedicoDAO extends Model implements MedicoIntDAO  {
		public $_tabela = 'medico';
		public $_class = 'App\Model\Medico\Medico';

		public function listaTodos() {
			$this->_tabela = 'medico m';

			$select['fields'] = "m.*, e.especialidade";
			$select['join'] = "LEFT JOIN especialidade e ON m.especialidade_id = e.id";
			return $this->listar($this->_class, $select);
			/*$sql = $this->db->prepare( "SELECT * FROM {$this->_tabela}" );

			$sql->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Medico\Medico');
			$sql->execute();
			return $sql->fetchAll();*/
		}
	}