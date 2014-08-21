<?php

Class model_client extends CI_Model	
{
	function update_pass($password){
		$this->db->query('update t_user set password="'.$password.'" where id_user='.$this->session->userdata('id'));
		return $this->db->affected_rows();
	}
}
?>