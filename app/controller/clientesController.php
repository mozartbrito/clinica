<?php
namespace App\Controller;
use System\Controller;
use app\model\Cliente\Cliente;
use app\model\Cliente\ClienteDAO;

class ClientesController extends Controller {

	private $cliente;

	public function __construct()
	{
		parent::__construct();
		$this->cliente = new ClienteDAO();
	}
	public function index(){

		//enviando a view da função
		$data['view'] = 'clientes';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['clientes'] = $this->cliente->listaTodos(); 

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function form(){
		$parametros = $this->getParam();
		//enviando a view da função
		$data['view'] = 'clientes_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		if ( isset( $parametros['id'] ) ) {
			$data['data']['cliente'] = $this->cliente->listaUnico( $parametros['id'] );
			// echo "<pre>"; print_r( $data['data']['cliente'] ); die;
		}

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

	public function salvar(){
		$_cliente = new Cliente();

		$_cliente->setNome( $_POST['nome'] );
		$_cliente->setDataNascimento( $this->date2db($_POST['data_nascimento']) );
		$_cliente->setCi( $_POST['ci'] );
		$_cliente->setCpf( $_POST['cpf'] );
		$_cliente->setEndereco( $_POST['endereco'] );
		$_cliente->setFone( $_POST['fone'] );
		$_cliente->setCelular( $_POST['celular'] );
		$_cliente->setEmail( $_POST['email'] );
		$_cliente->setProfissao( $_POST['profissao'] );

		if ( !isset( $_POST['id'] ) ) {
			$id = $this->cliente->insere( $_cliente );
		} else {
			$_cliente->setId( $_POST['id'] );
			$this->cliente->atualiza( $_cliente );
			$id = $_POST['id'];
		}

		if ( $id == 0 ) {
			$_SESSION['danger'] = "Não foi possível efetuar o cadastro!";
			header( "Location: " . $this->site_url( "clientes/form" ) );
		} else {
			$_SESSION['success'] = "Cliente salva com sucesso!";
			header( "Location: " . $this->site_url( "clientes/form/id/" . $id ) );
		} 
	}

	public function remove(){
		$parametros = $this->getParam();
		$result = $this->cliente->deleta( $parametros['id'] );
		if( $result > 0 ) { 
			$_SESSION['success'] = "Cliente removida com sucesso!"; 
		} else { 
			$_SESSION['danger'] = "Cliente não removida!"; 
		}
		header( "Location: " . $this->site_url( "clientes" ) );
	}
	public function date2db($data){
		if(!empty($data)):
			$data = explode("/", $data);
			$data = $data[2] . '-' . $data[1] . '-' . $data[0];
		else:
			$data = '0000-00-00';
		endif;
		return $data;
	}

}