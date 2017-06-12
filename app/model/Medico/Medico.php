<?php 
namespace App\Model\Medico;
use App\Model\Especialidade\Especialidade;

	class Medico  {
		private $id;
		private $nome;
		private $especialidade;
		private $turno;

		/**
		 * @param type $id
		 */
		public function setId($id) {
		    $this->id = $id;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getId() {
		    return $this->id;
		}
		/**
		 * @param type $nome
		 */
		public function setNome($nome) {
		    $this->nome = $nome;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getNome() {
		    return $this->nome;
		}
		/**
		 * @param type $especialidade
		 */
		public function setEspecialidade(Especialidade $especialidade) {
		    $this->especialidade = $especialidade;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getEspecialidade() {
		    return $this->especialidade;
		}
		/**
		 * @param type $turno
		 */
		public function setTurno($turno) {
		    $this->turno = $turno;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getTurno() {
		    return $this->turno;
		}
	}