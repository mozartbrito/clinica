<?php
namespace App\Controller;
use System\Controller;
// use app\model\Medico\MedicoDAO;

class IndexController extends Controller {

	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION['autenticado'])) {
			$_SESSION['danger'] = "Acesso negado, efetue o login!";
			// Se não haver usuário logado, redireciona para a tela de login
			header('Location: ' . $this->site_url('login'));
		}
		// $this->medico = new MedicoDAO();
	}

	public function index(){
		//enviando a view da função
		$data['view'] = 'index';

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

}
