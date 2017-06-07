<?php 
namespace App\Model\Medico;
use System\Model;
	class MedicoDAO extends Model implements MedicoIntDAO  {
		public $_tabela = 'medico';
		public $_class = 'App\Model\Medico\Medico';

		public function listaTodos() {
			return $this->listar($this->_class);
			/*$sql = $this->db->prepare( "SELECT * FROM {$this->_tabela}" );

			$sql->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Medico\Medico');
			$sql->execute();
			return $sql->fetchAll();*/
		}
	}