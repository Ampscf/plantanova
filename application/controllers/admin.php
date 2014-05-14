<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	}

	public function index()
	{
		$template['header'] = "header/view_login_header.php";
		$template['body'] = "body/view_admin_order_body.php";
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}
	
	public function load_companies()
	{
		$template['header'] = "header/view_admin_header.php";
		$template['body'] = "body/view_companies.php";
		$template['footer'] = "footer/view_footer.php";
		
		$this->load->view('main', $template);
	}
}