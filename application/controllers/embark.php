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
		$embark=$this->model_embark->get_embark($this->uri->segment(3));
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['fecha_entrega']=$order->result()[0]->order_date_delivery;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['farmer']=$order->result()[0]->farmer;

		$template['embarque_pedido']=$this->model_breakdown->get_embark($template['id_order']);

		/*if ($embark->result()[0]->quotation == NULL){
			$template['quotation']='';
		} else {
			$template['quotation']='<a href="#myModal11" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>';
		}
		if ($embark->result()[0]->contract == NULL){
			$template['contract']='';
		} else {
			$template['contract']='<a href="#myModal12" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>';
		}
		if ($embark->result()[0]->bill == NULL){
			$template['bill']='';
		} else {
			$template['bill']='<a href="#myModal13" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>';
		}
		if ($embark->result()[0]->card_bill == NULL){
			$template['card_bill']='';
		} else {
			$template['card_bill']='<a href="#myModal14" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>';
		}*/
		

		//$template['error']=0;
		
		if($this->model_breakdown->get_embark($template['id_order']) == false){
			$template['error']=$this->session->flashdata('error');
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_embarker_body.php';
			$template['footer'] = 'footer/view_footer.php';

			$this->load->view("main",$template);
		}else{
			$template['embark'] = $this->model_breakdown->get_embark($template['id_order']);
			$template['error']=$this->session->flashdata('error');
 			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_edit_embarker_body.php';
			$template['footer'] = 'footer/view_footer.php';

			$this->load->view("main",$template);
		}		
	}

	public function change_status()
	{
		$data['id_status']='3';
		$this->model_breakdown->update_order($this->uri->segment(3),$data);
		redirect("embark/index/".$this->uri->segment(3), "refresh");
	}

	public function insert_embark(){
		$datos['id_order']=$this->uri->segment(3);
		$fecha=$this->input->post('datepicker');
		$datos['date_delivery']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['volume']=$this->input->post('final_volume');
		$datos['transport']=$this->input->post('transporter');
		$datos['freight']=$this->input->post('fletera');
		$datos['driver']=$this->input->post('chofer');
		$datos['driver_cel']=$this->input->post('cel');
		$fecha2=$this->input->post('butondates');
		$datos['date_arrival']=date("Y-m-d H:i:s", strtotime($fecha2));
		$datos['destiny']=$this->input->post('destino');
		$datos['pack_type']=$this->input->post('empaque');
		$datos['arrival_contact']=$this->input->post('contacto');	
		$datos['boxes']=$this->input->post('cajas');
		$datos['box']=$this->input->post('caja');
		$datos['racks']=$this->input->post('rackz');
		$datos['comment']=$this->input->post('comment');

		$this->model_embark->insert_embark($datos);

		redirect("embark/index/".$this->uri->segment(3), "refresh");
	}

	public function update_embark()
	{
		$fecha=$this->input->post('datepicker');
		$datos['date_delivery']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['volume']=$this->input->post('final_volume');
		$datos['transport']=$this->input->post('transporter');
		$datos['freight']=$this->input->post('fletera');
		$datos['driver']=$this->input->post('chofer');
		$datos['driver_cel']=$this->input->post('cel');
		$fecha2=$this->input->post('butondates');
		$datos['date_arrival']=date("Y-m-d H:i:s", strtotime($fecha2));
		$datos['destiny']=$this->input->post('destino');
		$datos['pack_type']=$this->input->post('empaque');
		$datos['arrival_contact']=$this->input->post('contacto');	
		$datos['boxes']=$this->input->post('cajas');
		$datos['box']=$this->input->post('caja');
		if($this->input->post('racks')==1){
			$datos['racks']=$this->input->post('rackz');
		}else{
			$datos['racks']="";
		}
		$datos['comment']=$this->input->post('comment');
		
		$data['id_status']='3';
		$this->model_breakdown->update_order($this->uri->segment(3),$data);
		$this->model_embark->update_embark($this->uri->segment(3),$datos);

		redirect("breakdown/pedido_embarcado/", "refresh");
	}

	function do_upload1($uri)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datos['quotation'] = $data['full_path'];
			$this->model_embark->update_embark($this->uri->segment(3),$datos);			
			
			$this->load->view('body/upload_success', $datos);
		}
	}

	function do_upload2($uri)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datos['contract'] = $data['full_path'];
			$this->model_embark->update_embark($this->uri->segment(3),$datos);			
			
			$this->load->view('body/upload_success', $datos);
		}
	}

	function do_upload3($uri)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datos['bill'] = $data['full_path'];
			$this->model_embark->update_embark($this->uri->segment(3),$datos);			
			
			$this->load->view('body/upload_success', $datos);
		}
	}

	function do_upload4($uri)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datos['card_bill'] = $data['full_path'];
			$this->model_embark->update_embark($this->uri->segment(3),$datos);			
			
			$this->load->view('body/upload_success', $datos);
		}
	}

	function delete_quotation()
	{
		$data = array(
				'quotation' => NULL
			);
		$embark = $this->model_embark->get_embark($this->uri->segment(3));
		$path = $embark->result()[0]->quotation;
		$this->model_embark->update_embark($this->uri->segment(3), $data);	 
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(3));
		}
		else {
     		echo 'errors occured';
		}
	}

	function delete_contract()
	{
		$data = array(
				'contract' => NULL
			);
		$embark = $this->model_embark->get_embark($this->uri->segment(3));
		$path = $embark->result()[0]->contract;
		$this->model_embark->update_embark($this->uri->segment(3), $data);	 
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(3));
		}
		else {
     		echo 'errors occured';
		}
	}

	function delete_bill()
	{
		$data = array(
				'bill' => NULL
			);
		$embark = $this->model_embark->get_embark($this->uri->segment(3));
		$path = $embark->result()[0]->bill;
		$this->model_embark->update_embark($this->uri->segment(3), $data);	 
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(3));
		}
		else {
     		echo 'errors occured';
		}
	}

	function delete_card_bill()
	{
		$data = array(
				'card_bill' => NULL
			);
		$embark = $this->model_embark->get_embark($this->uri->segment(3));
		$path = $embark->result()[0]->card_bill;
		$this->model_embark->update_embark($this->uri->segment(3), $data);	 
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(3));
		}
		else {
     		echo 'errors occured';
		}
	}

	function embark_orders()
	{
		//Order resume
		$template['id_order']=$this->uri->segment(3);
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['fecha_entrega']=$order->result()[0]->order_date_delivery;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['farmer']=$order->result()[0]->farmer;

		//Load template
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_embark_orders.php';
		$template['footer'] = 'footer/view_footer.php';

		$this->load->view("main",$template);
	}


}