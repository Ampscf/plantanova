<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_controller extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('order_model','',TRUE);
	}

	public function index()
	{
		$this->load->model('order_model');
		if($this->session->userdata('logged_in')){
			$template['header'] = "home_header.php";
			$template['template'] = "order_view.php";
			$template['footer'] = "main_footer.php";
			$template['plants'] = $this -> order_model -> get_plants();
			$template['sustratum'] = $this -> order_model -> get_sustratum();
			
			$this->load->view('main',$template);
		}
		else{
			redirect('index_controller/index', 'refresh');
		}
	}
	
	//Funcion temporal
	public function admin()
	{
		//Recibe el tipo de pedido que quiere: nuevo, proceso, completado
		$tipo = $this->input->post('tipo');
		//Falta hacer la consulta para regresar y mostrar los pedidos del tipo


		$template['header'] = "home_header.php";
		$template['template'] = "admin_view.php";
		$template['footer'] = "main_footer.php";
		
		$this->load->view('main',$template);
	}
	
	//Función temporal
	public function pedidos()
	{
			$template['header'] = "home_header.php";
			$template['template'] = "pedido1.php";
			$template['footer'] = "main_footer.php";
			$template['id'] = $this->input->post('tipo');
			
			//$this->load->view('main',$template);
			$this->load->view('tabla_pedio.php');
	}
	
	//Función temporal
	public function semillas()
	{
			$template['header'] = "home_header.php";
			$template['template'] = "semillas.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}
	
	
}