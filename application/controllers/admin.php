<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	//Manda la forma para el registro del cliente enviandole la lista de estados
	public function register_client_form()
	{
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_admin_register_client_body.php";
		$template['footer'] = "footer/view_footer.php";
		
		$template['states'] = $this->model_order->get_states();
		$template['towns'] = $this->model_order->get_towns();
			
		$this->load->view('main',$template);
	}


	//Realiza el registro del cliente a la BD
	public function register_client()
	{

	}

	//AJAX:Función que regresa todas las ciudades de un estado
	public function get_towns()
	{	
		$id_state = $this->input->post('id_state');
	
		$towns = $this->model_order->get_town($id_state);
		$result = "";
		foreach ($towns as $key) 
		{
			$result = $result . "<option value='" . $key->id_town . "'>" . $key->town_name . "</option>";
		}
		echo $result;
	}
	
	public function load_companies()
	{
		$template['header'] = "header/view_login_header.php";
		$template['body'] = "body/view_companies.php";
		$template['footer'] = "footer/view_footer.php";
		
		$this->load->view('main', $template);
	}
}