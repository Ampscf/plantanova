<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   	$this->load->model('model_files','',TRUE);
	   	$this->load->model('model_user','',TRUE);
	   	$this->load->model('model_order','',TRUE);
	   	$this->load->helper('url');
	}

	public function index(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['order']=$this->model_order->get_order();
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_files_body.php";
		$template['footer'] = "footer/view_footer.php";

		$this->load->view("main",$template);	
	}

	public function upload_files(){
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

			redirect('files/index/', 'refresh');
		}
		else
		{
			$data = $this->upload->data();
			$datos['location'] = $data['file_name'];
			$datos['id_order']=$this->input->post('order');
			$datos['id_files']=4;
			$this->model_files->update_files($datos);			
			
			redirect('files/index/', 'refresh');
		}
	}

	public function get_files(){
		$id_order=$this->input->post('id_order');
		$files=$this->model_files->get_files($id_order);
		foreach ($files as $key) {
			echo "<option value='" . $key->id_file . "'>" . $key->location .  "</option>";
		}
		
	}

	public function delete_files(){
		
		$id_file=$this->input->post('order_delete');

		$this->model_files->delete_files($id_file);

		redirect('files/index','refresh');
	}
}
?>