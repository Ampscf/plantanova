<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_controller extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('order_model','',TRUE);
	}

	//Sends the make order form
	public function index()
	{
		$this->load->model('order_model');

		if($this->session->userdata('logged_in'))
		{
			$template['header'] = "home_header.php";
			$template['template'] = "order_view.php";
			$template['footer'] = "main_footer.php";
			$template['plants'] = $this -> order_model -> get_plants();
			$template['sustratum'] = $this -> order_model -> get_sustratum();
			$template['categories'] = $this-> order_model -> get_categories();
			
			$this->load->view('main',$template);
		}
		else
		{
			redirect('index_controller/index', 'refresh');
		}
	}

	//Adds a new order
	public function new_order()
	{
		$data['plant_name'] = $this->input->post('plant_name');
		$data['variety'] = $this->input->post('variety');
		$data['rootstock'] = $this->input->post('rootstock');
		$data['branches'] = $this->input->post('branches');
		$data['volume'] = $this->input->post('volume');
		$data['datepicker'] = $this->input->post('datepicker');
		$data['sustratum'] = $this->input->post('sustratum');
		$data['subtype'] = $this->input->post('subtype');
		$data['observations'] = $this->input->post('observations');

		$this->order_model->new_order($data);
		
	}
	
	//Gets and shows the orders list for admin ordered in tabs by status
	public function orders_list()
	{
		$tipo = $this->input->post('tipo');

		$template['header'] = "home_header.php";
		$template['template'] = "admin_view.php";
		$template['footer'] = "main_footer.php";
		$template['orders'] = $this->order_model->get_orders('nuevos');

		$this->load->view('main',$template);
	}
	
	//Sends to individual order view
	public function order()
	{
		$template['header'] = "home_header.php";
		$template['template'] = "pedido_view.php";
		$template['footer'] = "main_footer.php";
		$template['cliente'] = $this->order_model->get_cliente($this->uri->segment(3,0));

		$this->load->view('main',$template);
	}
	
	//Changes de tabs and values for orders with state: New, Process, Finished
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


	public function get_subtypes()
	{
		$id_sustratum = $this->input->post('sustratum');
		$subtypes = $this -> order_model -> get_sustratum_subtype($id_sustratum);
		$result = "";
		foreach ($subtypes as $key) 
		{
			$result = $result . "<option value='" . $key->id_subtype . "'>" . $key->sustratum_name . "</option>";
		}
		echo $result;
	}
}