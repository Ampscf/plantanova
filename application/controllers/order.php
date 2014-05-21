<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	}

	public function index()
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		//Manda los datos necesarios para cargar los pedidos y datos del usuario
		$template['pedidos'] = $this->model_order->get_orders('99');

		$this->load->view('main',$template);
	}

	public function dropdown_companies()
	{
		$result = $this -> model_order -> get_companies_drop();
		foreach($result as $row)
		{
			$companies[$row -> farm_name] = $row -> farm_name; 
		}
		return form_dropdown('companies', $companies);
	}
	
	//Muestra el formulario de registro de pedidos
	public function register_order_form()
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_new_order.php';
		$template['footer'] = "footer/view_footer.php";
		$template['companies'] = $this->model_order->get_companies_drop();
		
		$this->load->view('main',$template);
	}
}