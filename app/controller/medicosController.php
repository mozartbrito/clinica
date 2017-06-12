<?php
namespace App\Controller;
use System\Controller;
use app\model\Medico\Medico;
use app\model\Medico\MedicoDAO;
use app\model\Especialidade\Especialidade;
use app\model\Especialidade\EspecialidadeDAO;

class MedicosController extends Controller {

	private $medico;
	private $especialidade;

	public function __construct()
	{
		parent::__construct();

		if( !isset( $_SESSION['autenticado'] ) ) {
			$_SESSION['danger'] = "Acesso negado, efetue o login!";
			// Se não haver usuário logado, redireciona para a tela de login
			header('Location: ' . $this->site_url('login'));
		} else {
			$this->medico = new MedicoDAO();
			$this->especialidade = new EspecialidadeDAO();
		}

	}
	
	public function index(){

		//enviando a view da função
		$data['view'] = 'medicos';
		// Lista os médicos e relaciona cada especialidade com o mesmo
		$_medicos = $this->medico->listaTodos(); 
		foreach ($_medicos as $_medico) {
			$_especialidade = $this->especialidade->listaUnico( $_medico->especialidade_id );
			$_medico->setEspecialidade( $_especialidade );
		}

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['medicos'] = $_medicos;

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();

		//enviando a view da função
		$data['view'] = 'medicos_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['especialidades'] = $this->especialidade->listaTodos();
		
		if ( isset( $parametros['id'] ) ) {
			$_medico = $this->medico->listaUnico( $parametros['id'] );
			$_especialidade = $this->especialidade->listaUnico( $_medico->especialidade_id );
			$_medico->setEspecialidade( $_especialidade );
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
			$data['data']['medico'] = $_medico;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_especialidade = new Especialidade();
		$_especialidade->setId( $_POST['especialidade_id'] );

		$_medico = new Medico();
		$_medico->setNome( $_POST['nome'] );
		$_medico->setEspecialidade( $_especialidade );
		$_medico->setTurno( $_POST['turno'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->medico->insere( $_medico );
		} else {
			$_medico->setId( $_POST['id'] );
			$this->medico->atualiza( $_medico );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível efetuar o cadastro!";
			header( "Location: " . $this->site_url( "medicos/form" ) );
		} else {
			$_SESSION['success'] = "Médico salvo com sucesso!";
			header( "Location: " . $this->site_url( "medicos/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->medico->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Médico removido com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Médico não removido!"; 
		}
		header( "Location: " . $this->site_url( "medicos" ) );
	}

}
