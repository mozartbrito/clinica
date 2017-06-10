<?php
namespace App\Controller;
use System\Controller;
use app\model\Usuario\Usuario;
use app\model\Usuario\UsuarioDAO;
use app\model\Perfil\PerfilDAO;

class UsuariosController extends Controller {

	private $usuario;

	public function __construct()
	{
		parent::__construct();
		$this->usuario = new UsuarioDAO();
		$this->perfil = new PerfilDAO();
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
		// Lista de perfis cadastrados
		$data['data']['perfis'] = $this->perfil->listaTodos();

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_usuario = new Usuario();
		
		$_usuario->setNome( $_POST['nome'] );
		$_usuario->setLogin( $_POST['login'] );
		$_usuario->setSenha( $_POST['senha'] );
		$_usuario->setPerfilId( $_POST['perfil_id'] );
		$_usuario->setCi( $_POST['ci'] );
		$_usuario->setCpf( $_POST['cpf'] );
		$_usuario->setEndereco( $_POST['endereco'] );
		$_usuario->setFone( $_POST['fone'] );
		$_usuario->setCelular( $_POST['celular'] );

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
			$_SESSION['success'] = "Usuário salvo com sucesso!";
			header( "Location: " . $this->site_url( "usuarios/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->usuario->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Usuário removido com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Usuário não removido!"; 
		}
		header( "Location: " . $this->site_url( "usuarios" ) );
	}

}