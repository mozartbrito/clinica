<?php
namespace App\Controller;
use System\Controller;
use app\model\Usuario\Usuario;
use app\model\Usuario\UsuarioDAO;

class UsuariosController extends Controller {

	private $usuario;

	public function __construct()
	{
		parent::__construct();
		$this->usuario = new UsuarioDAO();
	}
	public function index(){

		//enviando a view da função
		$data['view'] = 'usuarios';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['usuarios'] = $this->usuario->listaTodos(); 

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		//enviando a view da função
		$data['view'] = 'usuarios_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		if ( isset( $parametros['id'] ) ) {
			$data['data']['usuario'] = $this->usuario->listaUnico( $parametros['id'] );
			// echo "<pre>"; print_r( $data['data']['usuario'] ); die;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_usuario = new Usuario();
		$_usuario->setEspecialidade( $_POST['especialidade'] );
		$_usuario->setDescricao( $_POST['descricao'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->usuario->insere( $_usuario );
		} else {
			$_usuario->setId( $_POST['id'] );
			$this->usuario->atualiza( $_usuario );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível efetuar o cadastro!";
			header( "Location: " . $this->site_url( "usuarios/form" ) );
		} else {
			$_SESSION['success'] = "Especialidade salva com sucesso!";
			header( "Location: " . $this->site_url( "especialidades/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->usuario->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Especialidade removida com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Especialidade não removida!"; 
		}
		header( "Location: " . $this->site_url( "especialidades" ) );
	}

}