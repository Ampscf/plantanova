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
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['id_order']=$this->uri->segment(3);
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['order_number']=$order->result()[0]->order_number;
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['fecha_entrega']=$order->result()[0]->order_date_delivery;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['farmer']=$order->result()[0]->farmer;
		$template['total_embark']=$this->model_embark->get_order_embark($this->uri->segment(3));
		$template['volume_left']=$template['volumen']-$template['total_embark']->volume;

		$template['embarque_pedido']=$this->model_breakdown->get_embark($template['id_order']);		

		if ($order->result()[0]->quotation == NULL){
			$template['quotation']='';
		} else {
			$template['quotation']='<a href="/plantanova/uploads/'.$order->result()[0]->quotation.'" target="_blank" style="color:yellowgreen;">'.$order->result()[0]->quotation.'</a>
								<a href="#myModal011" 
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>';
		}
		if ($order->result()[0]->contract == NULL){
			$template['contract']='';
		} else {
			$template['contract']='<a href="/plantanova/uploads/'.$order->result()[0]->contract.'" target="_blank" style="color:yellowgreen;">'.$order->result()[0]->contract.'</a>
								<a href="#myModal012" 
	                    			title="Eliminar"
	                    			data-toggle="modal">
									<i class="fa fa-times"></i>
	                			</a>';
		}
		$template['bills']=$this->model_embark->get_order_bills($this->uri->segment(3));
		$template['card_bills']=$this->model_embark->get_card_bills($this->uri->segment(3));		
		$template['dictum']=$this->model_embark->get_order_dictum($this->uri->segment(3));

		$template['embark'] = $this->model_breakdown->get_embark($template['id_order']);
		$template['error']=$this->session->flashdata('error');
		$template['states'] = $this->model_order->get_states();
		$template['towns'] = $this->model_order->get_towns();
 		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_edit_embarker_body.php';
		$template['footer'] = 'footer/view_footer.php';

		$this->load->view("main",$template);			
	}

	public function change_status()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$data['id_status']='3';
		$this->model_breakdown->update_order($this->uri->segment(3),$data);
		redirect("embark/index/".$this->uri->segment(3), "refresh");
	}

	public function insert_embark()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
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
		
		$datos['arrival_contact']=$this->input->post('contacto');	
		
		$datos['chep']=$this->input->post('chep');
		$datos['ensenada']=$this->input->post('ensenada');
		$tipo=$this->input->post('radio');
		$datos['tipo_ensenada']=$tipo[0];
		$datos['no_aplica']=$this->input->post('no_aplica');
		$datos['transport_box']=$this->input->post('transport_box');
		$datos['racks']=$this->input->post('racks');
		$datos['comment']=$this->input->post('comment');
		$datos['address']=$this->input->post('address');
		$datos['id_state']=$this->input->post('state');
		$datos['id_town']=$this->input->post('town');

		$this->model_embark->insert_embark($datos);

		redirect("embark/index/".$this->uri->segment(3), "refresh");
	}

	public function edit_embark()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_embark=$this->input->post("id_embark");
		$datos['id_order']=$this->uri->segment(3);
		$fecha=$this->input->post('datepicker'.$id_embark);
		$datos['date_delivery']=date("Y-m-d H:i:s", strtotime($fecha));
		$datos['volume']=$this->input->post('final_volume'.$id_embark);
		$datos['transport']=$this->input->post('transporter'.$id_embark);
		$datos['freight']=$this->input->post('fletera'.$id_embark);
		$datos['driver']=$this->input->post('chofer'.$id_embark);
		$datos['driver_cel']=$this->input->post('cel'.$id_embark);
		$fecha2=$this->input->post('butondates'.$id_embark);
		$datos['date_arrival']=date("Y-m-d H:i:s", strtotime($fecha2));
		$datos['destiny']=$this->input->post('destino'.$id_embark);
		
		$datos['arrival_contact']=$this->input->post('contacto'.$id_embark);	
		
		$datos['chep']=$this->input->post('chep'.$id_embark);
		$datos['ensenada']=$this->input->post('ensenada'.$id_embark);
		$tipo=$this->input->post('radio');
		$datos['tipo_ensenada']=$tipo[0];
		$datos['no_aplica']=$this->input->post('no_aplica'.$id_embark);
		$datos['transport_box']=$this->input->post('transport_box'.$id_embark);
		$datos['racks']=$this->input->post('racks'.$id_embark);
		$datos['comment']=$this->input->post('comment'.$id_embark);
		$datos['address']=$this->input->post('address'.$id_embark);
		$datos['id_state']=$this->input->post('state'.$id_embark);
		$datos['id_town']=$this->input->post('town'.$id_embark);

		$this->model_embark->edit_embark($id_embark,$datos);

		redirect("embark/index/".$this->uri->segment(3), "refresh");
	}

	public function update_embark()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
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
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo'/*$this->upload->display_errors()*/);

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
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo'/*$this->upload->display_errors()*/);

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
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo'/*$this->upload->display_errors()*/);

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datas = array(
				'id_order' => $this->uri->segment(3),
				'id_files' => 1,
				'location' => $data['file_name'],
				'folio' => $this->input->post('folio'),
				'moneda' => $this->input->post('moneda'),
				'total' => $this->input->post('volume') 
			);
			$this->model_embark->add_file($datas);		
			
			redirect('embark/index/'.$uri, 'refresh');


		}
	}

	function do_upload4($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo'/*$this->upload->display_errors()*/);

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datas = array(
				'id_order' => $this->uri->segment(3),
				'id_files' => 2,
				'location' => $data['file_name']
			);
			$this->model_embark->add_file($datas);				
			
			redirect('embark/index/'.$uri, 'refresh');
		}
	}

	function do_upload5($uri)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo'/*$this->upload->display_errors()*/);

			redirect('embark/index/'.$uri);
		}
		else
		{
			$data = $this->upload->data();
			$datas = array(
				'id_order' => $this->uri->segment(3),
				'id_files' => 3,
				'location' => $data['file_name']
			);
			$this->model_embark->add_file($datas);				
			
			redirect('embark/index/'.$uri, 'refresh');
		}
	}


	function delete_quotation()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
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
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
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

	function delete_bill($id_file)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$card_bill = $this->model_embark->get_card_bill($id_file);
		$path = 'uploads/'.$card_bill[0]->location;
		$this->model_embark->delete_fils($id_file);
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(4));
		}
		else {
     		echo 'errors occured';
		}
	}

	function delete_card_bill($id_file)
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$card_bill = $this->model_embark->get_card_bill($id_file);
		$path = 'uploads/'.$card_bill[0]->location;
		$this->model_embark->delete_fils($id_file); 
		if(unlink($path)) {
     		redirect('embark/index/'.$this->uri->segment(4));
		}
		else {
     		echo 'errors occured';
		}
	}

	function delete_embark()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
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
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['id_order']=$this->uri->segment(3);
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['order_number']=$order->result()[0]->order_number;
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['fecha_entrega']=$order->result()[0]->order_date_delivery;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['farmer']=$order->result()[0]->farmer;
		$template['quotation']=$order->result()[0]->quotation;
		$template['contract']=$order->result()[0]->contract;
		$template['bill']=$this->model_embark->get_order_bills($this->uri->segment(3));
		$template['card_bill']=$this->model_embark->get_card_bills($this->uri->segment(3));
		$template['dictum']=$this->model_embark->get_order_dictum($this->uri->segment(3));

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

		$template['embark'] = $this->model_embark->get_embark($template['id_order']);

 		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_embarker_resume.php';
		$template['footer'] = 'footer/view_footer.php';

		$this->load->view("main",$template);
	}
}