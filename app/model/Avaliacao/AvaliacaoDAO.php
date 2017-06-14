<?php 
namespace App\Model\Avaliacao;
use System\Model;
	class AvaliacaoDAO extends Model implements AvaliacaoIntDAO  {
		public $_tabela = 'avaliacao';
		public $_class = 'App\Model\Avaliacao\Avaliacao';

		public function listaTodos() {
			$select['fields'] = "*";
			$select['orderby'] = "data_avaliacao ASC";
			
			return $this->listar($this->_class, $select);
		}

		public function listaUnico($id){
			$select['fields'] = "*";
			$select['where'] = "id = '" . $id . "'";
			return $this->listarUm($this->_class, $select);
		}

		public function insere(Avaliacao $avaliacao){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (cliente_id, medico_id, data_avaliacao, status, descricao) 
				VALUES (?, ?, ?, ?, ?)");

			$sql->execute( array( $avaliacao->getCliente()->getId(), $avaliacao->getMedico()->getId(), $avaliacao->getDataAvaliacao(), $avaliacao->getStatus(), $avaliacao->getDescricao() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Avaliacao $avaliacao){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET cliente_id = ?, medico_id = ?, data_avaliacao = ?, status = ?, descricao = ? WHERE id = ?");

			$sql->execute( array( $avaliacao->getCliente()->getId(), $avaliacao->getMedico()->getId(), $avaliacao->getDataAvaliacao(), $avaliacao->getStatus(), $avaliacao->getDescricao(), $avaliacao->getId() ) );
		}

		public function deleta($id){
			$where = "id = " . $id;
			return $this->deletar( $where );
		}

		public function date2db($data){
      if(!empty($data)){
          $data = explode("/", $data);
          $data[2] = explode(" ", $data[2]);
          $data = $data[2][0] . '-' . $data[1] . '-' . $data[0] . ' ' . $data[2][1];
      } else {
          $data = '0000-00-00';
      }
      return $data;
    }

	}