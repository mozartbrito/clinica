<?php 
namespace App\Model\Cliente;

	interface ClienteIntDAO  {
		public function listaTodos();
		public function listaUnico($id);
		public function insere(Cliente $cliente);
		public function deleta($id);
		public function atualiza(Cliente $cliente);
	}