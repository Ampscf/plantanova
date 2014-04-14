<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('order_model','',TRUE);
	}
	
	public function index()	{
		$template['header'] = "home_header.php";
		$template['template'] = "cuenta_view.php";
		$template['footer'] = "main_footer.php";
		
		$template['myinfo'] = $this->user_model->get_user_by_mail($this->session->userdata('mail'));
		$template['states'] = $this->order_model->get_states();

		$this->load->view('main',$template);
	}
	
}