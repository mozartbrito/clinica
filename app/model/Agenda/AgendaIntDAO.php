<?php 
namespace App\Model\Agenda;

	interface AgendaIntDAO {
		public function listaTodos();
		public function listaUnico($id);
		public function insere(Agenda $agenda);
		public function deleta($id);
		public function atualiza(Agenda $agenda);
	}