<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_controller extends CI_Controller {

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
	$template['header'] = "home_header.php";
			$template['template'] = "admin_view.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}
	
	//Función temporal
		public function pedido1()
	{
	$template['header'] = "home_header.php";
			$template['template'] = "pedido1.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}
	
	//Función temporal
		public function pedido2()
	{
	$template['header'] = "home_header.php";
			$template['template'] = "pedido2.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}

	//Función temporal
		public function pedido3()
	{
	$template['header'] = "home_header.php";
			$template['template'] = "pedido3.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}

	//Función temporal
		public function pedido4()
	{
	$template['header'] = "home_header.php";
			$template['template'] = "pedido4.php";
			$template['footer'] = "main_footer.php";
			
			$this->load->view('main',$template);
	}
	
}