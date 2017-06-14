<?php 
namespace App\Model\Avaliacao;

	interface AvaliacaoIntDAO {
		public function listaTodos();
		public function listaUnico($id);
		public function insere(Avaliacao $avaliacao);
		public function deleta($id);
		public function atualiza(Avaliacao $avaliacao);
	}