<?php
namespace App\Model\Cliente;

	class Cliente {
		private $id;
		private $nome;
        private $data_nascimento;
        private $ci;
        private $cpf;
        private $endereco;
        private $fone;
        private $celular;
        private $email;
		private $profissao;

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
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of data_nascimento.
     *
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * Sets the value of data_nascimento.
     *
     * @param mixed $data_nascimento the data nascimento
     *
     * @return self
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    /**
     * Gets the value of ci.
     *
     * @return mixed
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Sets the value of ci.
     *
     * @param mixed $ci the ci
     *
     * @return self
     */
    public function setCi($ci)
    {
        $this->ci = $ci;

        return $this;
    }

    /**
     * Gets the value of cpf.
     *
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Sets the value of cpf.
     *
     * @param mixed $cpf the cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Gets the value of endereco.
     *
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Sets the value of endereco.
     *
     * @param mixed $endereco the endereco
     *
     * @return self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Gets the value of fone.
     *
     * @return mixed
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Sets the value of fone.
     *
     * @param mixed $fone the fone
     *
     * @return self
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Gets the value of celular.
     *
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Sets the value of celular.
     *
     * @param mixed $celular the celular
     *
     * @return self
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of profissao.
     *
     * @return mixed
     */
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * Sets the value of profissao.
     *
     * @param mixed $profissao the profissao
     *
     * @return self
     */
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

        return $this;
    }

    public function date2db($data){
        if(!empty($data)):
            $data = explode("/", $data);
            $data = $data[2] . '-' . $data[1] . '-' . $data[0];
        else:
            $data = '0000-00-00';
        endif;
        $this->data_nascimento = $data;
    }

    public function dataFormatada(){
        if( !empty( $this->data_nascimento ) ) {
            $data = explode("-", $this->data_nascimento );
            $data = $data[2] . '/' . $data[1] . '/' . $data[0];
        } else {
            $data = '';
        }
        return $data;
    }
}