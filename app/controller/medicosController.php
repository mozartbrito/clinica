<?php
namespace App\Controller;
use System\Controller;
use app\model\Medico\MedicoDAO;

class MedicosController extends Controller {

	private $medico;

	public function __construct()
	{
		parent::__construct();
		$this->medico = new MedicoDAO();
	}
	public function index(){

		//enviando a view da função
		$data['view'] = 'medicos';
		//enviando os dados necessários (se não houver, enviar $data['data'] = '')
		$data['data']['medicos'] = $this->medico->listaTodos(); 

		//carregando o template principal
		$this->view('layout/principal', $data);
	}

}
