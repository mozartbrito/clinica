<?php 
namespace App\Model\Perfil;
use System\Model;
	class PerfilDAO extends Model implements PerfilIntDAO  {
		public $_tabela = 'perfil';
		public $_class = 'App\Model\Perfil\Perfil';

		public function listaTodos() {
			return $this->listar($this->_class);
		}

		public function listaUnico($id){
			$select['where'] = "id = '" . $id . "'";
			return $this->listarUm($this->_class, $select);
		}

		public function insere(Perfil $perfil){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (perfil, descricao) 
				VALUES (?, ?)");

			$sql->execute( array( $perfil->getPerfil(), $perfil->getDescricao() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Perfil $perfil){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET perfil = ?, descricao = ?
				WHERE id = ?");

			$sql->execute( array( $perfil->getPerfil(), $perfil->getDescricao(), 
				$perfil->getId() ) );
		}

		public function deleta($id){
			$where = "id = " . $id;
			return $this->deletar( $where );
		}
	}