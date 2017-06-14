<?php
namespace App\Controller;
use System\Controller;
use app\model\Agenda\Agenda;
use app\model\Agenda\AgendaDAO;
use app\model\Medico\Medico;
use app\model\Medico\MedicoDAO;
use app\model\Cliente\Cliente;
use app\model\Cliente\ClienteDAO;

class AgendaController extends Controller {

	private $agenda;
	private $medico;
	private $cliente;

	public function __construct()	{
		parent::__construct();

		if( !isset( $_SESSION['autenticado'] ) ) {
			$_SESSION['danger'] = "Acesso negado, efetue o login!";
			// Se não haver usuário logado, redireciona para a tela de login
			header('Location: ' . $this->site_url('login'));
		} else {
			$this->agenda = new AgendaDAO();
			$this->medico = new MedicoDAO();
			$this->cliente = new ClienteDAO();
		}

	}
	
	public function index(){
		$filtros = array();
		if( isset( $_POST['inicio'] ) && $_POST['inicio'] != '' ) $filtros['inicio'] = $_POST['inicio'];
		if( isset( $_POST['fim'] ) && $_POST['fim'] != '' ) $filtros['fim'] = $_POST['fim'];
		if( isset( $_POST['status'] ) && $_POST['status'] != '' ) $filtros['status'] = $_POST['status'];

		// Lista os médicos e relaciona cada especialidade com o mesmo
		$_agendas = $this->agenda->listaTodos( $filtros ); 
		foreach ($_agendas as $_agenda) {
			// Busca as informações do cliente
			$_cliente = $this->cliente->listaUnico( $_agenda->cliente_id );
			$_agenda->setCliente( $_cliente );
			// Busca as informações do médico
			$_medico = $this->medico->listaUnico( $_agenda->medico_id );
			$_agenda->setMedico( $_medico );
		}

		$data['data']['situacoes'] = array( "Agendado", "Em espera", "Cancelado", "Realizado");
		//enviando a view da função
		$data['view'] = 'agenda';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['agendas'] = $_agendas;
		foreach ($filtros as $key => $value) {
			$data['data'][$key] = $value;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		//enviando a view da função
		$data['view'] = 'agenda_form';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['medicos'] = $this->medico->listaTodos();
		$data['data']['clientes'] = $this->cliente->listaTodos();
		$data['data']['situacoes'] = array( "Agendado", "Em espera", "Cancelado", "Realizado");

		if ( isset( $parametros['id'] ) ) {
			$_agenda = $this->agenda->listaUnico( $parametros['id'] );
			// Busca as informações do cliente
			$_cliente = $this->cliente->listaUnico( $_agenda->cliente_id );
			$_agenda->setCliente( $_cliente );
			// Busca as informações do médico
			$_medico = $this->medico->listaUnico( $_agenda->medico_id );
			$_agenda->setMedico( $_medico );
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
			$data['data']['agenda'] = $_agenda;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_cliente = new Cliente();
		$_cliente->setId( $_POST['cliente_id'] );

		$_medico = new Medico();
		$_medico->setId( $_POST['medico_id'] );

		$_agenda = new Agenda();
		$_agenda->setCliente( $_cliente );
		$_agenda->setMedico( $_medico );
		$_agenda->date2db( $_POST['data_hora'] );
		$_agenda->setStatus( $_POST['status'] );
		$_agenda->setDescricao( $_POST['descricao'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->agenda->insere( $_agenda );
		} else {
			$_agenda->setId( $_POST['id'] );
			$this->agenda->atualiza( $_agenda );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível agendar!";
			header( "Location: " . $this->site_url( "agenda/form" ) );
		} else {
			$_SESSION['success'] = "Agendamento salvo com sucesso!";
			header( "Location: " . $this->site_url( "agenda/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->medico->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Agendamento removido com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Agendamento não removido!"; 
		}
		header( "Location: " . $this->site_url( "agenda" ) );
	}

	public function altera(){
		$parametros = $this->getParam();
		$_agenda = $this->agenda->listaUnico( $parametros['id'] );
		if( $parametros['status'] == 'em_espera' ) $_agenda->setStatus( 'Em espera' );

		$_cliente = new Cliente();
		$_cliente->setId( $_agenda->cliente_id );
		$_agenda->setCliente( $_cliente );
		$_medico = new Medico();
		$_medico->setId( $_agenda->medico_id );
		$_agenda->setMedico( $_medico );

		$this->agenda->atualiza( $_agenda );
		$_SESSION['success'] = "Situação alterada com sucesso!";
		header( "Location: " . $this->site_url() );
	}

}
