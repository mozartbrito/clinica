<?php
namespace App\Controller;
use System\Controller;
use app\model\Medico\Medico;
use app\model\Medico\MedicoDAO;
use app\model\Especialidade\EspecialidadeDAO;

class MedicosController extends Controller {

	private $medico;
	private $especialidade;

	public function __construct()
	{
		parent::__construct();
		$this->medico = new MedicoDAO();
		$this->especialidade = new EspecialidadeDAO();
	}
	public function index(){

		//enviando a view da função
		$data['view'] = 'medicos';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['medicos'] = $this->medico->listaTodos(); 

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
			$data['data']['medico'] = $this->medico->listaUnico( $parametros['id'] );
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_medico = new Medico();
		$_medico->setNome( $_POST['nome'] );
		$_medico->setEspecialidade_id( $_POST['especialidade_id'] );
		$_medico->setTurno( $_POST['turno'] );

		$id = $this->medico->insere( $_medico );
		header( "Location: " . $this->site_url( "medicos/form/id/" . $id ) );
	}

}
