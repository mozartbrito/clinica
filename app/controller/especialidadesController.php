<?php
namespace App\Controller;
use System\Controller;
use app\model\Especialidade\EspecialidadeDAO;

class EspecialidadesController extends Controller {

	private $especialidade;

	public function __construct()
	{
		parent::__construct();
		$this->especialidade = new EspecialidadeDAO();
	}
	public function index(){

		//enviando a view da função
		$data['view'] = 'especialidades';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['especialidades'] = $this->especialidade->listaTodos(); 

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		print_r($parametros);die;
		//enviando a view da função
		$data['view'] = 'especialidades_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		if ( isset( $parametros['id'] ) ) {
			$data['data']['especialidade'] = $this->especialidade->listaUnico( $parametros['id'] );
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	// public function salvar(){
	// 	$_medico = new Medico();
	// 	$_medico->setNome( $_POST['nome'] );
	// 	$_medico->setEspecialidade_id( $_POST['especialidade_id'] );
	// 	$_medico->setTurno( $_POST['turno'] );

	// 	if ( !isset( $_POST['id'] ) ) {
	// 		$id = $this->medico->insere( $_medico );
	// 	} else {
	// 		$_medico->setId( $_POST['id'] );
	// 		$this->medico->atualiza( $_medico );
	// 		$id = $_POST['id'];
	// 	}

	// 	if ( $id == 0 ) {
	// 		$_SESSION['danger'] = "Não foi possível efetuar o cadastro!";
	// 		header( "Location: " . $this->site_url( "medicos/form" ) );
	// 	} else {
	// 		$_SESSION['success'] = "Médico salvo com sucesso!";
	// 		header( "Location: " . $this->site_url( "medicos/form/id/" . $id ) );
	// 	} 
	// }

	// public function remove(){
	// 	$parametros = $this->getParam();
	// 	$result = $this->medico->deleta( $parametros['id'] );
	// 	if( $result > 0 ) { 
	// 		$_SESSION['success'] = "Médico removido com sucesso!"; 
	// 	} else { 
	// 		$_SESSION['danger'] = "Médico não removido!"; 
	// 	}
	// 	header( "Location: " . $this->site_url( "medicos" ) );
	// }

}