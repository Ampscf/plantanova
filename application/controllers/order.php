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
		$template['usuario'] = $this->model_user->get_admin_by_mail($this->session->userdata('mail'));
		$template['pedidos'] = $this->model_order->get_orders('99');

		$this->load->view('main',$template);
	}


	//Muestra el formulario de registro de pedidos
	public function register_order_form()
	{

	}
}