<?php
namespace App\Controller;
use System\Controller;
use app\model\Agenda\AgendaDAO;
use app\model\Medico\MedicoDAO;
use app\model\Cliente\ClienteDAO;

class IndexController extends Controller {
	private $agenda;
	private $medico;
	private $cliente;

	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION['autenticado'])) {
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
		$hoje = date('Y-m-d');
		$data['inicio'] = $hoje . ' 00:00:00';
		$data['fim'] = $hoje . ' 23:59:59';
		$_agendas = $this->agenda->listaTodos( $data ); 
		foreach ($_agendas as $_agenda) {
			// Busca as informações do cliente
			$_cliente = $this->cliente->listaUnico( $_agenda->cliente_id );
			$_agenda->setCliente( $_cliente );
			// Busca as informações do médico
			$_medico = $this->medico->listaUnico( $_agenda->medico_id );
			$_agenda->setMedico( $_medico );
		}
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['agendas'] = $_agendas;

		//enviando a view da função
		$data['view'] = 'index';
		//carregando o template principal
		$this->view('layout/principal', $data);
	}

}
