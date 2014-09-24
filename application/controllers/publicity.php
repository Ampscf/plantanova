<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicity extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   	$this->load->helper('url');
	   	$this->load->model('model_user','',TRUE);
	   	$this->load->model('model_publicity','',TRUE);
	}

	public function index()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$template['users'] = $this->model_user->get_clients();
		$template['publicity'] = $this->model_publicity->get_publicity();

		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_publicity.php';
		$template['footer'] = "footer/view_footer.php";		

		$this->load->view('main',$template);
	}

	public function get_publicity_image()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$publicity = $this->input->post('id_publicity');
	
		if($publicity>0){
			$publicit = $this->model_publicity->get_image_p($publicity);
			$imagen = $publicit[0]->p_image;

			echo '<img src="'.base_url().'img/Publicidad/'.$imagen.'" style="width: 400px; height: 240px;">';

		} else {
			echo "";
		}	
	}

	public function get_publicity_image2()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_pub_client = $this->input->post('id_pub_client');

		$publycity=$this->model_publicity->get_publicity_id_pub($id_pub_client);
		$publicit = $this->model_publicity->get_image_p($publycity[0]->id_publicity);
		$imagen = $publicit[0]->p_image;
		echo '<img src="'.base_url().'img/Publicidad/'.$imagen.'" style="width: 400px; height: 240px;">';

		
	}
	public function send_publicity()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$client = $this->input->post('client');
		$publicity = $this->input->post('pub');

		$data= array(
			'id_publicity' =>$publicity,
			'id_client' =>$client
			);

		$this->model_publicity->add_pub_client($data);
		redirect("publicity/index/", "refresh");
	}

	public function get_publicity()
	{	
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_user = $this->input->post('client');
		//echo $id_user;
		
		$publicity = $this->model_publicity->get_client_pub($id_user);
		if($publicity!=false){
			$result = "";
			foreach ($publicity as $key) 
			{
				$result = $result . "<option value='" . $key->id_pub_client . "'>" . $key->p_name . "</option>";
			}
			echo "<option value='-1'>---Selecciona una publicidad---</option>";
			echo $result;
		}else{
			echo "<option value='-1'>---Selecciona una publicidad---</option>";
		}
		
	}

	public function delete_publicity(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_publicity=$this->input->post('publici');

		$this->model_publicity->delete_client_pub($id_publicity);

		redirect('publicity/index',"refresh");
	}

	public function delete_pub(){
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$id_publicity=$this->input->post('publy');
		$image=$this->model_publicity->get_image_p($id_publicity);
		$path = 'img/Publicidad/'.$image[0]->p_image;
		$this->model_publicity->delete_cascade_publicity($id_publicity);
		$this->model_publicity->delete_publicity($id_publicity);

		if(unlink($path)) {
			redirect('publicity/index',"refresh");
		} else {
			echo 'errors occured';
		}
	}

	public function upload_publicity()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		$config['upload_path'] = './img/Publicidad';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('error', 'Ocurrio un error al subir el archivo, intentelo de nuevo');
			redirect('publicity/index');
		} else {
			if(!filter_var($this->input->post('p_url'), FILTER_VALIDATE_URL))
			  {
			  $this->session->set_flashdata('error', 'URL no valida');
				redirect('publicity/index');
			  }else			  {
				$data = $this->upload->data();
				$datos['p_image'] = $data['file_name'];
				$datos['p_name']=$this->input->post('p_name');
				$datos['p_url']=$this->input->post('p_url');
				$datos['p_parrafo1']=$this->input->post('p_parrafo1');
				$datos['p_parrafo2']=$this->input->post('p_parrafo2');
				$datos['p_parrafo3']=$this->input->post('p_parrafo3');
				$this->model_publicity->insert_publicity($datos);			
				
				redirect('publicity/index/', 'refresh');

			
			  }
			
		}
	}
}