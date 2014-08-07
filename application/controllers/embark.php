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

		$template['embarque_pedido']=$this->model_breakdown->get_embark($template['id_order']);

		if ($order->result()[0]->quotation == NULL){
			$template['quotation']='';
		} else {
			$template['quotation']='<a href="#myModal11" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a> <a href="/plantanova/uploads/'.$order->result()[0]->quotation.'" target="_blank" style="color:yellowgreen;">'.$order->result()[0]->quotation.'</a>';
		}
		if ($order->result()[0]->contract == NULL){
			$template['contract']='';
		} else {
			$template['contract']='<a href="#myModal12" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a> <a href="/plantanova/uploads/'.$order->result()[0]->contract.'" target="_blank" style="color:yellowgreen;">'.$order->result()[0]->contract.'</a>';
		}
		if ($order->result()[0]->bill == NULL){
			$template['bill']='';
		} else {
			$template['bill']='<a href="#myModal13" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a> <a href="/plantanova/uploads/'.$order->result()[0]->bill.'" target="_blank" style="color:yellowgreen;">'.$order->result()[0]->bill.'</a>';
		}
		if ($order->result()[0]->card_bill == NULL){
			$template['card_bill']='';
		} else {
			$template['card_bill']='<a href="#myModal14" class="btn btn-default"
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a> <a href="/plantanova/uploads/'.$order->result()[0]->card_bill.'" target="_blank" style="color:yellowgreen;">'.$order->result()[0]->card_bill.'</a>';
		}

		$template['embark'] = $this->model_breakdown->get_embark($template['id_order']);
		$template['error']=$this->session->flashdata('error');
 		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_edit_embarker_body.php';
		$template['footer'] = 'footer/view_footer.php';

		$this->load->view("main",$template);			
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
			$datos['quotation'] = $data['file_name'];
			$this->model_order->update_order($this->uri->segment(3),$datos);			
			
			redirect('embark/index/'.$uri, 'refresh');
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
			$datos['contract'] = $data['file_name'];
			$this->model_order->update_order($this->uri->segment(3),$datos);			
			
			redirect('embark/index/'.$uri, 'refresh');
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
			$datos['bill'] = $data['file_name'];
			$this->model_order->update_order($this->uri->segment(3),$datos);			
			
			redirect('embark/index/'.$uri, 'refresh');
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
			$datos['card_bill'] = $data['file_name'];
			$this->model_order->update_order($this->uri->segment(3),$datos);			
			
			redirect('embark/index/'.$uri, 'refresh');
		}
	}

	function delete_quotation()
	{
		$data = array(
				'quotation' => NULL
			);
		$order = $this->model_order->get_order_id_order($this->uri->segment(3));
		$path = 'uploads/'.$order->result()[0]->quotation;
		$this->model_order->update_order($this->uri->segment(3),$data);
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
		$order = $this->model_order->get_order_id_order($this->uri->segment(3));
		$path = 'uploads/'.$order->result()[0]->contract;
		$this->model_order->update_order($this->uri->segment(3),$data);
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
		$order = $this->model_order->get_order_id_order($this->uri->segment(3));
		$path = 'uploads/'.$order->result()[0]->bill;
		$this->model_order->update_order($this->uri->segment(3),$data);
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
		$order = $this->model_order->get_order_id_order($this->uri->segment(3));
		$path = 'uploads/'.$order->result()[0]->card_bill;
		$this->model_order->update_order($this->uri->segment(3),$data); 
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(3));
		}
		else {
     		echo 'errors occured';
		}
	}

	function delete_embark(){
		foreach ($_POST as $key => $value) 
		{
			if(is_int($key))
			{
				$llave=$key;
			}
		}
		$this ->model_embark-> delete_embark($llave);
		redirect("embark/index/".$this->uri->segment(3)."/".$this->uri->segment(4), "refresh");
	}

	public function resume_embark()
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
		$template['quotation']=$order->result()[0]->quotation;
		$template['contract']=$order->result()[0]->contract;
		$template['bill']=$order->result()[0]->bill;
		$template['card_bill']=$order->result()[0]->card_bill;

		if ($template['quotation']==NULL){
			$template['quoti']='No se ha subido un PDF';
		} else {
			$template['quoti']='<a href="/plantanova/uploads/'.$template['quotation'].'" target="_blank" style="color:yellowgreen;">'.$template['quotation'].'</a>';
		}

		if ($template['contract']==NULL){
			$template['contra']='No se ha subido un PDF';
		} else {
			$template['contra']='<a href="/plantanova/uploads/'.$template['contract'].'" target="_blank" style="color:yellowgreen;">'.$template['contract'].'</a>';
		}

		if ($template['bill']==NULL){
			$template['bi']='No se ha subido un PDF';
		} else {
			$template['bi']='<a href="/plantanova/uploads/'.$template['bill'].'" target="_blank" style="color:yellowgreen;">'.$template['bill'].'</a>';
		}

		if ($template['card_bill']==NULL){
			$template['card']='No se ha subido un PDF';
		} else {
			$template['card']='<a href="/plantanova/uploads/'.$template['card_bill'].'" target="_blank" style="color:yellowgreen;">'.$template['card_bill'].'</a>';
		}

		$template['embark'] = $this->model_embark->get_embark($template['id_order']);

 		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_embarker_resume.php';
		$template['footer'] = 'footer/view_footer.php';

		$this->load->view("main",$template);
	}
}