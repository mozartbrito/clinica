<?php
	namespace App\Model\Perfil

	class Perfil{
		private $id;
		private $perfil;
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of perfil.
     *
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Sets the value of perfil.
     *
     * @param mixed $perfil the perfil
     *
     * @return self
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

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
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}