<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_controller extends CI_Controller {

	public function index()
	{
		$this->load->model('order_model');
		if($this->session->userdata('logged_in')){
			$template['header'] = "home_header.php";
			$template['template'] = "order_view.php";
			$template['footer'] = "main_footer.php";
			$template['plants'] = $this -> order_model -> get_plants();
			
			$this->load->view('main',$template);
		}
		else{
			redirect('index_controller/index', 'refresh');
		}
	}
}