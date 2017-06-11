<?php
namespace App\Controller;
use System\Controller;
use app\model\Usuario\Usuario;
use app\model\Usuario\UsuarioDAO;

class LoginController extends Controller {
	private $usuario;

	public function __construct()
	{
		parent::__construct();
		$this->usuario = new UsuarioDAO();
	}

	public function index(){
		if(isset($_SESSION['autenticado'])){
			// Caso haja algum usuário logado, redireciona para a index
			header('Location: ' . $this->site_url('index'));
		} else {
			//enviando a view da função
			$data['view'] = 'login';
			//carregando o template principal
			$this->view('layout/principal', $data);
		}
		
	}

	public function logar(){
		if(isset($_SESSION['autenticado'])){
			header('Location: ' . $this->site_url('index'));
		} else {
			if($_POST['login'] == '' || $_POST['senha'] == ''){
				$_SESSION['danger'] = 'Usuário ou senha não infomados!';
				header('Location: ' . $this->site_url('login'));
			} else {
				$_usuario = new Usuario();
					
				$_usuario = $this->usuario->listaUnico( null, array( "login" => $_POST['login'], "senha" => $_POST['senha'] ) );

				if($_usuario == NULL) {
					$_SESSION['danger'] = 'Erro ao efetuar login, verifique os campos digitados!';
					header('Location: ' . $this->site_url('login'));
				} else {
					$_SESSION['autenticado'] = array( "id" => $_usuario->getId(), "nome" => $_usuario->getNome() );
					// $_SESSION['success'] = 'Usuário Logado com sucesso!';
					header('Location: '. $this->site_url('index'));
				}
			}
		}
	}

	public function logout(){
		if(isset($_SESSION['autenticado'])){
			unset($_SESSION['autenticado']);
			// $_SESSION['success'] = 'Usuário deslogado com sucesso!';
		}
		header('Location: ' . $this->site_url('login'));
	}

}
