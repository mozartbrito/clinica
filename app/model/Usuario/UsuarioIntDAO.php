<?php 
namespace App\Model\Usuario;

	interface UsuarioIntDAO  {
		public function listaTodos();
		public function listaUnico($id);
		public function insere(Usuario $usuario);
		public function deleta($id);
		public function atualiza(Usuario $usuario);
	}