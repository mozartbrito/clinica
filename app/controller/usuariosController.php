<?php
namespace App\Controller;
use System\Controller;
use app\model\Usuario\Usuario;
use app\model\Usuario\UsuarioDAO;
use app\model\Perfil\Perfil;
use app\model\Perfil\PerfilDAO;

class UsuariosController extends Controller {

	private $usuario;

	public function __construct() {
		parent::__construct();

		if( !isset( $_SESSION['autenticado'] ) ) {
			$_SESSION['danger'] = "Acesso negado, efetue o login!";
			// Se não haver usuário logado, redireciona para a tela de login
			header('Location: ' . $this->site_url('login'));
		} else {
			$this->perfil = new PerfilDAO();
			$this->usuario = new UsuarioDAO();
		}

	}

	public function index(){
		//enviando a view da função
		$data['view'] = 'usuarios';
		$_usuarios = $this->usuario->listaTodos();
		foreach ($_usuarios as $_usuario) {
			$_perfil = $this->perfil->listaUnico( $_usuario->perfil_id );
			$_usuario->setPerfil( $_perfil );
		}
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['usuarios'] = $_usuarios;

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		//enviando a view da função
		$data['view'] = 'usuarios_form';

		if ( isset( $parametros['id'] ) ) {
			$_usuario = $this->usuario->listaUnico( $parametros['id'] );
			$_perfil = $this->perfil->listaUnico( $_usuario->perfil_id );
			$_usuario->setPerfil( $_perfil );
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
			$data['data']['usuario'] = $_usuario;
		}
		// Lista de perfis cadastrados
		$data['data']['perfis'] = $this->perfil->listaTodos();

		//carregando o template principal
		$this->view('layout/principal', $data);
	}
	public function salvar(){
		$_perfil = new Perfil();
		$_perfil->setId( $_POST['perfil_id'] );

		$_usuario = new Usuario();
		$_usuario->setNome( $_POST['nome'] );
		$_usuario->setLogin( $_POST['login'] );
		$_usuario->setSenha( $_POST['senha'] );
		$_usuario->setPerfil( $_perfil );
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
			if( isset( $_POST['page'] ) ) {
				$_SESSION['success'] = "Perfil salvo com sucesso!";
				header( "Location: " . $this->site_url( "usuarios/meuPerfil/id/" . $id ) );
			} else {	
				$_SESSION['success'] = "Usuário salvo com sucesso!";
				header( "Location: " . $this->site_url( "usuarios/form/id/" . $id ) );
			}
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

	public function meuPerfil() {
		$parametros = $this->getParam();
		if ( $parametros['id'] == $_SESSION['autenticado']['id'] ){
			// Informando a view
			$data['view'] = 'usuarios_perfil';
			// Retornando o usuário do banco
			$_usuario = $this->usuario->listaUnico( $parametros['id'] );
			$_perfil = $this->perfil->listaUnico( $_usuario->perfil_id );
			$_usuario->setPerfil( $_perfil );
			$data['data']['usuario'] = $_usuario;
			// Lista de perfis cadastrados
			$data['data']['perfis'] = $this->perfil->listaTodos();
			//carregando o template principal
			$this->view('layout/principal', $data);
		} else {
			// Se o id do usuário for diferente do usuário logado, redireciona para o usuário logado
			header( "Location: " . $this->site_url( "usuarios/meuPerfil/id/" . $_SESSION['autenticado']['id'] ) );
		}

	}

}