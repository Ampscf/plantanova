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
	
	public function get_companie_info()
	{	
		
		$companie = $this->input->post('id_companie');
		
		if($companie>0){
		$comp=$this->model_user->obtenerCliente($companie);

		$first_name=$comp->result()[0]->first_name;
		$last_name=$comp->result()[0]->last_name;
		$mail=$comp->result()[0]->mail;
		$phone=$comp->result()[0]->phone;
		$street=$comp->result()[0]->street;
		$address_number=$comp->result()[0]->address_number;
		$colony=$comp->result()[0]->colony;
		$cp=$comp->result()[0]->cp;
		$social_reason=$comp->result()[0]->social_reason;


		echo "<p><b>Nombre Completo:</b> ",$first_name," ",$last_name,"</p>";
		echo "<p><b>Correo electronico: </b>",$mail,"</p>";
		echo "<p><b>Telefono:</b> ",$phone,"</p>";
		echo "<p><b>Calle/Colonia:</b> ",$street,",",$colony,"</p>";
		echo "<p><b>Numero: </b>",$address_number,"</p>";
		echo "<p><b>C.P.:</b> ",$cp,"</p>";
		echo "<p><b>Razón Social:</b> ",$social_reason,"</p>";

		}else{
			echo "";
		}

		
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
	
	
	public function carga_ordenes(){
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_orders.php';
		$template['footer'] = "footer/view_footer.php";
		$template['companies'] = $this->model_order->get_companies_drop();
		
		$this->load->view('main',$template);	
		
	}
	
	public function load_zero_step()
	{
		$this->load->view('body/view_orders.php');
	}
	
	public function load_first_step()
	{
		$this->load->view('body/view_order_first.php');
	}
	
	public function load_second_step()
	{
		$this->load->view('body/view_order_second.php');
	}
}