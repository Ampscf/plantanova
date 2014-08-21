<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client extends CI_Controller {
	function __construct() {
	   parent::__construct();
	}
	
	public function index()
	{
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_body.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function inform()
	{
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_inform.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	}

	public function contributors()
	{
		$template['header'] = 'header/view_client_header.php';
		$template['body'] = 'body/view_client_contributor.php';
		$template['footer'] = "footer/view_footer.php";

		$this->load->view('main',$template);
	} 
}
?>