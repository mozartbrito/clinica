<?php 
namespace App\Model\Avaliacao;
use App\Model\Medico\Medico;
use App\Model\Cliente\Cliente;

	class Avaliacao {
		private $id;
		private $cliente;
		private $medico;
		private $data_avaliacao;
		private $status;
		private $descricao;
	
    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of cliente.
     *
     * @return mixed
     */
    public function getCliente() {
        return $this->cliente;
    }

    /**
     * Sets the value of cliente.
     *
     * @param mixed $cliente the cliente
     *
     * @return self
     */
    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Gets the value of medico.
     *
     * @return mixed
     */
    public function getMedico() {
        return $this->medico;
    }

    /**
     * Sets the value of medico.
     *
     * @param mixed $medico the medico
     *
     * @return self
     */
    public function setMedico(Medico $medico) {
        $this->medico = $medico;

        return $this;
    }

    /**
     * Gets the value of data_avaliacao.
     *
     * @return mixed
     */
    public function getDataAvaliacao() {
        return $this->data_avaliacao;
    }

    /**
     * Sets the value of data_avaliacao.
     *
     * @param mixed $data_avaliacao the data hora
     *
     * @return self
     */
    public function setDataAvaliacao($data_avaliacao) {
        $this->data_avaliacao = $data_avaliacao;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of descricao.
     *
     * @return mixed
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Sets the value of descricao.
     *
     * @param mixed $descricao the descricao
     *
     * @return self
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
    }

    public function date2db($data){
        if(!empty($data)){
            $data = explode("/", $data);
            $data = $data[2] . '-' . $data[1] . '-' . $data[0];
        } else {
            $data = '0000-00-00';
        }
        $this->data_avaliacao = $data;
    }

    public function dataFormatada(){
        if( !empty( $this->data_avaliacao ) ) {
            $data = explode("-", $this->data_avaliacao );
            $data = $data[2] . '/' . $data[1] . '/' . $data[0];
        } else {
            $data = '';
        }
        return $data;
    }

    public function verificaClasseCor() {
        if( $this->status == 'Realizado' ) : $classe = 'success text-success';
        elseif( $this->status == 'Em espera' ) : $classe = 'warning text-warning';
        elseif( $this->status == 'Cancelado' ) : $classe = 'danger text-danger';
        elseif( $this->status == 'Agendado' ) : 
            $classe = ( $this->data_avaliacao < date('Y-m-d H:m:i') ) ? 'active text-danger' : 'active text-active';
        endif;
        return $classe;
    }

}