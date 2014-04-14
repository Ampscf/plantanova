<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('order_model','',TRUE);
	}

	//Manda a la función para hacer ordenes
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
			redirect('index/index', 'refresh');
		}
	}
	

	//Agrega una nueva orden a la bd
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
	
	//Obtieme y muestra las listas de órdenes al administradoor, ordenadas en pestañas y estatus
	public function orders_list()
	{
		$tipo = $this->input->post('tipo');

		$template['header'] = "home_header.php";
		$template['template'] = "admin_view.php";
		$template['footer'] = "main_footer.php";
		$template['orders'] = $this->order_model->get_orders('nuevos');

		$this->load->view('main',$template);
	}
	
	//Manda a la vista de un pedido individual
	public function order_id()
	{
		$template['header'] = "home_header.php";
		$template['template'] = "pedido_view.php";
		$template['footer'] = "main_footer.php";
		$template['cliente'] = $this->order_model->get_cliente($this->uri->segment(2,0));

		$this->load->view('main',$template);
	}
	
	//Cambia las pestañas por ordenes con estado: Nuevo, en proceso o terminado
	public function orders_status()
	{
		$view_data['status'] = $this->input->post('tipo');
		$view_data['orders'] = $this->order_model->get_orders($view_data['status']);

		$data = $this->load->view('tabla_pedido', $view_data, TRUE);
		echo $data;
	}

	
	//Formlario de envío de semmillas
	public function seeds()
	{
		$template['header'] = "home_header.php";
		$template['template'] = "semillas_view.php";
		$template['footer'] = "main_footer.php";
		
		$this->load->view('main',$template);
	}


	//Obtiene los subtipos que pueden ir en las plantas
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
	
	//Función que regresa todas las ciudades de México
	public function get_towns()
	{	
		$id_state = $this->input->post('id_state');
	
		$towns = $this->order_model->get_town($id_state);
		$result = "";
		foreach ($towns as $key) 
		{
			$result = $result . "<option value='" . $key->id_town . "'>" . $key->town_name . "</option>";
		}
		echo $result;
	}
}
