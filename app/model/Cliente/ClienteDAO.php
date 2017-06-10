<?php 
namespace App\Model\Cliente;
use System\Model;
	class ClienteDAO extends Model implements ClienteIntDAO  {
		public $_tabela = 'cliente';
		public $_class = 'App\Model\Cliente\Cliente';

		public function listaTodos() {
			return $this->listar($this->_class);
		}

		public function listaUnico($id){
			$select['where'] = "id = '" . $id . "'";
			return $this->listarUm($this->_class, $select);
		}

		public function insere(Cliente $cliente){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (nome, data_nascimento, ci, cpf, endereco, fone, celular, email, profissao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

			$sql->execute( array( $cliente->getNome(), $cliente->getDataNascimento(), $cliente->getCi(), $cliente->getCpf(), $cliente->getEndereco(), $cliente->getFone(), $cliente->getCelular(), $cliente->getEmail(), $cliente->getProfissao() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Cliente $cliente){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET nome = ?, data_nascimento = ?, ci = ?, cpf = ?, endereco = ?, fone = ?, celular = ?, email = ?, profissao = ? WHERE id = ?");

			$sql->execute( array( $cliente->getNome(), $cliente->getDataNascimento(), $cliente->getCi(), $cliente->getCpf(), $cliente->getEndereco(), $cliente->getFone(), $cliente->getCelular(), $cliente->getEmail(), $cliente->getProfissao(), $cliente->getId() ) );
		}

		public function deleta($id){
			$where = "id = " . $id;
			return $this->deletar( $where );
		}
	}