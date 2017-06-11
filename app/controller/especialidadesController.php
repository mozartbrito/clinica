<?php
namespace App\Controller;
use System\Controller;
use app\model\Especialidade\Especialidade;
use app\model\Especialidade\EspecialidadeDAO;

class EspecialidadesController extends Controller {

	private $especialidade;

	public function __construct()
	{
		parent::__construct();
		if( !isset( $_SESSION['autenticado'] ) ) {
			$_SESSION['danger'] = "Acesso negado, efetue o login!";
			// Se não haver usuário logado, redireciona para a tela de login
			header('Location: ' . $this->site_url('login'));
		} else {
			$this->especialidade = new EspecialidadeDAO();
		}
		
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
		//enviando a view da função
		$data['view'] = 'especialidades_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		if ( isset( $parametros['id'] ) ) {
			$data['data']['especialidade'] = $this->especialidade->listaUnico( $parametros['id'] );
			// echo "<pre>"; print_r( $data['data']['especialidade'] ); die;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_especialidade = new Especialidade();
		$_especialidade->setEspecialidade( $_POST['especialidade'] );
		$_especialidade->setDescricao( $_POST['descricao'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->especialidade->insere( $_especialidade );
		} else {
			$_especialidade->setId( $_POST['id'] );
			$this->especialidade->atualiza( $_especialidade );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível efetuar o cadastro!";
			header( "Location: " . $this->site_url( "especialidades/form" ) );
		} else {
			$_SESSION['success'] = "Especialidade salva com sucesso!";
			header( "Location: " . $this->site_url( "especialidades/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->especialidade->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Especialidade removida com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Especialidade não removida!"; 
		}
		header( "Location: " . $this->site_url( "especialidades" ) );
	}

}