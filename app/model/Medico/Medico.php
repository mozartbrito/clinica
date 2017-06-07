<?php 
namespace App\Model\Medico;

	class Medico  {
		private $id;
		private $nome;
		private $especialidade_id;
		private $turno;

		/**
		 * @param type $id
		 */
		public function setId($id)
		{
		    $this->id = $id;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getId()
		{
		    return $this->id;
		}
		/**
		 * @param type $nome
		 */
		public function setNome($nome)
		{
		    $this->nome = $nome;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getNome()
		{
		    return $this->nome;
		}
		/**
		 * @param type $especialidade_id
		 */
		public function setEspecialidade_id($especialidade_id)
		{
		    $this->especialidade_id = $especialidade_id;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getEspecialidade()
		{
		    return $this->especialidade_id;
		}
		/**
		 * @param type $turno
		 */
		public function setTurno($turno)
		{
		    $this->turno = $turno;
		    return $this;
		}
		/**
		 * @return type
		 */
		public function getTurno()
		{
		    return $this->turno;
		}
	}