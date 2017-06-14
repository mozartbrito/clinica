<?php 
namespace App\Model\Agenda;
use App\Model\Medico\Medico;
use App\Model\Cliente\Cliente;

	class Agenda {
		private $id;
		private $cliente;
		private $medico;
		private $data_hora;
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
     * Gets the value of data_hora.
     *
     * @return mixed
     */
    public function getDataHora() {
        return $this->data_hora;
    }

    /**
     * Sets the value of data_hora.
     *
     * @param mixed $data_hora the data hora
     *
     * @return self
     */
    public function setDataHora($data_hora) {
        $this->data_hora = $data_hora;

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
            $data[2] = explode(" ", $data[2]);
            $data = $data[2][0] . '-' . $data[1] . '-' . $data[0] . ' ' . $data[2][1];
        } else {
            $data = '0000-00-00 00:00';
        }
        $this->data_hora = $data;
    }

    public function dataFormatada(){
        if( !empty( $this->data_hora ) ) {
            $data = explode("-", $this->data_hora );
            $data[2] = explode(" ", $data[2] );
            $data = $data[2][0] . '/' . $data[1] . '/' . $data[0] . ' ' . $data[2][1];
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
            $classe = ( $this->data_hora < date('Y-m-d H:m:i') ) ? 'active text-danger' : 'active text-active';
        endif;
        return $classe;
    }

    // public function verificaIcon( $_status ) {
    //     $icon = '<span class="glyphicon glyphicon-';
    //     $s = 'ok-circle text-success'; $w = 'time text-warning';
    //     $d = 'ban-circle text-danger'; $a = 'calendar text-active';

    //     if( $this->status != $_status ) :
    //         if( $this->status == 'Realizado' || $this->status == 'Cancelado' ) : return '';
    //         else :
    //             if( $this->status == 'Em espera' ) :
    //                 if( $_status == 'Realizado' ) : $icon .= $s;
    //                 elseif ( $_status == 'Cancelado' ) : $icon .= $d;
    //                 endif;
    //             elseif( $this->status == 'Agendado' ) :
    //                 if( $_status == 'Realizado' ) : $icon .= $s;
    //                 elseif ( $_status == 'Cancelado' ) : $icon .= $d;
    //                 elseif ( $_status == 'Em espera' ) : $icon .= $w;
    //                 endif;
    //             endif;
    //             $icon .= '"></span>';
    //             return $icon;
    //         endif;
    //     else : return ''; 
    //     endif;
    // }
}