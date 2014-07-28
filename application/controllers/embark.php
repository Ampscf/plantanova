<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Embark extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	   $this->load->model('model_breakdown','',TRUE);
	   $this->load->model('model_seeds','',TRUE);
	   $this->load->model('model_embark','',TRUE);
	}	

	public function index()
	{
		$template['id_order']=$this->uri->segment(3);
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['fecha_entrega']=$order->result()[0]->order_date_delivery;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['farmer']=$order->result()[0]->farmer;
		
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_embarker_body.php';
		$template['footer'] = 'footer/view_footer.php';

		$this->load->view('main',$template);
	}
}