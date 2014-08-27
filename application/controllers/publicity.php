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
		$template['users'] = $this->model_user->get_clients();
		$template['publicity'] = $this->model_publicity->get_publicity();
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_publicity.php';
		$template['footer'] = "footer/view_footer.php";		

		$this->load->view('main',$template);
	}

	public function get_publicity_image()
	{
		$publicity = $this->input->post('id_publicity');
	
		if($publicity>0){
			$publicit = $this->model_publicity->get_image_p($publicity);
			$imagen = $publicit[0]->p_image;

			echo "<br>";
			echo '<img src="'.base_url().'img/Publicidad/'.$imagen.'">';

		} else {
			echo "";
		}	
	}

	public function send_publicity()
	{
		$client = $this->input->post('client');
		$publicity = $this->input->post('publicity');

		$data= array(
			'id_publicity' =>$publicity,
			'id_client' =>$client
			);

		$this->model_publicity->add_pub_client($data);
		redirect("publicity/index/", "refresh");
	}
}