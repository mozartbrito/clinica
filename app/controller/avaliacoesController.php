<?php
namespace App\Controller;
use System\Controller;
use app\model\Avaliacao\Avaliacao;
use app\model\Avaliacao\AvaliacaoDAO;
use app\model\Medico\Medico;
use app\model\Medico\MedicoDAO;
use app\model\Cliente\Cliente;
use app\model\Cliente\ClienteDAO;

class AvaliacoesController extends Controller {

	private $avaliacao;
	private $medico;
	private $cliente;

	public function __construct()	{
		parent::__construct();

		if( !isset( $_SESSION['autenticado'] ) ) {
			$_SESSION['danger'] = "Acesso negado, efetue o login!";
			// Se não haver usuário logado, redireciona para a tela de login
			header('Location: ' . $this->site_url('login'));
		} else {
			$this->avaliacao = new AvaliacaoDAO();
			$this->medico = new MedicoDAO();
			$this->cliente = new ClienteDAO();
		}

	}
	
	public function index(){
		// Lista os médicos e relaciona cada especialidade com o mesmo
		$_avaliacoes = $this->avaliacao->listaTodos(); 
		foreach ($_avaliacoes as $_avaliacao) {
			// Busca as informações do cliente
			$_cliente = $this->cliente->listaUnico( $_avaliacao->cliente_id );
			$_avaliacao->setCliente( $_cliente );
			// Busca as informações do médico
			$_medico = $this->medico->listaUnico( $_avaliacao->medico_id );
			$_avaliacao->setMedico( $_medico );
		}

		$data['data']['situacoes'] = array( "Agendado", "Em espera", "Cancelado", "Realizado");
		//enviando a view da função
		$data['view'] = 'avaliacoes';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['avaliacoes'] = $_avaliacoes;
		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		//enviando a view da função
		$data['view'] = 'avaliacoes_form';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['medicos'] = $this->medico->listaTodos();
		$data['data']['clientes'] = $this->cliente->listaTodos();
		$data['data']['situacoes'] = array( "Agendado", "Em espera", "Cancelado", "Realizado");

		if ( isset( $parametros['id'] ) ) {
			$_avaliacao = $this->avaliacao->listaUnico( $parametros['id'] );
			// Busca as informações do cliente
			$_cliente = $this->cliente->listaUnico( $_avaliacao->cliente_id );
			$_avaliacao->setCliente( $_cliente );
			// Busca as informações do médico
			$_medico = $this->medico->listaUnico( $_avaliacao->medico_id );
			$_avaliacao->setMedico( $_medico );
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
			$data['data']['avaliacao'] = $_avaliacao;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_cliente = new Cliente();
		$_cliente->setId( $_POST['cliente_id'] );

		$_medico = new Medico();
		$_medico->setId( $_POST['medico_id'] );

		$_avaliacao = new Avaliacao();
		$_avaliacao->setCliente( $_cliente );
		$_avaliacao->setMedico( $_medico );
		$_avaliacao->date2db( $_POST['data_avaliacao'] );
		$_avaliacao->setStatus( $_POST['status'] );
		$_avaliacao->setDescricao( $_POST['descricao'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->avaliacao->insere( $_avaliacao );
		} else {
			$_avaliacao->setId( $_POST['id'] );
			$this->avaliacao->atualiza( $_avaliacao );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível agendar!";
			header( "Location: " . $this->site_url( "avaliacoes/form" ) );
		} else {
			$_SESSION['success'] = "Avaliação salva com sucesso!";
			header( "Location: " . $this->site_url( "avaliacoes/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->medico->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Avaliação removida com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Avaliação não removida!"; 
		}
		header( "Location: " . $this->site_url( "avaliacoes" ) );
	}

}
