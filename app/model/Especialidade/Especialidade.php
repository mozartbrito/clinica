<?php
namespace App\Model\Especialidade;

	class Especialidade {
		private $id;
		private $especialidade;
		private $descricao;
	

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    private function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of especilidade.
     *
     * @return mixed
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * Sets the value of especialidade.
     *
     * @param mixed $especialidade the especialidade
     *
     * @return self
     */
    private function setEspecialidade($especialidade)
    {
        $this->especialidade = $especialidade;

        return $this;
    }

    /**
     * Gets the value of descricao.
     *
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Sets the value of descricao.
     *
     * @param mixed $descricao the descricao
     *
     * @return self
     */
    private function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}