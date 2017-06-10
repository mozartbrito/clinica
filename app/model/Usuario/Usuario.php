<?php
namespace App\Model\Usuario;

	class Usuario {
		private $id;
		private $nome;
		private $login;
		private $senha;
		private $perfil_id;
		private $ci;
		private $cpf;
		private $endereco;
		private $fone;
		private $celular;

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
         * Gets the value of login.
         *
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }

        /**
         * Sets the value of login.
         *
         * @param mixed $login the login
         *
         * @return self
         */
        public function setLogin($login)
        {
            $this->login = $login;

            return $this;
        }

        /**
         * Gets the value of senha.
         *
         * @return mixed
         */
        public function getSenha()
        {
            return $this->senha;
        }

        /**
         * Sets the value of senha.
         *
         * @param mixed $senha the senha
         *
         * @return self
         */
        public function setSenha($senha)
        {
            $this->senha = $senha;

            return $this;
        }

        /**
         * Gets the value of perfil_id.
         *
         * @return mixed
         */
        public function getPerfilId()
        {
            return $this->perfil_id;
        }

        /**
         * Sets the value of perfil_id.
         *
         * @param mixed $perfil_id the perfil id
         *
         * @return self
         */
        public function setPerfilId($perfil_id)
        {
            $this->perfil_id = $perfil_id;

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

    }