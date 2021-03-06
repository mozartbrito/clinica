<?php 
namespace App\Model\Medico;
use System\Model;
	class MedicoDAO extends Model implements MedicoIntDAO  {
		public $_tabela = 'medico';
		public $_class = 'App\Model\Medico\Medico';

		public function listaTodos() {
			$select['fields'] = "*";
			return $this->listar($this->_class, $select);
		}

		public function listaUnico($id){
			$select['fields'] = "*";
			$select['where'] = "id = '" . $id . "'";
			return $this->listarUm($this->_class, $select);
		}

		public function insere(Medico $medico){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (nome, especialidade_id, turno) 
				VALUES (?, ?, ?)");

			$sql->execute( array( $medico->getNome(), $medico->getEspecialidade()->getId(), $medico->getTurno() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Medico $medico){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET nome = ?, especialidade_id = ?, turno = ?
				WHERE id = ?");

			$sql->execute( array( $medico->getNome(), $medico->getEspecialidade()->getId(), $medico->getTurno(), 
				$medico->getId() ) );
		}

		public function deleta($id){
			$where = "id = " . $id;
			return $this->deletar( $where );
		}

	}