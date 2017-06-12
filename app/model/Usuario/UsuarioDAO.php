<?php 
namespace App\Model\Usuario;
use System\Model;
	class UsuarioDAO extends Model implements UsuarioIntDAO  {
		public $_tabela = 'usuario';
		public $_class = 'App\Model\Usuario\Usuario';

		public function listaTodos() {
			$this->_tabela = 'usuario u';

			$select['fields'] = "u.*";
			$select['join'] = "LEFT JOIN perfil p ON u.perfil_id = p.id";
			return $this->listar($this->_class, $select);
		}

		public function listaUnico($id = '', Array $usuario = null ){
			$this->_tabela = 'usuario u';

			$select['fields'] = "u.*";
			$select['join'] = "LEFT JOIN perfil p ON u.perfil_id = p.id";

			if( $id != '' ) {
				$select['where'] = "u.id = '" . $id . "'";
			} else if( isset( $usuario['login'] ) ) {
				$select['where'] = "u.login = '" . $usuario['login'] . "'"; 
				if( isset( $usuario['senha'] ) ) $select['where'] .= "AND u.senha = '" . $usuario['senha'] . "'";
			}

			return $this->listarUm($this->_class, $select);
		}

		public function insere(Usuario $usuario){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (nome, login, senha, perfil_id, ci, cpf, endereco, fone, celular) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

			$sql->execute( array( $usuario->getNome(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getPerfil()->getId(), $usuario->getCi(), $usuario->getCpf(), $usuario->getEndereco(), $usuario->getFone(), $usuario->getCelular() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Usuario $usuario){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET nome = ?, login = ?, senha = ?, perfil_id = ?, ci = ?, cpf = ?, endereco = ?, fone = ?, celular = ? WHERE id = ?");

			$sql->execute( array( $usuario->getNome(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getPerfil()->getId(), $usuario->getCi(), $usuario->getCpf(), $usuario->getEndereco(), $usuario->getFone(), $usuario->getCelular(), $usuario->getId() ) );
		}

		public function deleta($id){
			$where = "id = " . $id;
			return $this->deletar( $where );
		}
	}