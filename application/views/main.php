<?php

	if($this->session->userdata('logged_in')==FALSE)
	{
		$header = "header/view_login_header.php";
		$body = "body/view_login_body.php";
		$footer = "footer/view_footer.php";
	}
	include_once($header);
	include_once($body);
	include_once($footer);
?>