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

	public function insert_embark(){
		$data['id_status']='3';

		$datos['id_order']=$this->uri->segment(3);
		$datos['date_delivery']=$this->input->post('datepicker');
		$datos['volume']=$this->input->post('final_volume');
		$datos['transport']=$this->input->post('transporter');
		$datos['freight']=$this->input->post('fletera');
		$datos['driver']=$this->input->post('chofer');
		$datos['driver_cel']=$this->input->post('cel');
		$datos['date_arrival']=$this->input->post('butondates');
		$datos['destiny']=$this->input->post('destino');
		$datos['pack_type']=$this->input->post('empaque');
		$datos['arrival_contact']=$this->input->post('contacto');	
		$datos['boxes']=$this->input->post('cajas');
		$datos['box']=$this->input->post('caja');
		$datos['racks']=$this->input->post('racks');

		$this->model_breakdown->update_order($this->uri->segment(3),$data);
		$this->model_embark->insert_embark($datos);

		redirect("breakdown/pedido_embarcado/", "refresh");
	}
}