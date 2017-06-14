<?php 
namespace App\Model\Agenda;
use System\Model;
	class AgendaDAO extends Model implements AgendaIntDAO  {
		public $_tabela = 'agenda';
		public $_class = 'App\Model\Agenda\Agenda';

		public function listaTodos( $filtros = null ) {

			if( isset( $filtros['inicio'] ) ) $filtros['inicio'] = "data_hora >= '{$this->date2db($filtros['inicio'])}:00'";
			if( isset( $filtros['fim'] ) ) $filtros['fim'] = "data_hora <= '{$this->date2db($filtros['fim'])}:59'";
			if( isset( $filtros['status'] ) ) $filtros['status'] = "status = '{$filtros['status']}'";

			if( count( $filtros ) > 1 ) $select['where'] = implode( " AND ", $filtros );
			else if( count( $filtros ) == 1 ) $select['where'] = implode( "", $filtros );


			$select['fields'] = "*";
			$select['orderby'] = "data_hora ASC";
			
			return $this->listar($this->_class, $select);
		}

		public function listaUnico($id){
			$select['fields'] = "*";
			$select['where'] = "id = '" . $id . "'";
			return $this->listarUm($this->_class, $select);
		}

		public function insere(Agenda $agenda){
			$sql = $this->db->prepare("INSERT INTO {$this->_tabela} (cliente_id, medico_id, data_hora, status, descricao) 
				VALUES (?, ?, ?, ?, ?)");

			$sql->execute( array( $agenda->getCliente()->getId(), $agenda->getMedico()->getId(), $agenda->getDataHora(), $agenda->getStatus(), $agenda->getDescricao() ) );
		
			return $this->db->lastInsertId();
		}

		public function atualiza(Agenda $agenda){
			$sql = $this->db->prepare("UPDATE {$this->_tabela} SET cliente_id = ?, medico_id = ?, data_hora = ?, status = ?, descricao = ? WHERE id = ?");

			$sql->execute( array( $agenda->getCliente()->getId(), $agenda->getMedico()->getId(), $agenda->getDataHora(), $agenda->getStatus(), $agenda->getDescricao(), $agenda->getId() ) );
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
          $data = '0000-00-00 00:00';
      }
      return $data;
    }

	}