<?php 
namespace App\Model\Perfil;

	interface PerfilIntDAO  {
		public function listaTodos();
		public function listaUnico($id);
		public function insere(Perfil $perfil);
		public function deleta($id);
		public function atualiza(Perfil $perfil);
	}