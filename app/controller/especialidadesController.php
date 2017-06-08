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
		//enviando a view da função
		$data['view'] = 'especialidades_form';

		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		// $data['data']['especialidades'] = $this->medico->listaTodos();

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

}