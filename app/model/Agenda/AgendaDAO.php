<?php 
namespace App\Model\Agenda;
use System\Model;
	class AgendaDAO extends Model implements AgendaIntDAO  {
		public $_tabela = 'agenda';
		public $_class = 'App\Model\Agenda\Agenda';

		public function listaTodos( $filtros = null ) {
			$this->_tabela = 'agenda a';
			
			if( isset( $filtros['inicio'] ) && $filtros['inicio'] != '' ) $filtros['inicio'] = "a.data_hora >= '{$filtros['inicio']}'";
			if( isset( $filtros['fim'] ) && $filtros['fim'] != '' ) $filtros['fim'] = "a.data_hora <= '{$filtros['fim']}'";
			if( isset( $filtros['status'] ) && $filtros['status'] != '' ) $filtros['status'] = "a.status = '{$filtros['status']}'";

			if( count( $filtros ) > 1 ) $select['where'] = implode( " AND ", $filtros );
			else if( count( $filtros ) == 1 ) $select['where'] = implode( "", $filtros );

			echo "<pre>";
			print_r($select);
			echo "</pre>";
			die;

			$select['fields'] = "a.*";
			$select['orderby'] = "a.data_hora ASC";
			$select['join'] = "LEFT JOIN cliente c ON a.cliente_id = c.id LEFT JOIN medico m ON a.medico_id = m.id";
			return $this->listar($this->_class, $select);
		}

		public function listaUnico($id){
			$this->_tabela = 'agenda a';

			$select['fields'] = "a.*";
			$select['join'] = "LEFT JOIN cliente c ON a.cliente_id = c.id LEFT JOIN medico m ON a.medico_id = m.id";
			$select['where'] = "a.id = '" . $id . "'";
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

	}