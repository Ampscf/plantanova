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
	

	public function orders_list()
	{
		$tipo = $this->input->post('tipo');

		$template['header'] = "home_header.php";
		$template['template'] = "admin_view.php";
		$template['footer'] = "main_footer.php";
		$template['orders'] = $this->order_model->get_orders('nuevos');

		$this->load->view('main',$template);
	}
	

	public function order()
	{
		$template['header'] = "home_header.php";
		$template['template'] = "pedido_view.php";
		$template['footer'] = "main_footer.php";
		$template['cliente'] = $this->order_model->get_cliente($this->uri->segment(3,0));

		$this->load->view('main',$template);
	}
	
	
	public function orders_state()
	{
		$view_data['status'] = $this->input->post('tipo');
		$view_data['orders'] = $this->order_model->get_orders($view_data['status']);

		$data = $this->load->view('tabla_pedido', $view_data, TRUE);
		echo $data;
	}

	
	//Función temporal
	public function seeds()
	{
			$template['header'] = "home_header.php";
			$template['template'] = "semillas_view.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}
}