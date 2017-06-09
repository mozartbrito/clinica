<?php 
namespace App\Model\Especialidade;
use System\Model;
	class EspecialidadeDAO extends Model implements EspecialidadeIntDAO  {
		public $_tabela = 'especialidade';
		public $_class = 'App\Model\Especialidade\Especialidade';

		public function listaTodos() {
			return $this->listar($this->_class);
		}

		public function listaUnico($id){
			return $this->listarUm($this->_class);
		}

		public function insere(Especialidade $especialidade){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (especialidade, descricao) 
				VALUES (?, ?)");

			$sql->execute( array( $especialidade->getEspecialidade(), $especialidade->getDescricao() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Especialidade $especialidade){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET especialidade = ?, descricao = ?
				WHERE id = ?");

			$sql->execute( array( $especialidade->getEspecialidade(), $especialidade->getDescricao(), 
				$especialidade->getId() ) );
		}

		public function deleta($id){
			$where = "id = " . $id;
			return $this->deletar( $where );
		}
	}