<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_controller extends CI_Controller {

	function __construct() {
	   parent::__construct();	
	}
	
	public function index()
	{
		$template['header'] = "main_header.php";
		$template['template'] = "registro_view.php";
		$template['footer'] = "main_footer.php";
			
		$this->load->view('main',$template);
	}
	
		 
	function register () 
	{
		$template['header'] = "main_header.php";
		$template['template'] = "registro_view.php";
		$template['footer'] = "main_footer.php";
		
		$this->load->view('main',$template);	 
	}
	
}