<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breakdown extends CI_Controller {
	function __construct() {
	   parent::__construct();
	   $this->load->model('model_breakdown','',TRUE);
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

	public function pedido_nuevo(){
		
		$template['pedidos'] = $this->model_breakdown->get_new_orders();
		$this->load->view("extra/tabla_pedido_nuevo",$template);
	}

	public function pedido_proceso(){
		$template['pedidos_proceso'] = $this->model_breakdown->get_process_orders();
		$this->load->view("extra/tabla_pedido_proceso",$template);
	}

	public function pedido_embarcado(){
		$template['pedidos_embarcados'] = $this->model_breakdown->get_finish_orders();
		$this->load->view("extra/tabla_pedido_embarcado",$template);

		
	}
}