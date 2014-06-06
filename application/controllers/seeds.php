<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seeds extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('model_seeds','',TRUE);
		$this->load->model('model_order','',TRUE);
		$this->load->model('model_user','',TRUE);
	}

	public function index(){
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_admin_register_client_body.php";
		$template['footer'] = "footer/view_footer.php";
		
			
		$this->load->view('main',$template);
	}
}

?>