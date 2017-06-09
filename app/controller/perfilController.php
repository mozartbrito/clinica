<?php
namespace App\Controller;
use System\Controller;
use app\model\Perfil\Perfil;
use app\model\Perfil\PerfilDAO;

class PerfilController extends Controller {

	private $perfil;

	public function __construct()
	{
		parent::__construct();
		$this->perfil = new PerfilDAO();
	}
	public function index(){

		//enviando a view da função
		$data['view'] = 'perfil';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['perfil'] = $this->perfil->listaTodos(); 

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		//enviando a view da função
		$data['view'] = 'perfil_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		if ( isset( $parametros['id'] ) ) {
			$data['data']['perfil'] = $this->perfil->listaUnico( $parametros['id'] );
			// echo "<pre>"; print_r( $data['data']['perfil'] ); die;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_perfil = new Perfil();
		$_perfil->setPerfil( $_POST['perfil'] );
		$_perfil->setDescricao( $_POST['descricao'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->perfil->insere( $_perfil );
		} else {
			$_perfil->setId( $_POST['id'] );
			$this->perfil->atualiza( $_perfil );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível efetuar o cadastro!";
			header( "Location: " . $this->site_url( "perfil/form" ) );
		} else {
			$_SESSION['success'] = "Perfil salvo com sucesso!";
			header( "Location: " . $this->site_url( "perfil/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->perfil->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Perfil removido com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Perfil não removido!"; 
		}
		header( "Location: " . $this->site_url( "perfil" ) );
	}

}